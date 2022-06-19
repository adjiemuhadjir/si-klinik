@extends('layouts.back')

@section('container')

    {{-- {{ dd($user) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Edit User</h2>
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
                <!-- Modal Edit User-->
                <form class="forms-sample" method="POST" id="edit_user" action="{{ route('user.update', $user['id']) }}"
                    enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama User</label>
                        <div class="col-sm-9">
                            <select name="id_pegawai" required class="form-control" id="">
                                @foreach ($pegawai as $p)
                                    <option value="{{ $p['id'] }}"
                                        <?= $user['id_pegawai'] == $p['id'] ? 'selected' : '' ?>>{{ $p['nama'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select name="role" required class="form-control" id="">
                                <option value="Petugas" <?= $user['role'] == 'Petugas' ? 'selected' : '' ?>>Petugas</option>
                                <option value="Dokter" <?= $user['role'] == 'Dokter' ? 'selected' : '' ?>>Dokter
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Wilayah</label>
                        <div class="col-sm-9">
                            <select name="id_wilayah" required class="form-control" id="">
                                @foreach ($wilayah as $w)
                                    <option value="{{ $w['id'] }}"
                                        <?= $user['id_wilayah'] == $w['id'] ? 'selected' : '' ?>>{{ $w['nama_wilayah'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('user.index') }}" class="btn btn-secondary" role="button">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            {{-- End Modal Edit user --}}

        </div>
    </div>

@endsection
