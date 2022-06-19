@extends('layouts.back')

@section('container')

    {{-- {{ dd($obat) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Edit Obat</h2>
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
                <!-- Modal Edit Obat-->
                <form class="forms-sample" method="POST" id="edit_obat" action="{{ route('obat.update', $obat['id']) }}"
                    enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputobatname2" class="col-sm-3 col-form-label">Nama Obat</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_obat" class="form-control" value="{{ $obat['nama_obat'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputobatname2" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select name="kategori" required class="form-control" id="">
                                <option value="Generik" <?= $obat['kategori'] == 'Generik' ? 'selected' : '' ?>>Generik
                                </option>
                                <option value="Antibiotik" <?= $obat['kategori'] == 'Antibiotik' ? 'selected' : '' ?>>
                                    Antibiotik
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputobatname2" class="col-sm-3 col-form-label">Jenis Obat</label>
                        <div class="col-sm-9">
                            <select name="jenis_obat" required class="form-control" id="">
                                <option value="Tablet" <?= $obat['jenis_obat'] == 'Tablet' ? 'selected' : '' ?>>Tablet
                                </option>
                                <option value="Kapsul" <?= $obat['jenis_obat'] == 'Kapsul' ? 'selected' : '' ?>>
                                    Kapsul
                                </option>
                                <option value="Sirup" <?= $obat['jenis_obat'] == 'Sirup' ? 'selected' : '' ?>>
                                    Sirup
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputobatname2" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" name="harga" class="form-control" value="{{ $obat['harga'] }}">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('obat.index') }}" class="btn btn-secondary" role="button">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            {{-- End Modal Edit obat --}}

        </div>
    </div>

@endsection
