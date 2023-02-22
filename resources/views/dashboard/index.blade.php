@extends('layouts.master', ['title' => 'Dashboard'])
@section('content')
    <!-- BEGIN breadcrumb -->
			<ol class="breadcrumb float-xl-end">
				<li class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></li>
			</ol>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header">Dashboard</h1>
			<!-- END page-header -->
			<!-- BEGIN row -->
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-lime">
						Selamat datang {{ auth()->user()->member->nama }}, Have a nice day :)
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fas fa-users"></i></div>
						<div class="stats-info">
							<h4>Member</h4>
							<p>{{ App\Models\Member::count() ?? 0 }}</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fas fa-cogs"></i></div>
						<div class="stats-info">
							<h4>Mekanik</h4>
							<p>{{ App\Models\Mekanik::where('statusAktivasi',1)->count() ?? 0 }}</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-info">
						<div class="stats-icon"><i class="fas fa-recycle"></i></div>
						<div class="stats-info">
							<h4>Perbaikan</h4>
							<p>{{ App\Models\Perbaikan::count() ?? 0 }}</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-orange">
						<div class="stats-icon"><i class="fas fa-bug"></i></div>
						<div class="stats-info">
							<h4>Jenis Kerusakan</h4>
							<p>{{ App\Models\JenisKerusakan::count() ?? 0 }}</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- END row -->

@stop