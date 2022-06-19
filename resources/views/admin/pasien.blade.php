@extends('layouts.back')

@section('container')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Daftar Pasien</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button data-toggle="modal" data-target="#tambah_pasien"
                        class="mdi mdi-account-multiple-plus btn btn-success mt-2 mt-xl-0"> Tambah Pasien</button>
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

    <!-- Modal Tambah pasien-->
    <div class="modal fade" id="tambah_pasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" id="form_pasien" action="/pasien"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nomor</label>
                            <div class="col-sm-9">
                                <input type="text" required name="nomor" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" required name="nama" class="form-control"
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
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Telp.</label>
                            <div class="col-sm-9">
                                <input type="text" required name="telp" class="form-control"
                                    id="exampleInputUsername2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Usia</label>
                            <div class="col-sm-9">
                                <input type="text" required name="usia" class="form-control"
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
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" required name="keterangan" class="form-control"
                                    id="exampleInputUsername2">
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
    {{-- End Modal Tambah pasien --}}

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
                                    Nomor Pasien
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Agama
                                </th>
                                <th>
                                    Telp
                                </th>
                                <th>
                                    Usia
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Keterangan
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
                            @foreach ($pasien as $v)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $v['nomor'] }}</td>
                                    <td>{{ $v['nama'] }}</td>
                                    <td>{{ $v['agama'] }}</td>
                                    <td>{{ $v['telp'] }}</td>
                                    <td>{{ $v['usia'] }}</td>
                                    <td>{{ $v['alamat'] }}</td>
                                    <td>{{ $v['keterangan'] }}</td>
                                    <td>
                                        <a class="mdi mdi-lead-pencil mr-3 icon-md btn-warning"
                                            href="/pasien/{{ $v['id'] }}"></a>
                                        <a class="mdi mdi-delete icon-md btn-danger" title="Hapus pasien" role="button"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus pasien dengan nama {{ $v['nama'] }}?')"
                                            href="pasien/hapus/{{ $v['id'] }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $pasien->links() !!} --}}
                </div>

            </div>
        </div>
    </div>

@endsection
