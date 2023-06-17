<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checklist;
use App\Models\Peminjaman;
use App\Models\Alat;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $users = DB::table('users')->count();
        $peminjaman = Peminjaman::paginate(10);
        $alatss = DB::table('alat')->count();
        $alat = Alat::paginate(5);
        return view('home', ['user'=>$user], compact('users', 'alat', 'alatss', 'peminjaman'));
    }

    public function adminHome()
    {
        $user = Auth::user();
        $users = DB::table('users')->count();
        $peminjam = DB::table('peminjam')->count();
        $alat = DB::table('alat')->count();
        $peminjamans = DB::table('peminjaman')->count();
        $checklist = Checklist::paginate(5);
        $peminjaman = Peminjaman::paginate(10);
        return view('adminHome', ['user'=>$user], compact('users', 'peminjam', 'alat', 'peminjaman', 'peminjamans', 'checklist'));
    }
}
