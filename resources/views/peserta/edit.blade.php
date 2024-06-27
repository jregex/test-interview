@extends('main')

@section('content')
    <h1>{{ $title }}</h1>
    <form action="{{ route('peserta.update', ['peserta' => $peserta->id]) }}" method="post">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="id_ujian">Nama Ujian</label>
            <select name="id_ujian" class="form-control" id="id_ujian">
                @foreach ($ujians as $item)
                    <option value="{{ $item->id_ujian }}" {{ $item->id_ujian == $peserta->id_ujian ? 'selected' : '' }}>
                        {{ $item->nama_ujian }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nis">Nama Siswa</label>
            <select name="nis" class="form-control" id="nis">
                @foreach ($siswas as $item)
                    <option value="{{ $item->nis }}" {{ $item->nis == $peserta->nis ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="text" name="nilai" class="form-control" placeholder="Input Nilai"
                value="{{ $peserta->nilai }}">
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('peserta.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
