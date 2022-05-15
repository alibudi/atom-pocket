<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dompet;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class DompetMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dompet_masuk = Transaksi::join('transaksi_status', 'transaksi.status_ID', '=', 'transaksi_status.id')
                        ->join('dompet', 'transaksi.dompet_ID', '=', 'dompet.id')
                        ->join('category', 'transaksi.category_ID', '=', 'category.id')
                        ->select(
                            'transaksi.id as transaksi_id',
                            'dompet.nama as nama_dompet',
                            'category.nama as category',
                            'transaksi.*',
                            'transaksi_status.*'
                        )
                        ->where('transaksi_status.status_transaksi', '=', 'Masuk')
                        ->get();

        return view('transaksi.dompet_masuk.index', ['dompet_masuk' => $dompet_masuk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dompet = Dompet::select('id as dompet_id', 'nama')->get();
        $category = Category::select('id as category_id', 'nama')->get();
        return view('transaksi.dompet_masuk.create', ['dompet' => $dompet, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nilai' => 'required',
            'deskripsi' => 'required|max:255',
        ],
        [
            'nilai.required' => 'Nilai tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 255 karakter',
        ]);
        $transaksi = $request->all();
        $id = (string)Uuid::generate(4); // variabel untuk menampung UUID, dan akan digunakan oleh 2 tabel sekaligus

        TransaksiStatus::create([
            'ID' => $id,
            'status_transaksi' => 'Masuk'
        ]);

        Transaksi::create([
            'ID' => (string)Uuid::generate(4),
            'kode' => $transaksi['kode'],
            'deskripsi' => $transaksi['deskripsi'],
            'tanggal' => $transaksi['tanggal'],
            'nilai' => $transaksi['nilai'],
            'dompet_ID' => $transaksi['dompet_id'],
            'category_ID' => $transaksi['category_id'],
            'status_ID' => $id
        ]);

        return redirect()->route('dompet_masuk.index')->with(['success' => 'Transaksi Masuk Berhasil Disimpan!']);
    }
}
