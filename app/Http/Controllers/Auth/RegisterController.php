<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\auth\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        try {            
            DB::beginTransaction();

            $request->validated();

            User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'level' => 'member'
            ]);

            DB::commit();

            return redirect()->route('login')->with('success','Anda berhasil register');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
