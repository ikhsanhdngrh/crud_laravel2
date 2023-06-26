<!DOCTYPE html>
<html>

<head>
    <title>Export Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>{{ $title }}</h1>
    </center>
    <p>Tanggal: {{ $date }}</p>
    <table id="dataTable" class="table table-bordered" >
        <thead>
            <tr class="table table-dark">
                <th>No</th>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Telepon</th>
                <th>Alamat</th>

            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ($mahasiswa as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->npm }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->telepon }}</td>
                <td>{{ $data->alamat}}</td>

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

</body>

</html>