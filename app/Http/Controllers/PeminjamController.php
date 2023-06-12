<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = Peminjam::paginate(5); // Mengambil 5 isi tabel
        return view('peminjam', compact('peminjam'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama_peminjam' => 'required',
            'jenis_kelamin' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'no_handphone' => 'required',
        ]);

        Peminjam::create($request->all());

        return redirect()->route('peminjam.index')->with('success', 'peminjam Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $peminjam = Peminjam::find($nim);
        return view('peminjam.detail', compact('peminjam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $peminjam = Peminjam::find($nim);
        return view('peminjam.edit', compact('peminjam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $peminjam = Peminjam::find($nim);

        $peminjam->nim = $request->nim;
        $peminjam->nama_peminjam = $request->nama_peminjam;
        $peminjam->jenis_kelamin = $request->jenis_kelamin;
        $peminjam->prodi = $request->prodi;
        $peminjam->kelas = $request->kelas;
        $peminjam->no_handphone = $request->no_handphone;

        $peminjam->save();
        return redirect()->route('peminjam.index')->with('success', 'peminjam Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        Peminjam::find($nim)->delete();
        return redirect()->route('peminjam.index')->with('success', 'peminjam Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $peminjam = Peminjam::where('nama_peminjam', 'like', "%" . $keyword . "%")->paginate(5);
        return view('peminjam', compact('peminjam'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
