@extends('layouts.master', ['title' => 'Service'])
@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item active"><a href="{{ route('service.index') }}">Repair</a></li>
</ol>
<h1 class="page-header">Data Service</h1>
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Data Service</h4>
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <a href="{{ route('service.kerusakan') }}" class="btn btn-inverse mb-3 align-middle"><i class="fas fa-plus"></i> Service</a>
        <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered text-center align-middle fs-14px">
                <thead>
                    <tr>
                        <th class="text-nowrap" width="1%">No</th>
                        <th class="text-nowrap" width="1%">Tanggal</th>
                        <th class="text-nowrap" width="10%">Jenis Kendaraan</th>
                        <th class="text-nowrap" width="30%">Tipe Kendaraan</th>
                        <th class="text-nowrap" width="10%">Tahun Kendaraan</th>
                        <th class="text-nowrap" width="20%">Foto Kendaraan</th>
                        <th class="text-nowrap" width="10%">Status Perbaikan</th>
                        <th class="text-nowrap" width="30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($kerusakan) --}}
                    @foreach($kerusakan as $item)
                    <tr>
                        <td class="text-nowrap">{{ $loop->iteration }}</td>
                        <td class="text-nowrap">{{ $item->perbaikan->tanggal }}</td>
                        <td class="text-nowrap">{{ $item->jenisKendaraan }}</td>
                        <td class="text-nowrap">{{ $item->tipeKendaraan }}</td>
                        <td class="text-nowrap">{{ $item->tahunKendaraan }}</td>
                        <td class="text-nowrap">
                            <img src="{{ asset('./storage/'.$item->fotoKendaraan) }}" alt="" avatar-img rounded-circle" width="60">
                        </td>
                        <td class="text-nowrap">{{ $item->perbaikan->statusPerbaikan }}</td>
                        <td class="text-nowrap d-flex justify-content-around align-middle">
                            <a href="javascript:;" class="btn btn-lime"><i class="ion-md-eye text-center"></i></a>
                            @if($item->perbaikan->statusPerbaikan != 'selesai')
                            <form action="{{ route('service.status', $item->id) }}" method="post">
                                @csrf
                                <button type="button" class="btn btn-secondary btn-status"><i class="ion-md-checkmark align-middle"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection