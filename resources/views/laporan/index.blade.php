@extends('layouts.master', ['title' => 'Rekap'])
@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item active"><a href="{{ route('laporan.index') }}">Perbaikan</a></li>
</ol>
<h1 class="page-header">Laporan</h1>
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Rekap Perbaikan</h4>
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="panel-body">
         <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered text-center align-middle fs-12px">
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>
                                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection