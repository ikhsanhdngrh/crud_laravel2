@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Data Mahasiswa') }}
                    </div>
                    <div class="float-end">
                        <form action="{{ route('mahasiswa.view-pdf') }}" method="post" >
                            @csrf
                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-sm btn-primary">Tambah
                                Data</a>
                            <button type="submit" class="btn btn-sm btn-success">Export PDF</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr class="table-dark">
                                    <th>No</th>
                                    <th>NPM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($mahasiswa as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->npm }}</td>
                                    <td>{!! $data->nama !!}</td>
                                    <td>{{ $data->telepon}}</td>
                                    <td>{{ $data->alamat}}</td>
                                    <td>
                                        <form action="{{ route('mahasiswa.destroy', $data->npm) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('mahasiswa.show', $data->npm) }}"
                                                class="btn btn-sm btn-primary">Lihat</a> |
                                            <a href="{{ route('mahasiswa.edit', $data->npm) }}"
                                                class="btn btn-sm btn-success">Ubah</a> |
                                            <button type="submit" onsubmit="return confirm('Are You Sure ?');"
                                                class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $mahasiswa->withQueryString()->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection