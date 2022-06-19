@extends('layouts.back')

@section('container')

    {{-- {{ dd($pasien) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Edit Pasien</h2>
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
                <!-- Modal Edit pasien-->
                <form class="forms-sample" method="POST" id="edit_pasien"
                    action="{{ route('pasien.update', $pasien['id']) }}" enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nomor</label>
                        <div class="col-sm-9">
                            <input type="text" required name="nomor" class="form-control" id="exampleInputUsername2"
                                value="{{ $pasien['nomor'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="nama" required name="nama" class="form-control" id="exampleInputUsername2"
                                value="{{ $pasien['nama'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <select name="agama" required class="form-control" id="">
                                <option value="Islam" <?= $pasien['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                <option value="Kahtolik" <?= $pasien['agama'] == 'Kahtolik' ? 'selected' : '' ?>>Kahtolik
                                </option>
                                <option value="Protestan" <?= $pasien['agama'] == 'Protestan' ? 'selected' : '' ?>>
                                    Protestan</option>
                                <option value="Hindu" <?= $pasien['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= $pasien['agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha
                                </option>
                                <option value="Khonghucu" <?= $pasien['agama'] == 'Khonghucu' ? 'selected' : '' ?>>
                                    Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Telp.</label>
                        <div class="col-sm-9">
                            <input type="text" required name="telp" class="form-control" id="exampleInputUsername2"
                                value="{{ $pasien['telp'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Usia</label>
                        <div class="col-sm-9">
                            <input type="text" required name="usia" class="form-control" id="exampleInputUsername2"
                                value="{{ $pasien['usia'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat" class="form-control" required id="" cols="30" rows="10">{{ $pasien['alamat'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" required name="keterangan" class="form-control" id="exampleInputUsername2"
                                value="{{ $pasien['keterangan'] }}">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('pasien.index') }}" class="btn btn-secondary" role="button">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            {{-- End Modal Edit pasien --}}

        </div>
    </div>

@endsection
