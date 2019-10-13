@extends('layouts.app')

@section('content')

<div class="container">

    <h4>Halo Guys!</h4>
    <a href="{{ route('sprint.create') }}">
        <button type="button" class="btn btn-primary">Buat Sprint Baru</button>
    </a>

    @if ($message = Session::get('message'))
    <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th scope="col">Judul Sprint</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sprints as $sprint)
            <tr>
                <td>{{ $sprint->nama_sprint }}</td>
                <td>{{ $sprint->desc_sprint }}</td>
                <td>{{ $sprint->tgl_mulai }}</td>
                <td>{{ $sprint->tgl_selesai }}</td>
                {{-- crud --}}
                <td>
                    <form action="{{ route('sprint.destroy', $sprint->id) }}" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('sprint.edit', $sprint->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection