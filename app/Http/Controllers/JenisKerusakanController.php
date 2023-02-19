<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKerusakan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\jenisKerusakan\CreateJenisKerusakanRequest;
use App\Http\Requests\jenisKerusakan\UpdateJenisKerusakanRequest;

class JenisKerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jenisKerusakan'] = JenisKerusakan::all();
        return view('jenisKerusakan.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisKerusakan = new JenisKerusakan();
        $action = route('jenis_kerusakan.store');
        $method= 'POST';
        $title = 'Tambah Jenis Kerusakan';
        
        return view('jenisKerusakan.form', compact('jenisKerusakan','action','method','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJenisKerusakanRequest $request)
    {
        try {
            DB::beginTransaction();

            JenisKerusakan::create($request->all());

            DB::commit();

            return redirect()->route('jenis_kerusakan.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(JenisKerusakan $jenisKerusakan)
    {
        $action = route('jenis_kerusakan.update', $jenisKerusakan->id);
        $method = 'PUT';
        $title = 'Update Jenis Kerusakan';
        return view('jenisKerusakan.form', compact('jenisKerusakan', 'action', 'method', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisKerusakanRequest $request, JenisKerusakan $jenis)
    {
        try {
            DB::beginTransaction();
            $jenis->update($request->all());

            DB::commit();

            return redirect()->route('jenis_kerusakan.index')->with('success', 'Data berhasil diubah');
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
    public function destroy(JenisKerusakan $jenisKerusakan)
    {
        try {
            DB::beginTransaction();

            $jenisKerusakan->delete();

            DB::commit();

            return redirect()->route('jenis_kerusakan.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
