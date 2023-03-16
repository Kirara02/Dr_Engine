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
					<div class="widget widget-stats bg-teal">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-users"></i></div>
						<div class="stats-content">
							<div class="stats-title">MEMBERS</div>
							<div class="stats-number">{{ App\Models\Member::count() ?? 0 }}</div>
						</div>
					</div>
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-cogs"></i></div>
						<div class="stats-content">
							<div class="stats-title">MEKANIKS</div>
							<div class="stats-number">{{ App\Models\Mekanik::where('statusAktivasi',1)->where('statusHapus','0')->count() ?? 0 }}</div>
						</div>
					</div>
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-indigo">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-recycle"></i></div>
						<div class="stats-content">
							<div class="stats-title">REPAIRS</div>
							<div class="stats-number">
								@if (auth()->user()->level == 'admin')
								<p>{{ App\Models\Perbaikan::where('statusPerbaikan','=','selesai')->count() ?? 0 }}</p>
							@elseif(auth()->user()->member->mekanik != null)
								<p>{{ App\Models\Perbaikan::where('statusPerbaikan','=','selesai')->where('idmekanik',auth()->user()->member->mekanik()->where('statusHapus','0')->first()->id)->count() ?? 0 }}</p>
							@else
								<p>{{ App\Models\Kerusakan::where('idmember',auth()->user()->member->id)->count() ?? 0 }}</p>
							@endif
							</div>
						</div>
					</div>
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-dark">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-bug"></i></div>
						<div class="stats-content">
							<div class="stats-title">REPAIR TYPES</div>
							<div class="stats-number">{{ App\Models\JenisKerusakan::count() ?? 0 }}</div>
						</div>
					</div>
				</div>
				<!-- END col-3 -->
			</div>
			<!-- END row -->

@stop
