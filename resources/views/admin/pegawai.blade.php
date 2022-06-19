@extends('layouts.back')

@section('container')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Daftar Pegawai</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button data-toggle="modal" data-target="#tambah_pegawai"
                        class="mdi mdi-account-multiple-plus btn btn-success mt-2 mt-xl-0"> Tambah Pegawai</button>
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

    <!-- Modal Tambah Pegawai-->
    <div class="modal fade" id="tambah_pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" id="form_pegawai" action="/pegawai"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-9">
                                <input type="text" required name="nama" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" required name="email" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" required name="password" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Telp.</label>
                            <div class="col-sm-9">
                                <input type="text" required name="telp" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <textarea name="alamat" class="form-control" required id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" required name="tanggal_lahir" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Agama</label>
                            <div class="col-sm-9">
                                <select name="agama" required class="form-control" id="">
                                    <option value="Islam">Islam</option>
                                    <option value="Kahtolik">Kahtolik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Poli</label>
                            <div class="col-sm-9">
                                <select name="poli" required class="form-control" id="">
                                    @foreach ($poli as $p)
                                        <option value="{{ $p['id'] }}">{{ $p['poli'] }}</option>
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
    {{-- End Modal Tambah Pegawai --}}

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
                                    Nama
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Telepon
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Tanggal Lahir
                                </th>
                                <th>
                                    Agama
                                </th>
                                <th>
                                    Poli
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
                            @foreach ($pegawai as $v)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $v['nama'] }}</td>
                                    <td>{{ $v['email'] }}</td>
                                    <td>{{ $v['telp'] }}</td>
                                    <td>{{ $v['alamat'] }}</td>
                                    <td>{{ $v['tanggal_lahir'] }}</td>
                                    <td>{{ $v['agama'] }}</td>
                                    <td>{{ $v['nama_poli'] }}</td>
                                    <td>
                                        <a class="mdi mdi-lead-pencil mr-3 icon-md btn-warning"
                                            href="/pegawai/{{ $v['id'] }}"></a>
                                        <a class="mdi mdi-delete icon-md btn-danger" title="Hapus Pegawai" role="button"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus Pegawai dengan nama {{ $v['nama'] }}?')"
                                            href="pegawai/hapus/{{ $v['id'] }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $pegawai->links() !!} --}}
                </div>

            </div>
        </div>
    </div>

@endsection
