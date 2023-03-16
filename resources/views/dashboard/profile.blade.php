@extends('layouts.master', ['title' => 'Profile'])
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
                    <h4 class="mt-0 mb-1">{{ auth()->user()->member->nama }}
                     @if (auth()->user()->member->mekanik != null && auth()->user()->member->mekanik->statusAktivasi == '1')
                        <span class="badge bg-indigo rounded-pill">Mekanik</span>
                     @elseif(auth()->user()->level == 'admin')
                        <span class="badge bg-indigo rounded-pill">Admin</span>
                     @else
                        <span class="badge bg-indigo rounded-pill">Member</span>
                     @endif
                    </h4>
                    <p>@'{{ auth()->user()->username }} </p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-xs btn-yellow">Edit Profile</a>
                </div>
                <!-- END profile-header-info -->
            </div>
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="javascript:;" class="nav-link active" data-bs-toggle="tab">Profile</a></li>
            </ul>
        </div>
    </div>
    <div class="profile-content">
        <div class="tab-content p-0">
            <div class="tab-pane fade show active" id="profile-about">
                <div class="table-responsive form-inline">
                    <table class="table table-profile align-middle">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <h4>{{ auth()->user()->member->nama }} </h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="highlight">
                                <td class="field">No NIK</td>
                                <td><i class="fa fa-address-card fa-lg me-5px"></i> {{ auth()->user()->member->nik }}</td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">No Handphone</td>
                                <td><i class="fa fa-mobile fa-lg me-5px"></i> {{ auth()->user()->member->nohp }}</td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Email</td>
                                <td><i class="fab fa-google fa-lg me-5px"></i> {{ auth()->user()->member->email }}</td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Alamat</td>
                                <td>{{ auth()->user()->member->alamat }}</td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Username</td>
                                <td>@'{{ auth()->user()->username }}</td>
                            </tr>
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                            @can('isMekanik')
                            <tr>
                                <td></td>
                                <td>
                                    <h5>Bengkel </h5>
                                </td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Nama Bengkel</td>
                                <td>{{ auth()->user()->member->mekanik()->where('statusHapus','0')->first()->name }}</td>
                            </tr>
                            <tr class="highlight">
                                <td class="field">Alamat Bengkel</td>
                                <td>{{ auth()->user()->member->mekanik()->where('statusHapus','0')->first()->alamat }}</td>
                            </tr>
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                            @endcan
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
