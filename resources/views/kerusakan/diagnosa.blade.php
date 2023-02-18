@extends('layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Diagnosa</a></li>
    </ol>
    <h1 class="page-header">Data Diagnosa</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Data Diagnosa</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <a href="" class="btn btn-inverse mb-3 align-middle"><i class="fas fa-plus-circle"></i> Tambah Diagnosa</a>
            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%"></th>
                        <th width="1%" data-orderable="false"></th>
                        <th class="text-nowrap">Rendering engine</th>
                        <th class="text-nowrap">Browser</th>
                        <th class="text-nowrap">Platform(s)</th>
                        <th class="text-nowrap">Engine version</th>
                        <th class="text-nowrap">CSS grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-inverse">1</td>
                        <td width="1%" class="with-img"><img src="../assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
                        <td>Trident</td>
                        <td>Internet Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td>4</td>
                        <td>X</td>
                    </tr>
                    <tr class="even gradeC">
                        <td class="fw-bold text-inverse">2</td>
                        <td class="with-img"><img src="../assets/img/user/user-2.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
                        <td>Trident</td>
                        <td>Internet Explorer 5.0</td>
                        <td>Win 95+</td>
                        <td>5</td>
                        <td>C</td>
                    </tr>
                    <tr class="odd gradeA">
                        <td class="fw-bold text-inverse">3</td>
                        <td class="with-img"><img src="../assets/img/user/user-3.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
                        <td>Trident</td>
                        <td>Internet Explorer 5.5</td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                        <td>A</td>
                    </tr>
                    <tr class="even gradeA">
                        <td class="fw-bold text-inverse">4</td>
                        <td class="with-img"><img src="../assets/img/user/user-4.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
                        <td>Trident</td>
                        <td>Internet Explorer 6</td>
                        <td>Win 98+</td>
                        <td>6</td>
                        <td>A</td>
                    </tr>
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