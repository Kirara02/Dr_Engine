<?php

namespace App\Http\Controllers;

use App\Http\Requests\mekanik\createMekanikRequest;
use App\Http\Requests\mekanik\UpdateMekanikRequest;
use App\Models\Mekanik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MekanikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('isAdmin')->except(['create','store']);
     }

    public function index()
    {
        $data['mekanik'] = Mekanik::where('statusAktivasi','=','1')->where('statusHapus','=','0')->get();

        return view('mekanik.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mekanik = new Mekanik();
        $action = route('mekanik.store');
        $method = 'POST';
        $title = 'Tambah Mekanik';

        return view('mekanik.form', compact('mekanik', 'action', 'method', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createMekanikRequest $request)
    {
        try {
            $request->validated();
            DB::beginTransaction();

            Mekanik::create([
                'name' => $request->name,
                'alamat' => $request->alamat,
                'statusAktivasi' => '0',
                'statusHapus' => '0',
                'idmember' => auth()->user()->member->id
            ]);

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mekanik $mekanik)
    {
        $action = route('mekanik.update', $mekanik->id);
        $method = 'PUT';
        $title = 'Update Mekanik';

        return view('mekanik.form', compact('mekanik', 'action', 'method', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMekanikRequest $request, Mekanik $mekanik)
    {
        try {
            DB::beginTransaction();
            $mekanik->update($request->all());

            DB::commit();

            return redirect()->route('mekanik.index')->with('success', 'Data berhasil diedit');
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
    public function destroy(Mekanik $mekanik)
    {
        try {
            DB::beginTransaction();

            Mekanik::find($mekanik->id)->update([
                'statusHapus' => '1'
            ]);

            DB::commit();

            return redirect()->route('mekanik.index')->with('success', 'Data berhasil didelete');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
