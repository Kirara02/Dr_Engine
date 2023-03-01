@extends('layouts.master', ['title' => $title])
@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="{{ route('perbaikan.index') }}">Perbaikan</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <h1 class="page-header">{{ $title }}</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-title">Detail</div>
        </div>
        <div class="panel-body p-4"></div>
    </div>
@endsection