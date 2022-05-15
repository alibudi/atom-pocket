<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Transaksi;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
            ->select('dompet.id as dompet_id', 'nama')
            ->where('status_dompet', '=', 'Aktif')
            ->orderBy('nama', 'asc')
            ->get(); 

        $category = Category::join('category_status', 'category.status_ID', '=', 'category_status.id')
            ->select('category.id as category_id', 'nama')
            ->where('status_category', '=', 'Aktif')
            ->orderBy('nama', 'asc')
            ->get(); 
        return view('laporan.index', ['dompet' => $dompet, 'category' => $category]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
        ],
        [
            'tgl_awal.required' => 'Tanggal awal harus diisi',
            'tgl_akhir.required' => 'Tanggal akhir harus diisi',
        ]);
        
        $data = $request->all();

        $tanggal = $data['tgl_awal'] . ' - ' . $data['tgl_akhir']; 

        $query_dompet = $data['dompet_id'] != 'all' ? $data['dompet_id'] : null; 

        $query_kategory = $data['category_id'] != 'all' ? $data['category_id'] : null; 

        if (count($data['status']) == 1) {

            $laporan = Transaksi::join('transaksi_status', 'transaksi.status_ID', '=', 'transaksi_status.id')
                        ->join('category', 'transaksi.category_ID', '=', 'category.id')
                        ->join('dompet', 'transaksi.dompet_ID', '=', 'dompet.id')
                        ->select(
                            'dompet.ID as dompet_id',
                            'category.ID as category_id',
                            'transaksi.tanggal',
                            'transaksi.kode',
                            'dompet.deskripsi',
                            'dompet.nama as nama_dompet',
                            'category.nama as nama_category',
                            'transaksi.nilai',
                            'transaksi_status.status_transaksi'
                            )
                        ->whereBetween('tanggal', [$data['tgl_awal'], $data['tgl_akhir']])

                        ->when($query_dompet, function ($laporan, $query_dompet) {
                            return $laporan->where('dompet.id', $query_dompet);
                        })
                        ->when($query_kategory, function ($laporan, $query_kategory) {
                            return $laporan->where('category.id', $query_kategory);
                        })

                        ->where('transaksi_status.status_transaksi', '=', $data['status'][0])
                        ->get();

        } else {

            $laporan = Transaksi::join('transaksi_status', 'transaksi.status_ID', '=', 'transaksi_status.id')
                        ->join('category', 'transaksi.category_ID', '=', 'category.id')
                        ->join('dompet', 'transaksi.dompet_ID', '=', 'dompet.id')
                        ->select(
                            'dompet.ID as dompet_id',
                            'category.ID as category_id',
                            'transaksi.tanggal',
                            'transaksi.kode',
                            'dompet.deskripsi',
                            'dompet.nama as nama_dompet',
                            'category.nama as nama_category',
                            'transaksi.nilai',
                            'transaksi_status.status_transaksi'
                            )
                            ->whereBetween('tanggal', [$data['tgl_awal'], $data['tgl_akhir']])

                            // Pencarian akan di lakukan berdasarkan kondisi jika terpenuhi
                            ->when($query_dompet, function ($laporan, $query_dompet) {
                                return $laporan->where('dompet.id', $query_dompet);
                            })
                            ->when($query_kategory, function ($laporan, $query_kategory) {
                                return $laporan->where('category.id', $query_kategory);
                            })
                            ->get();

            }

        if ($laporan->isEmpty()) {

            return redirect()->back()->with(['warning' => 'Tidak Ada Laporan Pada Rentang '. $tanggal]);

        }

        $total_masuk = $laporan->where('status_transaksi', '=', 'Masuk')->sum('nilai');
        $total_keluar = $laporan->where('status_transaksi', '=', 'Keluar')->sum('nilai');

        $total = ($total_masuk + $total_keluar); 

        if ($data['click'] == 'Buat Laporan') {

            return view('laporan.show', ['laporan' => $laporan, 'tanggal' => $tanggal, 'total_masuk' => $total_masuk, 'total_keluar' => $total_keluar, 'total' => $total]);

        } elseif ($data['click'] == 'Buat Ke Excel') {

            ob_end_clean();
            ob_start();

           
            return Excel::download(new LaporanExport($laporan, $tanggal, $total_masuk, $total_keluar, $total), 'Laporan Transaksi.xlsx');
        }

    }

}
