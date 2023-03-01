@extends('layouts.master', ['title' => 'Perbaikan']);')
@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item active"><a href="{{ route('perbaikan.index') }}">Perbaikan</a></li>
</ol>
<h1 class="page-header">Data Perbaikan</h1>
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Data Perbaikan</h4>
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="panel-body">
         <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered text-center align-middle fs-11px">
                <thead>
                    <tr>
                        <th class="text-nowrap" width="1%">No</th>
                        <th class="text-nowrap" width="10%">Tanggal</th>
                        <th class="text-nowrap" width="10%">Jenis</th>
                        <th class="text-nowrap" width="20%">Tipe</th>
                        <th class="text-nowrap" width="10%">Foto</th>
                        <th class="text-nowrap" width="10%">Status Perbaikan</th>
                        <th class="text-nowrap" width="10%">Status Pembayaran</th>
                        <th class="text-nowrap" width="40%">Bengkel</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($perbaikan) --}}
                    @foreach($perbaikan as $item)
                    <tr>
                        <td class="text-nowrap">{{ $loop->iteration }}</td>
                        <td class="text-nowrap">{{ $item->tanggal }}</td>
                        <td class="text-nowrap">{{ $item->kerusakan->jenisKendaraan }}</td>
                        <td class="text-nowrap">{{ $item->kerusakan->tipeKendaraan }}</td>
                        <td class="text-nowrap">
                            <img src="{{ asset('./storage/'.$item->kerusakan->fotoKendaraan) }}" alt="" avatar-img rounded-circle" width="80">
                        </td>
                        <td class="class-nowrap">{{ $item->statusPerbaikan }}</td>
                        <td class="class-nowrap">{{ $item->statusPembayaran }}</td>
                        <td class="class-nowrap">{{ $item->mekanik->name }}</td>
                        <td class="text-nowrap align-middle text-center dropdown">
                            <a href="" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="ion-md-more fs-18px"></i>
                            </a>
                            <div class="dropdown-menu fs-13px">
                                <a href="{{ route('perbaikan.show',$item->id) }}" class="btn btn-success text-light"><i class="fas fa-eye align-middle"></i></a>
                                <div class="dropdown-divider"></div>
                                <a href="" class="btn btn-orange text-light"><i class="fas fa-edit align-middle"></i></a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" class="dropdown-item"><i class="ion-md-eye me-2"></i>  Detail</a>
                                @if($item->perbaikan->statusPerbaikan != 'selesai')
                                <div class="dropdown-divider"></div>
                                    <form action="{{ route('service.status', $item->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="ion-md-checkmark me-2"></i> Selesaikan Perbaikan</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection