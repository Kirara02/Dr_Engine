@extends('layouts.master', ['title' => 'Repair'])
@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item active"><a href="{{ route('repair.index') }}">Repair</a></li>
</ol>
<h1 class="page-header">Data Repair</h1>
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Data Member</h4>
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <a href="{{ route('repair.kerusakan') }}" class="btn btn-inverse mb-3 align-middle"><i class="fas fa-plus"></i> Repair</a>
        <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered align-middle fs-14px">
                <thead>
                    <tr>
                        <th class="text-nowrap" width="1%">No</th>
                        <th class="text-nowrap" width="10%">Jenis Kendaraan</th>
                        <th class="text-nowrap" width="30%">Tipe Kendaraan</th>
                        <th class="text-nowrap" width="20%">Tahun Kendaraan</th>
                        <th class="text-nowrap" width="20%">Foto Kendaraan</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($kerusakan) --}}
                    @foreach($kerusakan as $item)
                    <tr>
                        <td class="text-nowrap">{{ $loop->iteration }}</td>
                        <td class="text-nowrap">{{ $item->jenisKendaraan }}</td>
                        <td class="text-nowrap">{{ $item->tipeKendaraan }}</td>
                        <td class="text-nowrap">{{ $item->tahunKendaraan }}</td>
                        <td class="text-nowrap">
                            <img src="{{ asset('./storage/'.$item->fotoKendaraan) }}" alt="" avatar-img rounded-circle" width="80">
                        </td>
                        <td class="text-nowrap text-center">
                            <a href="" class="btn btn-success text-light"><i class="fas fa-eye align-middle"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection