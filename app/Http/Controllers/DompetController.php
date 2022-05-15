<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use App\Models\DompetStatus;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class DompetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index($status_dompet = null)
    {
        $status = $status_dompet != null ? $status_dompet : '';
        if ($status == null) {
            $dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
                        ->select(
                            'dompet.id as dompet_id',
                            'dompet.*',
                            'dompet_status.*'
                        )
                        ->orderBy('nama', 'asc')
                        ->get();
        } else {
             $dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
                        ->select(
                            'dompet.id as dompet_id',
                            'dompet.*',
                            'dompet_status.*'
                        )
                        ->where('status_dompet', '=', $status)
                        ->orderBy('nama', 'asc')
                        ->get();
        }

        return view('dompet.index', ['dompet' => $dompet, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dompet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validasi = $request->validate([
        //     'nama' => 'required',
           
        // ]);
        $dompet = $request->all();
        $id = (string)Uuid::generate(4);

         DompetStatus::create([
            'ID' => $id
        ]);

        Dompet::create([
            'ID' => (string)Uuid::generate(4), // Generate UUID untuk ID tabel Dompet
            'nama' =>$dompet['nama'],
            'referensi' =>$dompet['referensi'],
            'deskripsi' =>$dompet['deskripsi'],
            'status_ID' =>$id
        ]);


        return redirect()->route('dompet.index')->with('success', 'Data berhasil ditambahkan');
        // return redirect('dompet')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
                            ->select(
                                'dompet.id as dompet_id',
                                'dompet.*',
                                'dompet_status.*'
                            )
                            ->where('dompet.status_ID', '=', $id)
                            ->first();
        return view('dompet.show', compact('show_dompet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $dompet = Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
                    ->select(
                        'dompet.id as dompet_id',
                        'dompet.*',
                        'dompet_status.*'
                    )
                    ->where('dompet.id', '=', $id)
                    ->first();

        return view('dompet.edit', ['edit_dompet' => $dompet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dompet = $request->all();
        Dompet::join('dompet_status', 'dompet.status_ID', '=', 'dompet_status.id')
            ->where('dompet.id', '=', $id)
            ->update([
                'nama' => $dompet['nama'],
                'referensi' => $dompet['referensi'],
                'deskripsi' => $dompet['deskripsi'],
                'status_dompet' => $dompet['status_dompet'],
            ]);

        return redirect()->route('dompet.index')->with(['success' => 'Dompet Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function change_status($id)
     {
        $dompet = DompetStatus::findOrFail($id); 
        if ($dompet->status_dompet == 'Aktif')
        {
            DompetStatus::where('id', '=', $id)
                ->update(['status_dompet' => 'Tidak Aktif']);
        } else {
            DompetStatus::where('id', '=', $id)
                ->update(['status_dompet' => 'Aktif']);
        }
        return redirect()->route('dompet.index')->with(['success' => 'Status Dompet Diubah!']);
     }
    public function destroy($id)
    {
        //
    }
}
