<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BandaraController extends Controller
{
    public function index()
    {
        $result = DB::table('bandaras')
            ->select('bandaras.*')
            ->get()
            ->all();
        // dump($result);
        return view('tiket.pesawat', compact('result'));
    }
    
    public function getBandara()
    {
        $result = DB::table('bandaras')
            ->select(
                'id_bandara',
                'kota',
                'nama_bandara',
            )
            ->get()
            ->all();
        // dump($result);
        return view('admin.bandara.get', compact('result'));
    }

    public function tambahData()
    {
        return view('admin.bandara.create');
    }

    public function tambahDataProses(Request $request)
    {
        $result = DB::table('bandaras')
            ->insert(
                [
                    'kota'          => $request->kota,
                    'nama_bandara'  => $request->nama_bandara,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/bandara')->with('success', 'Tambah Data Berhasil');
    }

    public function update($id)
    {
        $result = DB::table('bandaras')
            ->select(
                'id_bandara',
                'kota',
                'nama_bandara',
            )
            ->where('id_bandara', $id)
            ->get()
            ->all();
        // dump($result);
        return view('admin.bandara.edit', compact('result'));
    }

    public function prosesUpdate(Request $request, $id)
    {
        $result = DB::table('bandaras')
            ->where('id_bandara', $id)
            ->update(
                [
                    'kota'          => $request->kota,
                    'nama_bandara'  => $request->nama_bandara,
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/bandara')->with('success', 'Update Data Berhasil');
    }

    public function delete($id)
    {
        return view('admin.bandara.delete', compact('id'));
    }

    public function deleteProses($id)
    {
        $result = DB::table('bandaras')
            ->where('id_bandara', '=', $id)
            ->delete();
        return redirect('/admin/dashboard/bandara')->with('success', 'Hapus Data Berhasil');
    }
}
