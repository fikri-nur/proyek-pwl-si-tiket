<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index()
    {
        $result = DB::table('jadwals')->get();
        return view('tiket.pesawat', compact('result'));
    }

    public function getJadwal()
    {
        $result = DB::table('jadwals')
            ->join('pesawats as psw', 'psw.id', '=', 'jadwals.id_pesawat')
            ->join('bandaras as asal', 'asal.id_bandara', '=', 'jadwals.id_bandara_asal')
            ->join('bandaras as tujuan', 'tujuan.id_bandara', '=', 'jadwals.id_bandara_tujuan')
            ->select(
                'jadwals.*',
                'psw.nama_pesawat as pesawat',
                'psw.kelas as kelas',
                'asal.nama_bandara as asal',
                'tujuan.nama_bandara as tujuan',
                'jadwals.tgl_pergi',
                'jadwals.jam_pergi',
            )
            ->get()
            ->all();
        // dump($result);
        return view('admin.jadwal.get', compact('result'));
    }

    public function tambahData()
    {
        $pesawat = DB::table('pesawats')
            ->select()
            ->get()
            ->all();

        $bandara = DB::table('bandaras')
            ->select()
            ->get()
            ->all();

        return view('admin.jadwal.create', compact('pesawat', 'bandara'));
    }

    public function tambahDataProses(Request $request)
    {
        $date = strtotime($request->date);
        $newformat = date('Y-m-d', $date);

        $result = DB::table('jadwals')
            ->insert(
                [
                    'id_pesawat'        => $request->pesawat,
                    'id_bandara_asal'   => $request->asal,
                    'id_bandara_tujuan' => $request->tujuan,
                    'tgl_pergi'         => $newformat,
                    'jam_pergi'         => $request->time,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        return redirect('/admin/dashboard/jadwal')->with('success', 'Tambah Data Berhasil');
    }

    public function update($id)
    {
        $result = DB::table('jadwals')
            ->join('pesawats as psw', 'psw.id', '=', 'jadwals.id_pesawat')
            ->join('bandaras as asal', 'asal.id_bandara', '=', 'jadwals.id_bandara_asal')
            ->join('bandaras as tujuan', 'tujuan.id_bandara', '=', 'jadwals.id_bandara_tujuan')
            ->select(
                'jadwals.*',
                'psw.*',
                'asal.nama_bandara as asal',
                'tujuan.nama_bandara as tujuan',
                'jadwals.tgl_pergi as tgl',
                'jadwals.jam_pergi as jam',
            )
            ->where('jadwals.id_jadwal', $id)
            ->get()
            ->all();
        // dump($result);

        $pesawat = DB::table('pesawats')
            ->select()
            ->get()
            ->all();

        $bandara = DB::table('bandaras')
            ->select()
            ->get()
            ->all();
        return view('admin.jadwal.edit', compact('result', 'pesawat', 'bandara'));
    }

    public function prosesUpdate(Request $request, $id)
    {
        $date = strtotime($request->date);
        $newformat = date('Y-m-d', $date);

        $result = DB::table('jadwals')
            ->where('id_jadwal', $id)
            ->update(
                [
                    'id_pesawat'        => $request->pesawat,
                    'id_bandara_asal'   => $request->asal,
                    'id_bandara_tujuan' => $request->tujuan,
                    'tgl_pergi'         => $newformat,
                    'jam_pergi'         => $request->time,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]
            );
        return redirect('/admin/dashboard/jadwal')->with('success', 'Update Data Berhasil');
    }

    public function delete($id)
    {
        return view('admin.jadwal.delete', compact('id'));
    }

    public function deleteProses($id)
    {
        $result = DB::table('jadwals')
            ->where('id_jadwal', '=', $id)
            ->delete();
        return redirect('/admin/dashboard/jadwal')->with('success', 'Hapus Data Berhasil');
    }

    public function cariJadwal(Request $request)
    {
        $asal = $request->asal;
        $tujuan = $request->tujuan;
        $date = strtotime($request->date);
        $newformat = date('Y-m-d', $date);

        $result = DB::table('jadwals')
            ->join('pesawats as psw', 'psw.id', '=', 'jadwals.id_pesawat')
            ->join('bandaras as asal', 'asal.id_bandara', '=', 'jadwals.id_bandara_asal')
            ->join('bandaras as tujuan', 'tujuan.id_bandara', '=', 'jadwals.id_bandara_tujuan')
            ->where('tgl_pergi', '=', $newformat)
            ->where('id_bandara_asal', '=', $asal)
            ->where('id_bandara_tujuan', '=', $tujuan)
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
            ->get();
        // dump($result);
        return view('content.daftar-pesawat', compact('result'));
    }
}
