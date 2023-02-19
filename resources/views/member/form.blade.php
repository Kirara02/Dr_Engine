@extends('layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Member</a></li>
        <li class="breadcrumb-item active"><a href="javascript:;">Form</a></li>
    </ol>
    <h1 class="page-header">{{ $title }}</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-title">Form Input</div>
        </div>
        <div class="panel-body p-4">
            <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                @method($method)
                @csrf
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Nama Lengkap *</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="nama" id="nama"  placeholder="Nama Lengkap" value="{{ $member->nama ?? old('nama') }}" autocomplete="off"/>
                    </div>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">No Handphone *</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No Handphone" value="{{ $member->nohp ?? old('nohp') }}" autocomplete="off"/>
                    </div>
                    @error('nohp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Email *</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $member->email ?? old('email') }}" autocomplete="off"/>
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">No KTP *</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="ktp" id="ktp" placeholder="No KTP" value="{{ $member->ktp ?? old('ktp') }}" autocomplete="off"/>
                    </div>
                    @error('ktp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Alamat</label>
                    <div class="col-md-7">
                        <textarea cols="30" rows="3" name="alamat" id="alamat" placeholder="Alamat" class="form-control" autocomplete="off">{{ $member->alamat ?? old('alamat') }}</textarea>
                    </div>
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Foto *</label>
                    <div class="col-md-4">
                      <input type="file" class="form-control" name="foto" value="{{ old('foto') }}" id="foto" autocomplete="off"/>
                    </div>
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Username *</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ $member->user->username ?? old('username') }}" autocomplete="off"/>
                    </div>
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Level *</label>
                    <div class="col-md-4">
                        <select class="form-select" name="level" id="level">
                            <option disabled selected>-- Pilih Level --</option>
                            <option {{ request()->is('members/'. $member->id.'/edit') && $member->user->level  == 'admin' ? 'selected' : ''}} value="admin">Admin</option>
                            <option {{ request()->is('members/'. $member->id.'/edit') && $member->user->level  == 'member' ? 'selected' : ''}} value="member">Member</option>
                        </select>
                    </div>
                    @error('level')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Password *</label>
                    <div class="col-md-4">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ old('password') }}" autocomplete="off"/>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-7 offset-md-3">
                        <button type="submit" class="btn btn-primary w-100px me-5px">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection