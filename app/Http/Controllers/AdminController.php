<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAdmin(){
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('level', '1')
            ->get()
            ->all();
            // dump($result);
        return view('admin.admin.get', compact('result'));
    }

    public function edit($id)
    {
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('users.id', $id)
            ->get()
            ->all();
        // dump($result);
        return view('admin.admin.edit', compact('result', 'id'));
    }

    public function proses($id)
    {
        $result = DB::table('users')
            ->where('users.id', $id)
            ->update(
                [
                    'level'          => '2',
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/admin')->with('success', 'Berhasil Menjadikan User');
    }
}
