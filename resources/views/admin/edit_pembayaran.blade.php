@extends('layouts.back')

@section('container')

    {{-- {{ dd($pembayaran) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Pembayaran Pasien</h2>
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
                @if ($pembayaran['id_pembayaran'] == null)
                    <form class="forms-sample" method="POST" action="/pembayaran" enctype="multipart/form-data">
                        <input type="hidden" name="id_pemeriksaan" value="{{ $pembayaran['id_pemeriksaan'] }}"
                            id="">
                    @else
                        <form class="forms-sample" method="POST" id="edit_pembayaran"
                            action="{{ route('pembayaran.update', $pembayaran['id_pembayaran']) }}"
                            enctype="multipart/form-data">
                            {{-- @method('PUT') --}}
                            {{ method_field('PUT') }}
                @endif
                @csrf
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Nama Pasien</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['nama_pasien'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Usia</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['usia'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Jenis Layanan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['jenis_layanan'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Keluhan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['keluhan'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Tanggal Pendaftaran</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['tanggal'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputpemeriksaanname2" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['keterangan'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hasil Pemeriksaaan</label>
                    <div class="col-sm-9">
                        <textarea name="" class="form-control" id="" readonly cols="30" rows="10">{{ $pembayaran['hasil_pemeriksaan'] }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Keterangan
                        Pemeriksaaan</label>
                    <div class="col-sm-9">
                        <textarea name="" class="form-control" id="" readonly cols="30" rows="10">{{ $pembayaran['keterangan_pemeriksaan'] }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tindakan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['tindakan'] }}">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Obat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['nama_obat'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Harga Obat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['harga_obat'] }}">
                        <input type="hidden" name="biaya_obat" value="{{ $pembayaran['harga_obat'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Biaya Tindakan</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" required name="biaya_tindakan" id=""
                            value="{{ $pembayaran['biaya_tindakan'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jasa Dokter</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" required name="jasa_dokter" id=""
                            value="{{ $pembayaran['jasa_dokter'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" readonly name="" id=""
                            value="{{ $pembayaran['total'] }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary" role="button">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            {{-- End Modal Edit pembayaran --}}

        </div>
    </div>

@endsection
