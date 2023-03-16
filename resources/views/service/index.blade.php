@extends('layouts.master', ['title' => 'Service'])
@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item active"><a href="{{ route('service.index') }}">Service</a></li>
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
    {{-- @dd($kerusakan) --}}
    <div class="panel-body">
        <a href="{{ route('service.kerusakan') }}" class="btn btn-inverse mb-3 align-middle"><i class="fas fa-plus"></i> Service</a>
        <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered text-center align-middle fs-13px">
                <thead>
                    <tr>
                        <th class="text-nowrap" width="1%">No</th>
                        <th class="text-nowrap" width="10%">Tanggal</th>
                        <th class="text-nowrap" width="30%">Bengkel</th>
                        <th class="text-nowrap" width="10%">Jenis</th>
                        <th class="text-nowrap" width="20%">Tipe</th>
                        <th class="text-nowrap" width="10%">Foto</th>
                        <th class="text-nowrap" width="5%">Status Perbaikan</th>
                        <th class="text-nowrap" width="5%">Status Pembayaran</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($kerusakan) --}}
                    @foreach($kerusakan as $item)
                    <tr>
                        <td class="text-nowrap">{{ $loop->iteration }}</td>
                        <td class="text-nowrap">{{ $item->perbaikan->tanggal }}</td>
                        <td class="class-nowrap">{{ $item->perbaikan->mekanik->name ?? 'belum ada'}}</td>
                        <td class="text-nowrap">{{ $item->jenisKendaraan }}</td>
                        <td class="text-nowrap">{{ $item->tipeKendaraan }}</td>
                        <td class="text-nowrap">
                            {{-- @dd($item->perbaikan->detail) --}}
                            <img src="{{ asset('./storage/'.$item->fotoKendaraan) }}" alt="" avatar-img rounded-circle" width="60">
                        </td>
                        <td class="class-nowrap text-light">
                            @if ($item->perbaikan->statusPerbaikan == 'pencarian')
                                <span class="bagde d-block bg-warning rounded-pill p-1">{{ $item->perbaikan->statusPerbaikan }}</span>
                            @elseif ($item->perbaikan->statusPerbaikan == 'proses')
                                <span class="bagde d-block bg-green rounded-pill p-1">{{ $item->perbaikan->statusPerbaikan }}</span>
                            @else
                                <span class="bagde d-block bg-indigo rounded-pill p-1">{{ $item->perbaikan->statusPerbaikan }}</span>
                            @endif
                        </td>
                        <td class="class-nowrap text-light" width="10%">
                            @if ($item->perbaikan->statusPembayaran == 'belum bayar')
                                <span class="bagde d-block bg-danger rounded-pill p-1">{{ $item->perbaikan->statusPembayaran }}</span>
                            @else
                                <span class="bagde d-block bg-success rounded-pill p-1">{{ $item->perbaikan->statusPembayaran }}</span>
                            @endif
                        </td>
                        <td class="text-nowrap d-flex justify-content-center align-middle" >
                            @if($item->perbaikan->statusPerbaikan != 'pencarian')
                            <a href="{{ route('service.detail', $item->id) }}" class="btn btn-info me-2"><i class="ion-md-eye"></i></a>
                            @endif
                            @if($item->perbaikan->statusPembayaran != 'sudah bayar' && $item->perbaikan->statusPerbaikan == 'selesai')
                            <a href="https://api.whatsapp.com/send?phone={{ $item->perbaikan->mekanik->member->nohp }}&text=Saya membayar sebesar Rp{{ number_format($item->perbaikan->detail()->sum('nominal'), 0,'','.') }}" class="btn btn-success me-2"><i class="ion-md-cash"></i></a>
                            @endif
                            @if($item->perbaikan->statusPerbaikan == 'proses' && count($item->perbaikan->detail->all()) > 0)
                            <form action="{{ route('service.statusPerbaikan', $item->id) }}" method="post">
                                @csrf
                                <button type="button" class="btn btn-secondary btn-status me-2"><i class="ion-md-checkmark align-middle"></i></button>
                            </form>
                            @endif
                            @if($item->perbaikan->statusPerbaikan == 'pencarian' && count($item->diagnosaKerusakan->all()) > 0)
                                <a href="{{ route('service.mekanik', $item->id) }}" class="btn btn-orange me-2"><i class="ion-md-search"></i></a>
                            @endif
                            @if($item->perbaikan->statusPerbaikan == 'pencarian' && count($item->diagnosaKerusakan->all()) < 1)
                                <a href="{{ route('service.diagnosa', $item->id) }}" class="btn btn-orange me-2"><i class="ion-md-construct"></i></a>
                            @endif
                            @if($item->perbaikan->statusPerbaikan == 'pencarian' )
                                <form id="form-delete" action="{{ route('service.delete', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="button" class="btn btn-danger me-2 btn-delete"><i class="fas fa-trash align-middle"></i></button>
                                </form>
                            @endif

                        </td>
                    </tmelr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
