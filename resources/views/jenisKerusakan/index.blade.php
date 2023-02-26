@extends('layouts.master', ['title' => 'Jenis Kerusakan'])
@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Master</a></li>
        <li class="breadcrumb-item"><a href="{{ route('jenis_kerusakan.index') }}">Jenis Kerusakan</a></li>
    </ol>
    <h1 class="page-header">Data Jenis Kerusakan</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Data Jenis Kerusakan</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <a href="{{ route('jenis_kerusakan.create') }}" class="btn btn-inverse mb-3 align-middle"><i class="fas fa-plus-circle"></i> Tambah Jenis Kerusakan</a>
            <div class="table-responsive">
                <table id="data-table-default" class="table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th class="text-nowrap">Jenis Kerusakan</th>
                            <th class="text-nowrap">Deskripsi</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenisKerusakan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jenisKerusakan }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td class="text-center ">
                                    <a href="{{ route('jenis_kerusakan.edit', $item->id) }}" class="btn btn-success text-light"><i class="fas fa-edit align-middle"></i></a>
                                    <form id="form-delete" action="{{ route('jenis_kerusakan.destroy', $item->id) }}" method="post" class="d-inline">
                                        @method('delete')
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
@endsection