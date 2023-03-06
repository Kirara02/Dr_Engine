@extends('layouts.master', ['title' => 'Detail Perbaikan'])
@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item "><a href="{{ route('perbaikan.index') }}">Perbaikan</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('perbaikan.detail', $id) }}">Detail</a></li>
</ol>
<h1 class="page-header">Detail Perbaikan</h1>
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Data Detail Perbaikan</h4>
    </div>
    <div class="panel-body">
        <form action="{{ url('perbaikan/detail/'.$id.'/create') }}" method="post">
            @csrf
            <div class="row mb-3">
                <label class="form-label col-form-label col-md-2">Jenis Perbaikan *</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="jenisPerbaikan" id="jenisPerbaikan" autocomplete="off" placeholder="Jenis Perbaikan">
                </div>
                @error('jenisPerbaikan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row mb-3">
                <label class="form-label col-form-label col-md-2">Nominal Rp. *</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="nominal" id="nominal" autocomplete="off" placeholder="Nominal">
                </div>
                @error('nominal')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row mb-3">
                <label class="form-label col-form-label col-md-2">Keterangan *</label>
                <div class="col-md-7">
                    <textarea cols="20" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan" class="form-control" autocomplete="off"></textarea>
                </div>
                @error('keterangan')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-7 offset-md-2">
                    <button type="submit" class="btn btn-info w-100px me-5px">Tambah</button>
                </div>
            </div>    
        </form>
        <hr class="mt-4 mb-4">
            <div class="row">
              <div class="table-responsive ">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th>Jenis Perbaikan</th>
                      <th>Keterangan</th>
                      <th>Nominal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @dd($detail) --}}
                    @foreach ($detail as $item)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jenisPerbaikan }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->nominal }}</td>
                    <td class="text-center">
                        <form id="form-delete" action="{{ url('perbaikan/detail/'.$item->id.'/delete') }}" method="post" class="ms-1 d-inline">
                        @csrf
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash align-middle"></i></button>
                    </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection