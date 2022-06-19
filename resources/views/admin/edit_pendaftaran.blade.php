@extends('layouts.back')

@section('container')

    {{-- {{ dd($pendaftaran) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Edit Pendaftaran</h2>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- Modal Edit pendaftaran-->
                <form class="forms-sample" method="POST" id="edit_pendaftaran"
                    action="{{ route('pendaftaran.update', $pendaftaran['id']) }}" enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Nama Pasien</label>
                        <div class="col-sm-9">
                            <select name="id_pasien" required class="form-control" id="">
                                @foreach ($pasien as $p)
                                    <option value="{{ $p['id'] }}"
                                        <?= $pendaftaran['id_pegawai'] == $p['id'] ? 'selected' : '' ?>>
                                        {{ $p['nama'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Keluhan</label>
                        <div class="col-sm-9">
                            <textarea name="keluhan" class="form-control" id="" cols="30" rows="10">{{ $pendaftaran['keluhan'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Jenis Layanan</label>
                        <div class="col-sm-9">
                            <select name="jenis_layanan" required class="form-control" id="">
                                <option value="Umum" <?= $pendaftaran['jenis_layanan'] == 'Umum' ? 'selected' : '' ?>>Umum
                                </option>
                                <option value="BPJS" <?= $pendaftaran['jenis_layanan'] == 'BPJS' ? 'selected' : '' ?>>BPJS
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Poli</label>
                        <div class="col-sm-9">
                            <select name="id_poli" required class="form-control" id="">
                                @foreach ($poli as $w)
                                    <option value="{{ $w['id'] }}"
                                        <?= $pendaftaran['id_poli'] == $w['id'] ? 'selected' : '' ?>>
                                        {{ $w['poli'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal" class="form-control"
                                value="{{ $pendaftaran['tanggal'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Dokter</label>
                        <div class="col-sm-9">
                            <select name="id_dokter" required class="form-control" id="">
                                @foreach ($dokter as $w)
                                    <option value="{{ $w['id_dokter'] }}"
                                        <?= $pendaftaran['id_dokter'] == $w['id_dokter'] ? 'selected' : '' ?>>
                                        {{ $w['nama_dokter'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary" role="button">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            {{-- End Modal Edit pendaftaran --}}

        </div>
    </div>

@endsection
