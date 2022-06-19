@extends('layouts.back')

@section('container')

    {{-- {{ dd($pembayaran) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Daftar pembayaran</h2>
                    </div>
                </div>
                {{-- <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button data-toggle="modal" data-target="#tambah_pembayaran"
                        class="mdi mdi-account-multiple-plus btn btn-success mt-2 mt-xl-0"> Tambah pembayaran</button>
                </div> --}}
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
                                    Usia
                                </th>
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Tindakan
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
                            @foreach ($pembayaran as $v)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $v['nama_pasien'] }}</td>
                                    <td>{{ $v['keluhan'] }}</td>
                                    <td>{{ $v['usia'] }}</td>
                                    <td>{{ $v['tanggal'] }}</td>
                                    <td>{{ $v['tindakan'] }}</td>
                                    <td>
                                        <a class="mdi mdi-lead-pencil mr-3 icon-md btn-warning"
                                            href="/pembayaran/{{ $v['id'] }}"></a>
                                        {{-- <a class="mdi mdi-delete icon-md btn-danger" title="Hapus pembayaran"
                                            role="button"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus pembayaran dengan nama {{ $v['nama_pasien'] }}?')"
                                            href="pembayaran/hapus/{{ $v['id'] }}"></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $pembayaran->links() !!} --}}
                </div>

            </div>
        </div>
    </div>

@endsection
