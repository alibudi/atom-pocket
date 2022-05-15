<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryStatus;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class CategoryController extends Controller
{
    public function index($status_category = null)
    {
        $status = $status_category != null ? $status_category : '';
        if ($status == null) {
            $category = Category::join('category_status', 'category.status_ID', '=', 'category_status.id')
                        ->select(
                            'category.id as category_id',
                            'category.*',
                            'category_status.*'
                        )
                        ->orderBy('nama', 'asc')
                        ->get();
        } else {
            $category = Category::join('category_status', 'category.status_ID', '=', 'category_status.id')
                        ->select(
                            'category.id as category_id',
                            'category.*',
                            'category_status.*'
                        )
                        ->where('status_category', '=', $status)
                        ->orderBy('nama', 'asc')
                        ->get();
        }

        return view('category.index', ['category' => $category, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\categoryValidasi  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
        ],
        [
            'nama.required' => 'Nama kategori harus diisi',
            'nama.max' => 'Nama kategori maksimal 255 karakter',
            'deskripsi.required' => 'Deskripsi kategori harus diisi',
        ]);
        $category = $request->all(); // konversi data dari object ke array

        $id = (string)Uuid::generate(4);
        CategoryStatus::create([
            'ID' => $id,
            'status_category' => $category['status_category']
        ]);

        Category::create([
            'ID' => (string)Uuid::generate(4),
            'nama' => $category['nama'],
            'deskripsi' => $category['deskripsi'],
            'status_ID' => $id,
        ]);

        return redirect()->route('category.index')->with(['success' => 'Category Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_category = Category::join('category_status', 'category.status_ID', '=', 'category_status.id')
                            ->select(
                                'category.id as category_id',
                                'category.*',
                                'category_status.*'
                            )
                            ->where('category.status_ID', '=', $id)
                            ->first();

        return view('category.show', ['show_category' => $show_category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::join('category_status', 'category.status_ID', '=', 'category_status.id')
                    ->select(
                        'category.id as category_id',
                        'category.*',
                        'category_status.*'
                    )
                    ->where('category.id', '=', $id)
                    ->first();

        return view('category.edit', ['edit_category' => $category]);
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
         $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
        ],
        [
            'nama.required' => 'Nama kategori harus diisi',
            'nama.max' => 'Nama kategori maksimal 255 karakter',
            'deskripsi.required' => 'Deskripsi kategori harus diisi',
        ]);
        $category = $request->all();
        category::join('category_status', 'category.status_ID', '=', 'category_status.id')
            ->where('category.id', '=', $id)
            ->update([
                'nama' => $category['nama'],
                'deskripsi' => $category['deskripsi'],
                'status_category' => $category['status_category'],
            ]);

        return redirect()->route('category.index')->with(['success' => 'category Berhasil Diubah!']);
    }

    /**
     * Ubah status berdasarkan data yang dipilih
    */
    public function change_status($id)
    {
        $dompet = CategoryStatus::findOrFail($id);  
        if ($dompet->status_category == 'Aktif')
        {
            CategoryStatus::where('id', '=', $id)
                ->update(['status_category' => 'Tidak Aktif']);
        } else {
            CategoryStatus::where('id', '=', $id)
                ->update(['status_category' => 'Aktif']);
        }

        return redirect()->route('category.index')->with(['success' => 'Status category Diubah!']);
    }
}
