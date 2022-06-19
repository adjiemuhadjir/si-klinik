@extends('layouts.back')

@section('container')

    {{-- {{ dd($pegawai) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Daftar User</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button data-toggle="modal" data-target="#tambah_user"
                        class="mdi mdi-account-multiple-plus btn btn-success mt-2 mt-xl-0"> Tambah User</button>
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

    <!-- Modal Tambah User-->
    <div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" id="form_user" action="/user" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pegawai</label>
                            <div class="col-sm-9">
                                <select name="id_pegawai" required class="form-control" id="">
                                    @foreach ($pegawai as $p)
                                        <option value="{{ $p['id'] }}">{{ $p['nama'] . ' (' . $p['email'] . ')' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <select name="role" class="form-control" id="">
                                    <option value="Petugas">Petugas</option>
                                    <option value="Dokter">Dokter</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Wilayah</label>
                            <div class="col-sm-9">
                                <select name="id_wilayah" class="form-control" id="">
                                    @foreach ($wilayah as $w)
                                        <option value="{{ $w['id'] }}">{{ $w['nama_wilayah'] }}</option>
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
    {{-- End Modal Tambah user --}}

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
                                    Nama Pegawai
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Wilayah
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
                            @foreach ($user as $v)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $v['nama'] }}</td>
                                    <td>{{ $v['role'] }}</td>
                                    <td>{{ $v['nama_wilayah'] }}</td>
                                    <td>
                                        <a class="mdi mdi-lead-pencil mr-3 icon-md btn-warning"
                                            href="/user/{{ $v['id'] }}"></a>
                                        <a class="mdi mdi-delete icon-md btn-danger" title="Hapus user" role="button"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus user dengan nama {{ $v['nama'] }}?')"
                                            href="user/hapus/{{ $v['id'] }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $user->links() !!} --}}
                </div>

            </div>
        </div>
    </div>

@endsection
