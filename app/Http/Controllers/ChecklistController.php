<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklist = Checklist::paginate(5);
        return view('checklist', compact('checklist'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjaman = Peminjaman::all();
        return view('checklist.create',['peminjaman' => $peminjaman]);
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
            'id_checklist' => 'required',
            'peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'kondisi' => 'required',
        ]);

        $checklist = new Checklist();
        $checklist -> id_checklist = $request->get('id_checklist');
        $checklist -> tanggal_pengembalian = $request->get('tanggal_pengembalian');
        $checklist -> kondisi = $request->get('kondisi');

        $peminjaman = new Peminjaman;
        $peminjaman->id_peminjaman = $request->get('peminjaman');

        $checklist->peminjaman()->associate($peminjaman);
        $checklist->save();

        return redirect()->route('checklist.index')->with('success', 'Checklist Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show($id_checklist)
    {
        $checklist = Checklist::find($id_checklist);
        return view('checklist.detail', compact('checklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit($id_checklist)
    {
        $peminjaman = Peminjaman::all();

        $checklist = Checklist::find($id_checklist);
        return view('checklist.edit', ['peminjaman' => $peminjaman], compact('checklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_checklist)
    {
        $request->validate([
            'id_checklist' => 'required',
            'peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'kondisi' => 'required',
        ]);

        $checklist = Checklist::with(['peminjaman'])->where('id_checklist',$id_checklist)->first();

        $checklist -> id_checklist = $request->get('id_checklist');
        $checklist -> tanggal_pengembalian = $request->get('tanggal_pengembalian');
        $checklist -> kondisi = $request->get('kondisi');

        $peminjaman = new Peminjaman;
        $peminjaman->id_peminjaman = $request->get('peminjaman');

        $checklist->peminjaman()->associate($peminjaman);
        $checklist->save();

        return redirect()->route('checklist.index')->with('success', 'Checklist Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_checklist)
    {
        Checklist::find($id_checklist)->delete();
        return redirect()->route('checklist.index')->with('success', 'Checklist Berhasil Dihapus');
    }

    public function cetak() {
        $checklist = Checklist::all();
        $pdf = PDF::loadview('checklist.cetak', compact ('checklist'));
        return ($pdf->download('laporan.pdf'));
    }
}
