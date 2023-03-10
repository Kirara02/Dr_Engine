@extends('layouts.master', ['title' => 'Member'])
@section('content')
    
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Master</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('members.index') }}">Member</a></li>
    </ol>
    <h1 class="page-header">Data Member</h1>
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
            @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{Session::get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
    </div>
    @endif
            <a href="{{ route('members.create') }}" class="btn btn-inverse mb-3 align-middle"><i class="fas fa-plus"></i> Tambah Member</a>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th class="text-nowrap" width="1%">No</th>
                            <th class="text-nowrap">Nama</th>
                            <th class="text-nowrap">NoHp</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">NIK</th>
                            <th class="text-nowrap">Foto</th>
                            <th class="text-nowrap">KTP</th>
                            <th class="text-nowrap">Alamat</th>
                            <th class="text-nowrap">Username</th>
                            <th class="text-nowrap">Level</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member as $item)
                        <tr>
                            <td class="text-nowrap">{{ $loop->iteration }}</td>
                            <td class="text-nowrap">{{ $item->nama }}</td>
                            <td class="text-nowrap">{{ $item->nohp }}</td>
                            <td class="text-nowrap">{{ $item->email }}</td>
                            <td class="text-nowrap">{{ $item->nik }}</td>
                            <td class="text-nowrap">
                                <img src="{{ asset('storage/'.$item->ktp) }}" alt="" avatar-img rounded-circle" width="40px">
                            </td>
                            <td class="text-nowrap">
                                <img src="{{ asset('storage/'.$item->foto) }}" alt="" avatar-img rounded-circle" width="40px">
                            </td>
                            <td class="text-nowrap">{{ $item->alamat }}</td>
                            <td class="text-nowrap">{{ $item->user->username }}</td>
                            <td class="text-nowrap">{{ $item->user->level }}</td>
                            <td class="text-nowrap d-flex">
                                <a href="{{ route('members.edit', $item->id) }}" class="btn btn-success text-light"><i class="fas fa-edit align-middle"></i></a>
                                <form id="form-delete" action="{{ route('members.destroy', $item->id) }}" method="post" class="ms-2 d-inline">
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