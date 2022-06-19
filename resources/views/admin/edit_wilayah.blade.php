@extends('layouts.back')

@section('container')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Edit Wilayah</h2>
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
                <!-- Modal Edit wilayah-->
                <form class="forms-sample" method="POST" id="edit_wilayah"
                    action="{{ route('wilayah.update', $wilayah['id']) }}" enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Wilayah</label>
                        <div class="col-sm-9">
                            <input type="text" required name="nama_wilayah" class="form-control"
                                value="{{ $wilayah['nama_wilayah'] }}">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('wilayah.index') }}" class="btn btn-secondary" role="button">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            {{-- End Modal Edit Wilayah --}}

        </div>
    </div>

@endsection
