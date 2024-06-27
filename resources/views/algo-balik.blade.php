@extends('main')

@section('content')
    <form action="{{ route('algo.balik') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="string">String</label>
            <input type="text" name="string" placeholder="Input String" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary my-2">Process</button>
    </form>
@endsection
