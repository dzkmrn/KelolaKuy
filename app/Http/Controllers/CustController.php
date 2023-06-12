<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class CustController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::paginate(5); // Mengambil 5 isi tabel
        return view('SearchTracking', compact('peminjaman'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjam = Peminjam::all();
        $alat = Alat::all();
        return view('formCust', ['peminjam' => $peminjam, 'alat' => $alat]);
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
            'status' => 'required',
            'peminjam' => 'required',
            'alat' => 'required',
            'tanggal_peminjaman' => 'required',
            'durasi_peminjaman' => 'required',
            'kegiatan' => 'required',
            'status' => 'required',
        ]);

        $peminjaman = new Peminjaman();
        $peminjaman -> id_peminjaman = $request->get('id_peminjaman');
        $peminjaman -> tanggal_peminjaman = $request->get('tanggal_peminjaman');
        $peminjaman -> durasi_peminjaman = $request->get('durasi_peminjaman');
        $peminjaman -> kegiatan = $request->get('kegiatan');
        $peminjaman -> status = $request->get('status');

        $peminjam = new Peminjam;
        $peminjam->nim = $request->get('peminjam');

        $alat = new Alat;
        $alat->id_alat = $request->get('alat');

        $peminjaman->peminjam()->associate($peminjam);
        $peminjaman->alat()->associate($alat);
        $peminjaman->save();

        return view('searchTracking')->with('success', 'Peminjaman Berhasil di tambahkan');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $peminjaman = Peminjaman::where('id_peminjaman', 'like', "%" . $keyword . "%")->paginate(5);
        return view('tracking', compact('peminjaman'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function tracking(){
        return view('SearchTracking');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
