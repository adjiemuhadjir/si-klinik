@extends('layouts.back')

@section('container')

    {{-- {{ dd($pegawai) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Edit Pegawai</h2>
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
                <!-- Modal Edit Pegawai-->
                <form class="forms-sample" method="POST" id="edit_pegawai"
                    action="{{ route('pegawai.update', $pegawai['id']) }}" enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" required name="nama" class="form-control" id="exampleInputUsername2"
                                value="{{ $pegawai['nama'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" required name="email" class="form-control" id="exampleInputUsername2"
                                value="{{ $pegawai['email'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="exampleInputUsername2"
                                placeholder="Tidak perlu diisi jika tidak ada perubahan pada password anda...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Telp.</label>
                        <div class="col-sm-9">
                            <input type="text" required name="telp" class="form-control" id="exampleInputUsername2"
                                value="{{ $pegawai['telp'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat" class="form-control" required id="" cols="30" rows="10">{{ $pegawai['alamat'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" required name="tanggal_lahir" class="form-control"
                                id="exampleInputUsername2" value="{{ $pegawai['tanggal_lahir'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <select name="agama" required class="form-control" id="">

                                <option value="Islam" <?= $pegawai['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                <option value="Kahtolik" <?= $pegawai['agama'] == 'Kahtolik' ? 'selected' : '' ?>>Kahtolik
                                </option>
                                <option value="Protestan" <?= $pegawai['agama'] == 'Protestan' ? 'selected' : '' ?>>
                                    Protestan</option>
                                <option value="Hindu" <?= $pegawai['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha" <?= $pegawai['agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha
                                </option>
                                <option value="Khonghucu" <?= $pegawai['agama'] == 'Khonghucu' ? 'selected' : '' ?>>
                                    Khonghucu</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Poli</label>
                        <div class="col-sm-9">
                            <select name="poli" required class="form-control" id="">
                                @foreach ($poli as $p)
                                    <option value="{{ $p['id'] }}"
                                        <?= $pegawai['poli'] == $p['id'] ? 'selected' : '' ?>>{{ $p['poli'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary" role="button">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            {{-- End Modal Edit Pegawai --}}

        </div>
    </div>

@endsection
