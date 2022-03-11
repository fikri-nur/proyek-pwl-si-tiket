<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUser()
    {
        $result = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('level', '2')
            ->get()
            ->all();
        // dump($result);
        return view('admin.user.get', compact('result'));
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
        return view('admin.user.edit', compact('result', 'id'));
    }

    public function proses($id)
    {
        $result = DB::table('users')
            ->where('users.id', $id)
            ->update(
                [
                    'level'          => '1',
                    'updated_at'    => now(),
                ]
            );
        return redirect('/admin/dashboard/user')->with('success', 'Berhasil Menjadikan Admin');
    }
}
