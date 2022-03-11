<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function getTransaksi()
    {
        $result = DB::table('transaksis')
            ->join('bookings', 'bookings.id_bookings', '=', 'transaksis.id_bookings')
            ->join('users', 'users.id', '=', 'bookings.id_user')
            ->join('jadwals', 'jadwals.id_jadwal', '=', 'bookings.id_jadwal')
            ->join('pesawats as psw', 'psw.id', '=', 'jadwals.id_pesawat')
            ->select(
                'transaksis.*',
                'users.name as nama',
                'bookings.jumlah_tiket as jumlah',
                'psw.nama_pesawat as nama_pesawat',
                'psw.kelas as kelas',
                'psw.harga as harga',
            )
            ->get()
            ->all();
        // dump($result);
        return view('admin.transaksi.get', compact('result'));
    }

    public function bayar($id)
    {
        $result = DB::table('bookings')
            ->join('users', 'id', '=', 'bookings.id_user')
            ->join('jadwals as jdw', 'jdw.id_jadwal', '=', 'bookings.id_jadwal')
            ->join('pesawats as psw', 'psw.id', '=', 'jdw.id_pesawat')
            ->join('bandaras as asal', 'asal.id_bandara', '=', 'jdw.id_bandara_asal')
            ->join('bandaras as tujuan', 'tujuan.id_bandara', '=', 'jdw.id_bandara_tujuan')
            ->where('bookings.id_bookings', $id)
            ->select(
                'bookings.id_bookings as id',
                'users.name as nama',
                'psw.nama_pesawat as pesawat',
                'psw.kelas as kelas',
                'asal.nama_bandara as asal',
                'tujuan.nama_bandara as tujuan',
                'jdw.tgl_pergi as tgl_pergi',
                'jdw.jam_pergi as jam_pergi',
                'psw.harga as harga',
                'bookings.jumlah_tiket as jumlah',
                DB::raw('(psw.harga * bookings.jumlah_tiket) as harga_total')
            )
            ->get()->first();
        // dump($result);
        return view('transaksi.pembayaran', compact('result'));
    }

    public function store(Request $request)
    {
        // $id_bookings = $request->id;
        // $metode = $request->metode;
        // $total_bayar = $request->harga_total;
        // $waktu_bayar = now();

        // echo $id_bookings . '<br>';
        // echo $metode . '<br>';
        // echo $total_bayar . '<br>';
        // echo $waktu_bayar . '<br>';

        $data = DB::insert(
            'insert into transaksis
            (id_bookings, metode, kode_bayar, total_bayar, waktu_bayar, created_at, updated_at) 
            values (:id_bookings, :metode, :kode_bayar, :total_bayar, :waktu_bayar, :created, :updated)',
            [
                'id_bookings' => $request->id,
                'metode' => $request->metode,
                'kode_bayar' => 8080 . rand(1, 100000000),
                'total_bayar' => $request->harga_total,
                'waktu_bayar' => now(),
                'created' => now(),
                'updated' => now(),
            ]
        );

        $updateStatus = DB::table('bookings')
            ->where('id_bookings', $request->id)
            ->update(['status_pembayaran' => 'SUDAH DIBAYAR']);

        // dump($data);
        // dump($updateStatus);
        return redirect('/tiket/pembayaran-berhasil',);
    }

    public function cancel($id){
        DB::table('bookings')->where('id_bookings', $id)->delete();
        return redirect('/user/dashboard')->with(['success' => 'Berhasil Membatalkan Pesanan']);
    }
}
