<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages.student.setting');
    }

    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|min:8',
            'name' => 'required',
            'username' => 'required',
        ]);



        if ($request->has('password')) {
            $request->user()->update([
                'password' => bcrypt($request->password),
            ]);
        }


        $request->user()->student->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        if ($request->hasFile('avatar')) {
            $request->user()->student->update([
                'avatar' => $request->file('avatar')->store('assets/student', 'public'),
            ]);
        }

        Swal::success('Ubah profil berhasil', 'Profil anda telah diubah');

        return back();
    }
}
