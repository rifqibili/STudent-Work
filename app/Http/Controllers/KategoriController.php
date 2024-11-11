<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\session;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.crudKategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $file = $request->file('gambar');
        $name = $file->getClientOriginalName();
        $path = 'storage/gambar/kategori/';
        $file->move($path, $name);
        $gambar = $name;

        $kategori =  Kategori::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'gambar' => $gambar
        ]);

        if ($kategori) {
            return redirect()->back()->with('success', 'kategori telah di tambahkan');
        } else {
            return redirect()->back()->with('error', 'kategori gagal di tambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            return response()->json($kategori);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }

    public function showDeletedKategori()
    {
        $kategoris = Kategori::onlyTrashed()->get();
        return view('layouts.trash.deletedKategori', compact('kategoris'));
    }

    public function restore($id)
    {
        $kategori = Kategori::onlyTrashed()->findOrFail($id);
        $kategori->restore();
        return redirect()->back()->with('success', 'Tugas Berhasil di Pulihkan.');
    }

    public function forceDelete($id)
    {
        $kategori = kategori::onlyTrashed()->findOrFail($id);

            $gambarPath = 'storage/gambar/kategori/' . $kategori->gambar;
            unlink($gambarPath);


        $kategori->forceDelete();
        return redirect()->back()->with('success', 'Tugas Telah di Hapus Permanen.');
    }

    public function forceDeleteAll()
    {
        $deletedkategori = Kategori::onlyTrashed()->get();


        foreach ($deletedkategori as $kategori) {
            if ($kategori) {
                $gambarPath = 'storage/gambar/kategori/' . $kategori->gambar;
                unlink($gambarPath);

                $kategori->forceDelete();
            }

            return redirect()->back();
        }
    }
}
