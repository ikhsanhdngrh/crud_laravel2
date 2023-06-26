@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Tambah Data') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data"> @csrf 
                        <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="text" class="form-control @error('npm') is-invalid @enderror" name="npm" value="{{ old('npm') }}" placeholder="Masukan NPM" required> @error('npm') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukan Nama" required> @error('nama') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                        </div>
                        
                        <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" placeholder="Masukan No. Telepon" required> @error('telepon') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" rows="3" placeholder="Masukan Alamat" required></textarea> @error('alamat') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-info">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection