@extends('main')

@section('content')
    @foreach ($peserta as $item)
        <ul class="list-group mb-2">
            <li class="list-group-item">Nama : {{ $item->nama }}</li>
            <li class="list-group-item">Mata Pelajaran : {{ $item->nama_matpel }}</li>
            <li class="list-group-item">Status : <span
                    class="{{ $item->status == 'lulus' ? 'text-success' : 'text-danger' }}">{{ $item->status }}</span></li>
        </ul>
    @endforeach
    <a href="{{ route('home.index') }}" class="btn btn-primary">Back</a>
@endsection
