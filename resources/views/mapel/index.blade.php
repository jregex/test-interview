@extends('main')

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Tambah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create {{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mapel.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_matpel">Mata Pelajaran</label>
                            <input type="text" class="form-control" id="nama_matpel" name="nama_matpel"
                                placeholder="Input Mata pelajaran">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach ($mapels as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_matpel }}</td>
                    <td>
                        <form action="{{ route('mapel.delete', ['mapel' => $item->id_matpel]) }}" method="post"
                            class="d-flex">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
