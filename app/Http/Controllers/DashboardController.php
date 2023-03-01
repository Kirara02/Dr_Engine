<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Mekanik;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function edit()
    {
        return view('dashboard.form');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:5|unique:users,username,' . auth()->user()->id,
            'nama' => 'required|string',
            'email' => 'required|string',
            'password' => 'nullable|min:6|',
            'confirm' => 'required_with:password|same:password',
            'foto' => 'mimes:jpg,jpeg,png',
            'ktp' => 'mimes:jpg,jpeg,png',
            'alamat' => 'required|string',
            'nohp' => 'required|string',
            'nik' => 'required|string',
            'nama_bengkel' => 'string',
            'alamat_bengkel' => 'string',
        ]);

        // try {
        //     DB::beginTransaction();

            if ($request->password) {
                $pass = bcrypt($request->password);
            } else {
                $pass = auth()->user()->password;
            }

            
            User::find(auth()->user()->id)->update([
                'username' => $request->username,
                'password' => $pass,
            ]);

            if ($request->file('foto')) {
                auth()->user()->member->foto != NULL ? Storage::delete(auth()->user()->member->foto) : '';
                $foto = $request->file('foto');
                $fotoUrl = $foto->storeAs('members', Str::slug($request->nama) . '-' . Str::random(6) . '.' . $foto->extension());
            } else {
                $fotoUrl = auth()->user()->member->foto;
            }    
            
            if ($request->file('ktp')) {
                auth()->user()->member->ktp != NULL ? Storage::delete( auth()->user()->member->ktp) : '';
                $ktp = $request->file('ktp');
                $fotoKtp = $ktp->storeAs('ktp', Str::slug($request->nama) . '-' . Str::random(6) . '.' . $ktp->extension());
            } else {
                $fotoKtp =  auth()->user()->member->ktp;
            }

            Member::find(auth()->user()->member->id)->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'nik' => $request->nik,
                'ktp' => $fotoKtp,
                'foto' => $fotoUrl,
                'alamat' => $request->alamat,
            ]);

            if(auth()->user()->member->mekanik != null){
                Mekanik::find(auth()->user()->member->mekanik->id)->update([
                    'name' => $request->nama_bengkel,
                    'alamat' => $request->alamat_bengkel,
                ]);
            }


            // DB::commit();
            return redirect()->route('profile')->with('success', 'Update profile berhasil');
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     return back()->with('error', $th->getMessage());
        // }
    }
}
