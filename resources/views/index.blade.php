@extends('main')

@section('content')
    <form action="{{ route('home.index') }}" method="get">
        <div class="form-group">
            <input type="datetime-local" class="form-control" name="tanggal" placeholder="input tanggal">
        </div>
        <div class="form-group my-4">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <th>No</th>
            <th>Nama Ujian</th>
            <th>Nama Mata pelajaran</th>
            <th>Tanggal</th>
            <th>Jumlah peserta</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach ($ujians as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_ujian }}</td>
                    <td>{{ $item->mapels->nama_matpel }}</td>
                    <td>{{ date('d-m-Y h:i', strtotime($item->tanggal)) }}</td>
                    <td>{{ $item->pesertas_count }}</td>
                    <td><a href="{{ route('ujian.detail', ['id' => $item->id_ujian]) }}" class="btn btn-primary">Detail</a>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
