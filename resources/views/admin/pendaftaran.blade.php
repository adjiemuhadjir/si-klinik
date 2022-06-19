@extends('layouts.back')

@section('container')

    {{-- {{ dd($dokter) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Pendaftaran</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button data-toggle="modal" data-target="#tambah_pendaftaran"
                        class="mdi mdi-account-multiple-plus btn btn-success mt-2 mt-xl-0"> Tambah Pendaftaran</button>
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

    <!-- Modal Tambah pendaftaran-->
    <div class="modal fade" id="tambah_pendaftaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pendaftaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" id="form_pendaftaran" action="/pendaftaran"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Pasien</label>
                            <div class="col-sm-9">
                                <select name="id_pasien" required class="form-control" id="">
                                    @foreach ($pasien as $p)
                                        <option value="{{ $p['id'] }}">
                                            {{ $p['nama'] . ' ( Usia : ' . $p['usia'] . ' )' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Keluhan</label>
                            <div class="col-sm-9">
                                <textarea name="keluhan" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Jenis Layanan</label>
                            <div class="col-sm-9">
                                <select name="jenis_layanan" class="form-control" id="">
                                    <option value="Umum">Umum</option>
                                    <option value="BPJS">BPJS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Poli</label>
                            <div class="col-sm-9">
                                <select name="id_poli" class="form-control" id="">
                                    @foreach ($poli as $w)
                                        <option value="{{ $w['id'] }}">{{ $w['poli'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputpendaftaranname2" class="col-sm-3 col-form-label">Dokter</label>
                            <div class="col-sm-9">
                                <select name="id_dokter" class="form-control" id="">
                                    @foreach ($dokter as $w)
                                        <option value="{{ $w['id_dokter'] }}">{{ $w['nama_dokter'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Tambah pendaftaran --}}

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Striped Table</h4>
                <p class="card-description">
                    Add class <code>.table-striped</code>
                </p> --}}
                <div class="table-responsive">
                    <table class="table" id="anggota-partai">
                        <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Nama Pasien
                                </th>
                                <th>
                                    Keluhan
                                </th>
                                <th>
                                    Jenis Layanan
                                </th>
                                <th>
                                    Poli
                                </th>
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Dokter
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pendaftaran as $v)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $v['nama_pasien'] }}</td>
                                    <td>{{ $v['keluhan'] }}</td>
                                    <td>{{ $v['jenis_layanan'] }}</td>
                                    <td>{{ $v['poli'] }}</td>
                                    <td>{{ $v['tanggal'] }}</td>
                                    <td>{{ $v['nama_dokter'] }}</td>
                                    <td>
                                        <a class="mdi mdi-lead-pencil mr-3 icon-md btn-warning"
                                            href="/pendaftaran/{{ $v['id'] }}"></a>
                                        <a class="mdi mdi-delete icon-md btn-danger" title="Hapus pendaftaran"
                                            role="button"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus pendaftaran dengan nama {{ $v['nama_pasien'] }}?')"
                                            href="pendaftaran/hapus/{{ $v['id'] }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $pendaftaran->links() !!} --}}
                </div>

            </div>
        </div>
    </div>

@endsection
