@extends('layouts.back')

@section('container')

    {{-- {{ dd($pendaftaran) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Pemeriksaan Pasien</h2>
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
                <!-- Modal Edit pemeriksaan-->
                @if ($pendaftaran['id_pemeriksaan'] == null)
                    <form class="forms-sample" method="POST" action="/pemeriksaan" enctype="multipart/form-data">
                        <input type="hidden" name="id_pendaftaran" value="{{ $pendaftaran['id'] }}" id="">
                    @else
                        <form class="forms-sample" method="POST" id="edit_pemeriksaan"
                            action="{{ route('pemeriksaan.update', $pendaftaran['id_pemeriksaan']) }}"
                            enctype="multipart/form-data">
                            {{-- @method('PUT') --}}
                            {{ method_field('PUT') }}
                @endif
                @csrf
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Nama Pasien</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pendaftaran['nama_pasien'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Usia</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pendaftaran['usia'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Jenis Layanan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pendaftaran['jenis_layanan'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Keluhan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pendaftaran['keluhan'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pendaftaran['tanggal'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pendaftaran['keterangan'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hasil Pemeriksaaan</label>
                    <div class="col-sm-9">
                        <textarea name="hasil_pemeriksaan" class="form-control" id="" cols="30" rows="10">{{ $pendaftaran['hasil_pemeriksaan'] }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Keterangan
                        Pemeriksaaan</label>
                    <div class="col-sm-9">
                        <textarea name="keterangan_pemeriksaan" class="form-control" id="" cols="30" rows="10">{{ $pendaftaran['keterangan_pemeriksaan'] }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tindakan</label>
                    <div class="col-sm-9">
                        <select name="id_tindakan" required class="form-control" id="">
                            <option value="">-- Pilih Tindakan --</option>
                            @foreach ($tindakan as $p)
                                <option value="{{ $p['id'] }}"
                                    <?= $pendaftaran['id_tindakan'] == $p['id'] ? 'selected' : '' ?>>
                                    {{ $p['tindakan'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Obat</label>
                    <div class="col-sm-9">
                        <select name="id_obat" required class="form-control" id="">
                            <option value="">-- Pilih Obat --</option>
                            @foreach ($obat as $p)
                                <option value="{{ $p['id'] }}"
                                    <?= $pendaftaran['id_obat'] == $p['id'] ? 'selected' : '' ?>>
                                    {{ $p['nama_obat'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('pemeriksaan.index') }}" class="btn btn-secondary" role="button">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            {{-- End Modal Edit pemeriksaan --}}

        </div>
    </div>

@endsection
