<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Jenis;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alat = Alat::paginate(5); // Mengambil 5 isi tabel
        return view('alat', compact('alat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexCust()
    {
        $alat = Alat::all(); // Mengambil 5 isi tabel
        return view('alatCust', compact('alat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::all();
        $kategori = Kategori::all();
        return view('alat.create',['jenis' => $jenis, 'kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('foto_alat')){
            $foto_alat = $request->file('foto_alat')->store('images', 'public');
        }

        $request->validate([
            'id_alat' => 'required',
            'kategori' => 'required',
            'jenis' => 'required',
            'nama_alat' => 'required',
            'merk_alat' => 'required',
            'kondisi_alat' => 'required',
        ]);

        // fungsi eloquent untuk nambah data Alat
        $alat = new Alat();
        $alat -> id_alat = $request->get('id_alat');
        $alat -> nama_alat = $request->get('nama_alat');
        $alat -> foto_alat = $foto_alat;
        $alat -> merk_alat = $request->get('merk_alat');
        $alat -> kondisi_alat = $request->get('kondisi_alat');
        
        $kategori = new Kategori;
        $kategori->id_kategori = $request->get('kategori');
       
        $jenis = new Jenis;
        $jenis->id_jenis = $request->get('jenis');

        $alat->kategori()->associate($kategori);
        $alat->jenis()->associate($jenis);
        $alat->save();

        return redirect()->route('alat.index')->with('success', 'Alat Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_alat)
    {
        $alat = Alat::find($id_alat);
        return view('alat.detail', compact('alat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_alat)
    {
        $kategori = Kategori::all();
        $jenis = Jenis::all();

        $alat = Alat::find($id_alat);
        return view('alat.edit', ['kategori' => $kategori, 'jenis' => $jenis], compact('alat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_alat)
    {
        $request->validate([
            'id_alat' => 'required',
            'kategori' => 'required',
            'jenis' => 'required',
            'nama_alat' => 'required',
            'merk_alat' => 'required',
            'kondisi_alat' => 'required',
        ]);

        // fungsi eloquent untuk nambah data Alat

        $alat = Alat::with(['kategori','jenis'])->where('id_alat', $id_alat)->first();

        if ($request->hasFile('foto_alat')) {
            // A new file is being uploaded, so delete the previous photo (if exists)
            if ($alat->foto_alat && Storage::exists('public/' . $alat->foto_alat)) {
                Storage::delete('public/' . $alat->foto_alat);
            }

            $foto_alat = $request->file('foto_alat')->store('images', 'public');
            // Update the file path in your database or storage location
            $alat->foto_alat = $foto_alat;
        } else {
            // No new file is being uploaded, so keep the previous photo as it is
            $foto_alat = $alat->foto_alat;
        }

        $alat -> id_alat = $request->get('id_alat');
        $alat -> nama_alat = $request->get('nama_alat');
        $alat -> foto_alat = $foto_alat;
        $alat -> merk_alat = $request->get('merk_alat');
        $alat -> kondisi_alat = $request->get('kondisi_alat');

        $kategori = new Kategori;
        $kategori->id_kategori = $request->get('kategori');
       
        $jenis = new Jenis;
        $jenis->id_jenis = $request->get('jenis');

        $alat->kategori()->associate($kategori);
        $alat->jenis()->associate($jenis);
        $alat->save();

        return redirect()->route('alat.index')->with('success', 'Alat Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_alat)
    {
        Alat::find($id_alat)->delete();
        return redirect()->route('alat.index')->with('success', 'Alat Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $alat = Alat::where('nama_alat', 'like', "%" . $keyword . "%")->paginate(5);
        return view('alat', compact('alat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}