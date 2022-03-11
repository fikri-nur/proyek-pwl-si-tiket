<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesawatController extends Controller
{
    public function getPesawat()
    {
        $result = DB::table('pesawats')
            ->select(
                'pesawats.*',
            )
            ->get()
            ->all();
        // dump($result);
        return view('admin.pesawat.get', compact('result'));
    }

    public function tambahData()
    {
        return view('admin.pesawat.create');
    }

    public function tambahDataProses(Request $request)
    {
        $result = DB::table('pesawats')
            ->insert(
                [
                    'nama_pesawat'  => $request->nama,
                    'kelas'         => $request->kelas,
                    'harga'         => $request->harga,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/pesawat')->with('success', 'Tambah Data Berhasil');
    }

    public function update($id)
    {
        $result = DB::table('pesawats')
            ->select(
                'id',
                'nama_pesawat',
                'kelas',
                'harga',
            )
            ->where('id', $id)
            ->get()
            ->all();
        // dump($result);
        return view('admin.pesawat.edit', compact('result'));
    }

    public function prosesUpdate(Request $request, $id)
    {
        $result = DB::table('pesawats')
            ->where('id', $id)
            ->update(
                [
                    'nama_pesawat'  => $request->nama_pesawat,
                    'kelas'         => $request->kelas,
                    'harga'         => $request->harga,
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/pesawat')->with('success', 'Update Data Berhasil');
    }

    public function delete($id)
    {
        return view('admin.pesawat.delete', compact('id'));
    }

    public function deleteProses($id)
    {
        $result = DB::table('pesawats')
            ->where('id', '=', $id)
            ->delete();
        return redirect('/admin/dashboard/pesawat')->with('success', 'Hapus Data Berhasil');
    }

    public function cariTiket(Request $request)
    {
        $asal = $request->asal;
        $tujuan = $request->tujuan;
        $date = strtotime($request->date);
        $newformat = date('Y-m-d', $date);

        $result = DB::table('jadwals')
            ->join('pesawats as psw', 'psw.id', '=', 'jadwals.id_pesawat')
            ->join('bandaras as asal', 'asal.id_bandara', '=', 'jadwals.id_bandara_asal')
            ->join('bandaras as tujuan', 'tujuan.id_bandara', '=', 'jadwals.id_bandara_tujuan')
            ->select('jadwals.id_jadwal as id', 'psw.nama_pesawat as pesawat', 'asal.nama_bandara')
            ->where('tgl_pergi', '=', $newformat)
            ->where('id_bandara_asal', '=', $asal)
            ->where('id_bandara_tujuan', '=', $tujuan)
            ->get();
        dump($result);


        // return view('tiket.pesawat', compact('result'));

        // dump($request);
        // $result = DB::table('pesawats')
        // ->where('tgl_pergi', '=', $newformat)
        // ->where('bandara_asal', '=', $asal)
        // ->where('bandara_tujuan', '=', $tujuan)
        // ->get();
        // return view('content.daftar-pesawat', ['pesawat' => $result]);
    }

    public function test(Request $request)
    {
        $tujuan = $request->tujuan;
        $asal = $request->asal;
        $date = strtotime($request->date);
        $newformat = date('Y-m-d', $date);

        $result = DB::table('pesawats')
            ->where('tgl_pergi', '=', $newformat)
            ->where('bandara_asal', '=', $asal)
            ->where('bandara_tujuan', '=', $tujuan)
            ->get();
        return view('content.daftar-pesawat', ['pesawat' => $result]);
    }
}
