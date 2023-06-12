<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::paginate(5); // Mengambil 5 isi tabel
        return view('peminjaman', compact('peminjaman'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        return view('peminjaman.create', ['peminjam' => $peminjam, 'alat' => $alat]);
    }

    public function createCust()
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

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Berhasil di tambahkan');
    }

    public function storeCust(Request $request)
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

        return redirect()->route('alatCust')->with('success', 'Peminjaman Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_peminjaman)
    {
        $peminjaman = Peminjaman::find($id_peminjaman);
        return view('peminjaman.detail', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        $peminjam = Peminjam::all();
        $alat = Alat::all();

        $peminjaman = Peminjaman::find($id_peminjaman);
        return view('peminjaman.edit', ['peminjam' => $peminjam, 'alat' => $alat], compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_peminjaman)
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

        $peminjaman = Peminjaman::with(['peminjam','alat'])->where('id_peminjaman',$id_peminjaman)->first();

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

        return redirect()->route('peminjaman.index')->with('success', 'peminjaman Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_peminjaman)
    {
        Peminjaman::find($id_peminjaman)->delete();
        return redirect()->route('peminjaman.index')->with('success', 'peminjaman Berhasil Dihapus');
    }
}
