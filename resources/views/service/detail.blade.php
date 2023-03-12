@extends('layouts.master', ['title' => $title])
@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Service</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <h1 class="page-header">{{ $title }}</h1>
    <div class="invoice">
        <!-- BEGIN invoice-company -->
        <div class="invoice-company">
            <span class="float-end hidden-print">
                <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white mb-10px"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            dr. Engine
        </div>
        <!-- END invoice-company -->
        <!-- BEGIN invoice-header -->
        <div class="invoice-header">
            <div class="invoice-from">
                <small>costumer</small>
                <address class="mt-5px mb-5px">
                    <strong class="text-inverse">{{ $perbaikan->kerusakan->member->nama }}</strong><br />
                    {{ $perbaikan->kerusakan->member->alamat }}<br/>
                    Phone: {{ $perbaikan->kerusakan->member->nohp }}<br/>
                </address>
            </div>
            <div class="invoice-to">
                <small>bengkel</small>
                <address class="mt-5px mb-5px">
                    <strong class="text-inverse">{{ $perbaikan->mekanik->name }}</strong><br />
                    {{ $perbaikan->mekanik->alamat }}<br/>
                    Phone: {{ $perbaikan->mekanik->member->nohp }}<br/>
                </address>
            </div>
            <div class="invoice-date">
                <div class="date text-inverse mt-5px">{{ \Carbon\Carbon::parse($perbaikan->tanggal)->format('F d,Y') }}</div>     
            </div>
        </div>
        {{-- @dd($perbaikan) --}}
        <!-- END invoice-header -->
        <!-- BEGIN invoice-content -->
        <div class="invoice-content">
            @if(count($perbaikan->detail) == 0)
            <div class="error h-150px">
                <div class="error-content">
                    <div class="error-message">Belum ada entri detail perbaikan</div>
                    <div class="error-desc mb-4">
                        Silahkan hubungi mekanik untuk menambah detail perbaikan.
                    </div>
                </div>
            </div>
            @else         
                <!-- BEGIN table-responsive -->
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class=" table-invoice table ">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Jenis Perbaikan</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            {{-- @dd($perbaikan) --}}
                            <tbody>
                                @foreach ($perbaikan->detail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->jenisPerbaikan }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>Rp{{ number_format($item->nominal,0,'','.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                <!-- END table-responsive -->
            @endif
            <!-- BEGIN invoice-price -->
            <div class="invoice-price">
                <div class="invoice-price-right">
                    <small>Nominal</small> <span class="fw-bold">Rp{{ number_format($perbaikan->detail()->sum('nominal'), 0,'','.') }}</span>
                </div>
            </div>
            <!-- END invoice-price -->
        </div>
        <!-- END invoice-content -->
    </div>

@endsection