@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Lihat Data Mahasiswa') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <h4>{{ $mahasiswa->nama }}</h4>
                    <p class="tmt-3">
                        NPM : {{ $mahasiswa->npm }}<br>
                        Telepon: {!! $mahasiswa->telepon !!}<br>
                        Alamat: {!! $mahasiswa->alamat !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection