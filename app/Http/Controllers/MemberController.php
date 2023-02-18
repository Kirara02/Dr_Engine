<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\member\CreateMemberRequest;
use App\Http\Requests\member\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['member'] = Member::with(['user'])->get();
        return view('member.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = new Member();
        $action = route('members.store');
        $method= 'POST';
        $title = 'Tambah Member';

        return view('member.form',compact('member','action','method','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMemberRequest $request)
    {
        try {
            DB::beginTransaction();

            $request->validated();

            User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'level' => $request->level,
            ]);

            $id = User::select('id')->latest()->first();

            $foto = $request->file('foto');
            $fotoUrl = $foto->storeAs('members', Str::slug($request->name) . '-' . Str::random(6) . '.' . $foto->extension());


            Member::create([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'ktp' => $request->ktp,
                'foto' => $fotoUrl,
                'alamat' => $request->alamat,
                'iduser' => $id->id,
            ]);

            DB::commit();

            return redirect()->route('members.index')->with('success','Member berhasil ditambahkan');
         }catch (\Throwable $th) {
             DB::rollBack();
             return back()->with('error', $th->getMessage());
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Member $member)
    {
        $action = route('members.update', $member->id);
        $method = 'PUT';
        $title = 'Update Member';

        return view('member.form', compact('member', 'action', 'method', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        try{
            DB::beginTransaction();
            
            $request->validated();
            $data = $member->with(['user'])->get();
            
            // return $data;
            $pass = $request->password ? bcrypt($request->password) : $member->user->password;
            User::find($member->user->id)->update([
                'username' => $request->username,
                'password' => $pass,
                'level' => $request->level,
            ]);
            
            if ($request->file('foto')) {
                $member->foto != NULL ? Storage::delete($member->foto) : '';
                $foto = $request->file('foto');
                $fotoUrl = $foto->storeAs('members', Str::slug($request->name) . '-' . Str::random(6) . '.' . $foto->extension());
            } else {
                $fotoUrl = $member->foto;
            }

            Member::find($member->id)->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'ktp' => $request->ktp,
                'foto' => $fotoUrl,
                'alamat' => $request->alamat,
            ]);


            DB::commit();

            return redirect()->route('members.index')->with('success','Member berhasil diedit');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
       } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        try {
            DB::beginTransaction();

            // Storage::delete($member->foto);
            User::find($member->iduser)->delete();
            // $member->delete();

            DB::commit();

            return redirect()->route('members.index')->with('success', 'Member berhasil didelete');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
