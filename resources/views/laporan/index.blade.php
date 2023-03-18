@extends('layouts.master', ['title' => 'Rekap'])
@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item active"><a href="{{ route('laporan.index') }}">Rekap Perbaikan</a></li>
</ol>
<h1 class="page-header">Laporan</h1>
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">{{ $title }}</h4>
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="alert alert-info text-danger">
            * Untuk melakukan export perbaikan mohon lakukan filter terlebih dahulu.
        </div>

        <form action="" class="row">
            <div class="form-group col-md-3">
                <label for="date-input1">Tanggal</label>
                <input type="text" name="tanggal" class="form-control datetimes" value="{{ request('tanggal') ?? '' }}">
            </div>

            <div class="form-group col-md-3 mt-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                @if(request('tanggal'))
                <a href="{{ route('laporan.export') }}?tanggal={{ request('tanggal') }}" class="btn btn-success text-light"><i class="fas fa-file-excel"></i> Export</a>
                @endif
            </div>
        </form>
        {{-- @dd($perbaikan) --}}
         <div class="table-responsive mt-3 ">
            <table id="data-table-buttons" class="table table-striped table-bordered text-center align-middle fs-12px">
                <thead>
                    <tr>
                        <th class="text-nowrap" width="1%">No</th>
                        <th class="text-nowrap" width="20%">Tanggal</th>
                        <th class="text-nowrap" width="15%">Nama</th>
                        <th class="text-nowrap" width="20%">Bengkel</th>
                        <th class="text-nowrap" width="10%">Jenis</th>
                        <th class="text-nowrap" width="20%">Tipe</th>
                        <th class="text-nowrap" width="10%">Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perbaikan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->kerusakan->member->nama }}</td>
                            <td>{{ $item->mekanik->name }}</td>
                            <td>{{ $item->kerusakan->jenisKendaraan }}</td>
                            <td>{{ $item->kerusakan->tipeKendaraan }}</td>
                            <td>Rp{{ number_format($item->detail()->sum('nominal'), 0,'','.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
