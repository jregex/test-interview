@extends('main')

@section('content')
    <form action="{{ route('tgllahir') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tgl">Tanggal lahir</label>
            <input type="date" class="form-control" name="tgl">
        </div>
        <button type="submit" class="btn btn-primary my-2">Process</button>
    </form>
@endsection
