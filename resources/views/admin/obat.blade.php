@extends('layouts.back')

@section('container')

    {{-- {{ dd($pegawai) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Daftar Obat</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button data-toggle="modal" data-target="#tambah_obat"
                        class="mdi mdi-account-multiple-plus btn btn-success mt-2 mt-xl-0"> Tambah Obat</button>
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

    <!-- Modal Tambah obat-->
    <div class="modal fade" id="tambah_obat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" id="form_obat" action="/obat" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputobatname2" class="col-sm-3 col-form-label">Nama Obat</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_obat" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputobatname2" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select name="kategori" class="form-control" id="">
                                    <option value="Generik">Generik</option>
                                    <option value="Antibiotik">Antibiotik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputobatname2" class="col-sm-3 col-form-label">Jenis Obat</label>
                            <div class="col-sm-9">
                                <select name="jenis_obat" class="form-control" id="">
                                    <option value="Tablet">Tablet</option>
                                    <option value="Kapsul">Kapsul</option>
                                    <option value="Sirup">Sirup</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputobatname2" class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="number" name="harga" required class="form-control">
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
    {{-- End Modal Tambah obat --}}

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
                                    Nama Obat
                                </th>
                                <th>
                                    Kategori
                                </th>
                                <th>
                                    Jenis Obat
                                </th>
                                <th>
                                    Harga
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
                            @foreach ($obat as $v)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $v['nama_obat'] }}</td>
                                    <td>{{ $v['kategori'] }}</td>
                                    <td>{{ $v['jenis_obat'] }}</td>
                                    <td>{{ $v['harga'] }}</td>
                                    <td>
                                        <a class="mdi mdi-lead-pencil mr-3 icon-md btn-warning"
                                            href="/obat/{{ $v['id'] }}"></a>
                                        <a class="mdi mdi-delete icon-md btn-danger" title="Hapus obat" role="button"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus obat dengan nama {{ $v['nama_obat'] }}?')"
                                            href="obat/hapus/{{ $v['id'] }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $obat->links() !!} --}}
                </div>

            </div>
        </div>
    </div>

@endsection
