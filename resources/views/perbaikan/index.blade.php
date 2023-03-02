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
                        <th class="text-nowrap" width="40%">Bengkel</th>
                        <th class="text-nowrap" width="10%">Jenis</th>
                        <th class="text-nowrap" width="20%">Tipe</th>
                        <th class="text-nowrap" width="10%">Foto</th>
                        <th class="text-nowrap" width="10%">Status Perbaikan</th>
                        <th class="text-nowrap" width="10%">Status Pembayaran</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($perbaikan) --}}
                    @foreach($perbaikan as $item)
                    <tr>
                        <td class="text-nowrap">{{ $loop->iteration }}</td>
                        <td class="text-nowrap">{{ $item->tanggal }}</td>
                        <td class="class-nowrap">{{ $item->mekanik->name }}</td>
                        <td class="text-nowrap">{{ $item->kerusakan->jenisKendaraan }}</td>
                        <td class="text-nowrap">{{ $item->kerusakan->tipeKendaraan }}</td>
                        <td class="text-nowrap">
                            <img src="{{ asset('./storage/'.$item->kerusakan->fotoKendaraan) }}" alt="" avatar-img rounded-circle" width="80">
                        </td>
                        <td class="class-nowrap">{{ $item->statusPerbaikan }}</td>
                        <td class="class-nowrap">{{ $item->statusPembayaran }}</td>
                        <td class="text-nowrap align-middle text-center dropdown">
                            <a href="" class="btn btn-inverse dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="ion-md-more fs-18px"></i>
                            </a>
                            <div class="dropdown-menu w-50 fs-13px">
                                @if($item->statusPembayaran == 'belum bayar' && auth()->user()->level != 'admin')
                                <a href="#modal-pembayaran" class="dropdown-item" data-bs-toggle="modal"><i class="fas fa-money-bill-alt align-middle me-2"></i>Pembayaran</a>
                                <div class="dropdown-divider"></div>
                                @endif
                                <a href="{{ route('perbaikan.show',$item->id) }}" class="dropdown-item"><i class="fas fa-eye align-middle me-2"></i>Detail</a>
                            </div>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="modal-pembayaran">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Pembayaran</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <form action="{{ route('perbaikan.update', $item->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body p-2 justify-content-center">
                                            <div class="row mb-3">
                                                <label class="form-label col-form-label col-md-4">Nominal Rp. *</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="nominal" id="nominal" autocomplete="off" placeholder="Nominal">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="form-label col-form-label col-md-4">Keterangan *</label>
                                                <div class="col-md-7">
                                                    <textarea cols="20" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan" class="form-control" autocomplete="off"></textarea>
                                                </div>
                                                @error('keterangan')
                                                  <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Done</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
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