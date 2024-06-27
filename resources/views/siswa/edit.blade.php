@extends('main')

@section('content')
    <h1>{{ $title }}</h1>
    <form action="{{ route('siswa.update', ['siswa' => $siswa->id]) }}" method="post">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="nis">Nis</label>
            <input type="text" class="form-control" id="nis" name="nis" placeholder="Input NIS"
                value="{{ $siswa->nis }}">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama"
                value="{{ $siswa->nama }}">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="10" rows="10" class="form-control">{{ $siswa->alamat }}</textarea>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('siswa.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
