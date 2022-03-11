<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        if ($this->middleware('auth'));
    }

    public function index()
    {
        $result = DB::table('bookings')->get();
        return view('', compact('result'));
    }

    public function getPemesanan()
    {
        $result = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.id_user')
            ->join('jadwals', 'jadwals.id_jadwal', '=', 'bookings.id_jadwal')
            ->join('pesawats as psw', 'psw.id', '=', 'jadwals.id_pesawat')
            ->join('bandaras as asal', 'asal.id_bandara', '=', 'jadwals.id_bandara_asal')
            ->join('bandaras as tujuan', 'tujuan.id_bandara', '=', 'jadwals.id_bandara_tujuan')
            ->select(
                'bookings.*',
                'users.name as nama',
                'users.nik as nik',
                'users.telp as telp',
                'psw.nama_pesawat as nama_pesawat',
                'psw.kelas as kelas',
                'asal.nama_bandara as asal',
                'tujuan.nama_bandara as tujuan',
            )
            ->get()
            ->all();
        // dump($result);
        return view('admin.pemesanan.get', compact('result'));
    }

    public function detailTiket($id)
    {
        $result = DB::table('jadwals')
            ->join('pesawats as psw', 'psw.id', '=', 'jadwals.id_pesawat')
            ->join('bandaras as asal', 'asal.id_bandara', '=', 'jadwals.id_bandara_asal')
            ->join('bandaras as tujuan', 'tujuan.id_bandara', '=', 'jadwals.id_bandara_tujuan')
            ->where('jadwals.id_jadwal', $id)
            ->select(
                'jadwals.id_jadwal as id',
                'psw.nama_pesawat as pesawat',
                'psw.kelas as kelas',
                'asal.nama_bandara as asal',
                'tujuan.nama_bandara as tujuan',
                'jadwals.tgl_pergi',
                'jadwals.jam_pergi',
                'psw.harga as harga'
            )
            ->get()->first();
        // dump($result);
        return view('booking.booking', compact('result'));
    }

    public function pesan(Request $request)
    {
        $nama = $request->name;
        $nik = $request->nik;
        $id_jadwal = $request->id_jadwal;
        $jumlah = $request->jumlah;
        $id_user = $request->id_user;

        // echo $nama . '<br>';
        // echo $nik . '<br>';
        // echo $id_jadwal . '<br>';
        // echo $jumlah . '<br>';
        // echo $id_user . '<br>';

        $data = DB::insert(
            'insert into bookings
            (id_user, id_jadwal, jumlah_tiket, waktu_pesan, status_pembayaran, created_at, updated_at) 
            values (:id_user, :id_jadwal, :jumlah, :waktu_pesan, :status_pembayaran, :created, :updated)',
            [
                'id_user' => $request->id_user,
                'id_jadwal' => $request->id_jadwal,
                'jumlah' => $request->jumlah,
                'waktu_pesan' => now(),
                'status_pembayaran' => 'BELUM DIBAYAR',
                'created' => now(),
                'updated' => now(),
            ]
        );

        return redirect('/tiket/pemesanan-berhasil',);
    }
}
