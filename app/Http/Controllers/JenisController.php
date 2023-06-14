<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::paginate(5); // Mengambil 5 isi tabel
        return view('jenis', compact('jenis'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis.create');
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
            'id_jenis' => 'required',
            'jenis_alat' => 'required',
            'dekskripsi_jenis' => 'required',
        ]);

        Jenis::create($request->all());

        return redirect()->route('jenis.index')->with('success', 'jenis Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jenis)
    {
        $jenis = Jenis::find($id_jenis);
        return view('jenis.detail', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jenis)
    {
        $jenis = Jenis::find($id_jenis);
        return view('jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis)
    {
        $jenis = Jenis::find($id_jenis);

        $jenis->jenis_alat = $request->jenis_alat;
        $jenis->dekskripsi_jenis = $request->dekskripsi_jenis;

        $jenis->save();
        return redirect()->route('jenis.index')->with('success', 'jenis Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis)
    {
        Jenis::find($id_jenis)->delete();
        return redirect()->route('jenis.index')->with('success', 'jenis Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $jenis = Jenis::where('jenis_alat', 'like', "%" . $keyword . "%")->paginate(5);
        return view('jenis', compact('jenis'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}

