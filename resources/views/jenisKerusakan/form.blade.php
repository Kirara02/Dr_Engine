@extends('layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Master</a></li>
        <li class="breadcrumb-item"><a href="{{ route('jenis_kerusakan.index') }}">Jenis Kerusakan</a></li>
        <li class="breadcrumb-item active"><a href="javascript:;">Form</a></li>
    </ol>
    <h1 class="page-header">{{ $title }}</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-title">Form Input</div>
        </div>
        <div class="panel-body p-4">
            <form action="{{ $action }}" method="post">
                @method($method)
                @csrf
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">jenis Kerusakan *</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="jenisKerusakan" id="jenisKerusakan"  placeholder="Jenis Kerusakan" value="{{ $jenisKerusakan->jenisKerusakan ?? old('jenisKerusakan') }}" autocomplete="off"/>
                    </div>
                    @error('jenisKerusakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="form-label col-form-label col-md-3">Deskripsi *</label>
                    <div class="col-md-7">
                        <textarea cols="30" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control" autocomplete="off">{{ $jenisKerusakan->deskripsi ?? old('deskripsi') }}</textarea>
                    </div>
                    @error('deskripsi')
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