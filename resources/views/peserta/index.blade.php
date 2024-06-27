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
                    <form action="{{ route('peserta.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_ujian">Nama Ujian</label>
                            <select name="id_ujian" class="form-control" id="id_ujian">
                                <option selected>--pilih Ujian--</option>
                                @foreach ($ujians as $item)
                                    <option value="{{ $item->id_ujian }}">{{ $item->nama_ujian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nis">Nama Siswa</label>
                            <select name="nis" class="form-control" id="nis">
                                <option selected>--pilih siswa--</option>
                                @foreach ($siswas as $item)
                                    <option value="{{ $item->nis }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="text" name="nilai" class="form-control" placeholder="Input Nilai">
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
            <th>Peserta</th>
            <th>Nama Ujian</th>
            <th>Nilai</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach ($pesertas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->nama ?? 'kosong' }}</td>
                    <td>{{ $item->ujian->nama_ujian ?? 'kosong' }}</td>
                    <td>{{ $item->nilai }}</td>
                    <td>
                        <form action="{{ route('peserta.delete', ['peserta' => $item->id]) }}" method="post"
                            class="d-flex">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        | <a href="{{ route('peserta.edit', ['peserta' => $item->id]) }}" class="btn btn-warning">Edit</a>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
