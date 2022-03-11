<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    public function userDashboard()
    {
        $id = Auth::id();
        $result = DB::table('bookings')
            ->join('users', 'id', '=', 'bookings.id_user')
            ->join('jadwals as jdw', 'jdw.id_jadwal', '=', 'bookings.id_jadwal')
            ->join('pesawats as psw', 'psw.id', '=', 'jdw.id_pesawat')
            ->join('bandaras as asal', 'asal.id_bandara', '=', 'jdw.id_bandara_asal')
            ->join('bandaras as tujuan', 'tujuan.id_bandara', '=', 'jdw.id_bandara_tujuan')
            ->where('bookings.id_user', $id)
            ->select(
                'bookings.id_bookings as id',
                'users.name as nama',
                'psw.nama_pesawat as pesawat',
                'psw.kelas as kelas',
                'asal.nama_bandara as asal',
                'tujuan.nama_bandara as tujuan',
                'jdw.tgl_pergi',
                'jdw.jam_pergi',
                'psw.harga',
                'bookings.jumlah_tiket',
                'bookings.status_pembayaran',
                DB::raw('(psw.harga * bookings.jumlah_tiket) as harga_total')
            )
            ->get()->all();
        // dump($result);
        return view('user.user-dashboard', compact('result'));
    }

    public function adminDashboard()
    {
        return view('admin.admin-dashboard');
    }
}
