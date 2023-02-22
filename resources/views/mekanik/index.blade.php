@extends('layouts.master', ['title' => 'Mekanik'])
@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Master</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('mekanik.index') }}">Mekanik</a></li>
    </ol>
    <h1 class="page-header">Data Mekanik</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Data Mekanik</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            {{-- <a href="{{ route('mekanik.create') }}" class="btn btn-inverse mb-3 align-middle"><i class="fas fa-plus-circle"></i> Tambah Mekanik</a> --}}
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th class="text-nowrap">Nama</th>
                        <th class="text-nowrap">Alamat</th>
                        <th class="text-nowrap">Status Aktivasi</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mekanik as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->statusAktivasi == '1' ? 'Terdaftar' : 'Belum Diaktivasi' }}</td>
                            <td class="text-center justify-content-center d-flex">
                                <a href="{{ route('mekanik.edit', $item->id) }}" class="btn btn-success text-light"><i class="fas fa-edit align-middle"></i></a>
                                <form id="form-delete" action="{{ route('mekanik.destroy', $item->id) }}" method="post" class="ms-1 d-inline">
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
@endsection

@section('script')
    <script type="text/javascript">
        $('#data-table-default').DataTable({
            responsive: true
        });
    </script>
@endsection