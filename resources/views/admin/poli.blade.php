@extends('layouts.back')

@section('container')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Daftar Poli</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button data-toggle="modal" data-target="#tambah_poli" class="btn btn-success mt-2 mt-xl-0">Tambah
                        Poli</button>
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

    <!-- Modal Tambah poli-->
    <div class="modal fade" id="tambah_poli" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Poli</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" id="form_poli" action="/poli" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Poli</label>
                            <div class="col-sm-9">
                                <input type="text" required name="poli" class="form-control"
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
    {{-- End Modal Tambah poli --}}

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="anggota-partai">
                        <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Nama Poli
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
                            @foreach ($poli as $v)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $v['poli'] }}</td>
                                    <td>
                                        <a class="mdi mdi-lead-pencil mr-3 icon-md btn-warning"
                                            href="/poli/{{ $v['id'] }}"></a>
                                        <a class="mdi mdi-delete icon-md btn-danger" title="Hapus poli" role="button"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus poli dengan nama {{ $v['poli'] }}?')"
                                            href="poli/hapus/{{ $v['id'] }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {!! $poli->links() !!} --}}
                </div>

            </div>
        </div>
    </div>

@endsection
