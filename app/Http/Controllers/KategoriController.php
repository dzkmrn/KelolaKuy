<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::paginate(5); // Mengambil 5 isi tabel
        return view('kategori', compact('kategori'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('foto')){
            $foto = $request->file('foto')->store('images', 'public');
        }

            $request->validate([
                'id_kategori' => 'required',
                'kategori_alat' => 'required',
                'dekskripsi_kategori' => 'required',
            ]);

            $kategori = new Kategori();
            $kategori->id_kategori=$request->get('id_kategori');
            $kategori->kategori_alat=$request->get('kategori_alat');
            $kategori->foto=$foto;
            $kategori->dekskripsi_kategori=$request->get('dekskripsi_kategori');
        
            $kategori->save();
            return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        return view('kategori.detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        $kategori = Kategori::find($id_kategori);

        $kategori->kategori_alat = $request->kategori_alat;
        $kategori->dekskripsi_kategori = $request->dekskripsi_kategori;

        if ($kategori->foto && file_exists(storage_path('app/public/' .$kategori->foto))) {
            Storage::delete('public/' .$kategori->foto);
        }

        $foto = $request->file('foto')->store('images', 'public');
        $kategori->foto = $foto;

        $kategori->save();
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        Kategori::find($id_kategori)->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Dihapus');
    }
}
