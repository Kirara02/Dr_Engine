@extends('layouts.master', ['title' => 'Input Repair'])
@section('content')
<div class="panel">
  <div class="panel-heading bg-teal-600 text-white"></div>
    <div class="panel-body">
      <div class="nav-wizards-container">
        <nav class="nav nav-wizards-2 mb-3">
          <!-- completed -->
          <div class="nav-item col">
            <a class="nav-link {{ $status[0] }}" href="#">
              <div class="nav-text">1. Kerusakan</div>
            </a>
          </div>
      
          <!-- active -->
          <div class="nav-item col">
            <a class="nav-link {{ $status[1] }}" href="#">
              <div class="nav-text">2. Diagnosa Kerusakan</div>
            </a>
          </div>
      
          <!-- disabled -->
          <div class="nav-item col">
            <a class="nav-link {{ $status[2] }}" href="#">
              <div class="nav-text">3. Cari Mekanik</div>
            </a>
          </div>
        </nav>
      </div>


      @if ($status[0] == 'active')
        <div class="card mt-5">
          <div class="card-body">
            <form action="{{ route('service.kerusakan.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="form-label col-form-label col-md-3">Jenis Kendaraan *</label>
                <div class="col-md-2">
                  <select name="jenisKendaraan" id="" class="form-control">
                    <option disabled selected value="">-- Pilih Jenis Kendaraan --</option>
                    <option value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                  </select>
                </div>
                @error('jenisKendaraan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>  
              <div class="row mb-3">
                <label class="form-label col-form-label col-md-3">Tipe Kendaraan *</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="tipeKendaraan" id="tipeKendaraan"  placeholder="Tipe Kendaraan" value="{{ old('tipeKendaraan') }}" autocomplete="off"/>
                </div>
                @error('tipeKendaraan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>  
              <div class="row mb-3">
                <label class="form-label col-form-label col-md-3">Tahun Kendaraan *</label>
                <div class="col-md-2">
                  <input type="text" class="form-control" name="tahunKendaraan" id="tahunKendaraan"  placeholder="Tahun Kendaraan" value="{{ old('tahunKendaraan') }}" autocomplete="off"/>
                </div>
                @error('tahunKendaraan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>  
              <div class="row mb-3">
                <label class="form-label col-form-label col-md-3">Foto Kendaraan *</label>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="fotoKendaraan" id="fotoKendaraan"  placeholder="Foto Kendaraan" value="" autocomplete="off"/>
                </div>
                @error('fotoKendaraan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>  
              <div class="row">
                <div class="col-md-7 offset-md-3">
                  <button type="submit" class="btn btn-info w-100px me-5px">Next</button>
                </div>
              </div>
            </form>
          </div>
        </div>
       @elseIf($status[1] == 'active')
       <div class="card mt-5">
         <div class="card-body">
            <form action="{{ route('service.diagnosa.store') }}" method="post">
              @csrf
              <div class="row mb-3">
                <label class="form-label col-form-label col-md-3">Jenis Kerusakan *</label>
                <div class="col-md-4">
                  <select class="form-select" name="jenisKerusakan" id="jenisKerusakan">
                    <option disabled selected>-- Pilih Jenis Kerusakan --</option>
                    @foreach ($jenis as $item)
                    <option value="{{ $item->id }}">{{ $item->jenisKerusakan }}</option>
                    @endforeach
                  </select>
                </div>
                @error('jenisKerusakan')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="row mb-3">
                <label class="form-label col-form-label col-md-3">Keterangan *</label>
                <div class="col-md-7">
                  <textarea cols="30" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan" class="form-control" autocomplete="off"></textarea>
                </div>
                @error('keterangan')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="row">
                <div class="col-md-7 offset-md-3">
                  <button type="submit" class="btn btn-info w-100px me-5px">Tambah</button>
                  <a href="{{ route('service.mekanik') }}" class="btn btn-info">Next</a>
                </div>
              </div>
            </form>
            <hr class="mt-4 mb-4">
            <div class="row">
              <div class="table-responsive ">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th>Jenis Kerusakan</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @dd($diagnosa) --}}
                    @foreach ($diagnosa as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jenisKerusakan->jenisKerusakan }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td class="text-center">
                          <form id="form-delete" action="{{ url('repair/diagnosa/destroy/'. $item->id) }}" method="post" class="ms-1 d-inline">
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
          </div>
        </div>
        @else
        <div class="card mt-5">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <form action="{{ route('service.mekanik') }}" method="GET" class="d-flex">
                  <input type="text" name="cari" id="cari" class="form-control me-1" placeholder="Cari Mekanik">
                  <button class="btn btn-info">CARI</button>
                </form>
              </div>
            </div>
            <div class="row row-cols-4 mt-3">
              @foreach ($mekanik as $item)
              <form action="{{ route('service.mekanik.store') }}" method="post">
                @csrf
                <input type="hidden" name="idmekanik" value="{{ $item->id }}">        
                <div class="col mb-4">
                  <div class="card bg-dark border-0 text-white">
                    <div class="card-body">
                      <h4 class="card-title">{{ $item->name }}</h4>
                      <p class="card-text">Alamat : {{ $item->alamat }}</p>
                      <button type="button" class="btn btn-sm btn-lime me-1"><i class="fab fa-whatsapp"></i> Hubungi</button>
                      <button type="submit" class="btn btn-sm btn-primary">Pilih</button>
                    </div>
                  </div>
                </div>
              </form>
              @endforeach
            </div>
          </div>
       @endif
    </div>
</div>
@endsection
