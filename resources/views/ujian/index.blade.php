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
                    <form action="{{ route('ujian.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_ujian">Nama Ujian</label>
                            <input type="text" class="form-control" id="nama_ujian" name="nama_ujian"
                                placeholder="Input Nama Ujian">
                        </div>

                        <div class="form-group">
                            <label for="id_matpel">Mata pelajaran</label>
                            <select name="id_matpel" class="form-control" id="id_matpel">
                                <option selected>--pilih mapel--</option>
                                @foreach ($mapels as $item)
                                    <option value="{{ $item->id_matpel }}">{{ $item->nama_matpel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="datetime-local" class="form-control" name="tanggal" placeholder="Input tanggal">
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
            <th>Nama Ujian</th>
            <th>Mata Pelajaran</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach ($ujians as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_ujian }}</td>
                    <td>{{ $item->mapels->nama_matpel }}</td>
                    <td>
                        <form action="{{ route('ujian.delete', ['ujian' => $item->id_ujian]) }}" method="post"
                            class="d-flex">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
