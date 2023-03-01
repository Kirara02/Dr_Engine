@extends('layouts.master', ['title' => 'Edit Profile'])
@section('content')
    <div class="profile">
        <div class="profile-header">
            <div class="profile-header-cover"></div>
            <div class="profile-header-content">
                <!-- BEGIN profile-header-img -->
                <div class="profile-header-img">
                    <img src="{{ asset('/storage/'. auth()->user()->member->foto) }}" alt="" />
                </div>
                <!-- END profile-header-img -->
                <!-- BEGIN profile-header-info -->
            
                <div class="profile-header-info">
                    <h4 class="mt-0 mb-1">{{ auth()->user()->member->nama }}</h4>
                    <p>@'{{ auth()->user()->username }}</p>
                    <div class="btn btn-xs btn-default">{{ auth()->user()->level }}</div>
                </div>
                <!-- END profile-header-info -->
            </div>
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile-about" class="nav-link active" data-bs-toggle="tab">Profile</a></li>
            </ul>
        </div>
    </div>
    <div class="profile-content">
        <div class="tab-content p-0">
            <div class="tab-pane fade show active" id="profile-about">
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Nama Lengkap *</label>
                        <div class="col-md-4">
                        <input type="text" class="form-control" name="nama" id="nama"  placeholder="Nama Lengkap" value="{{ auth()->user()->member->nama }}" autocomplete="off"/>
                        </div>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">No Handphone *</label>
                        <div class="col-md-4">
                        <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No Handphone" value="{{ auth()->user()->member->nohp }}" autocomplete="off"/>
                        </div>
                        @error('nohp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Email *</label>
                        <div class="col-md-4">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ auth()->user()->member->email }}" autocomplete="off"/>
                        </div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">NIK *</label>
                        <div class="col-md-4">
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="{{ auth()->user()->member->nik }}" autocomplete="off"/>
                        </div>
                        @error('nik')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">KTP *</label>
                        <div class="col-md-4">
                        <input type="file" class="form-control" name="ktp" value={{ auth()->user()->member->ktp }}" id="ktp" autocomplete="off"/>
                        </div>
                        @error('ktp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Foto *</label>
                        <div class="col-md-4">
                        <input type="file" class="form-control" name="foto" value={{ auth()->user()->member->foto }}" id="foto" autocomplete="off"/>
                        </div>
                        @error('foto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Alamat</label>
                        <div class="col-md-4">
                            <textarea cols="30" rows="3" name="alamat" id="alamat" placeholder="Alamat" class="form-control" autocomplete="off">{{ auth()->user()->member->alamat }}</textarea>
                        </div>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Username *</label>
                        <div class="col-md-4">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ auth()->user()->username ?? old('username') }}" autocomplete="off"/>
                        </div>
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @can('isMekanik')   
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Nama Bengkel *</label>
                        <div class="col-md-4">
                        <input type="text" class="form-control" name="nama_bengkel" id="nama_bengkel" placeholder="Username" value="{{ auth()->user()->member->mekanik->name ?? old('nama_bengkel') }}" autocomplete="off"/>
                        </div>
                        @error('nama_bengkel')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Alamat Bengkel</label>
                        <div class="col-md-4">
                            <textarea cols="30" rows="3" name="alamat_bengkel" id="alamat_bengkel" placeholder="Alamat" class="form-control" autocomplete="off">{{ auth()->user()->member->mekanik->alamat }}</textarea>
                        </div>
                        @error('alamat_bengkel')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @endcan
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Password *</label>
                        <div class="col-md-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" autocomplete="off"/>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-form-label col-md-3">Confirm Password *</label>
                        <div class="col-md-4">
                        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password" value="" autocomplete="off"/>
                        </div>
                        @error('confirm')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary w-100px me-5px">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection