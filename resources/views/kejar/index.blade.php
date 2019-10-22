@extends('layouts.app')

@section('content')

<div class="container">

    <h4>Halo Guys!</h4>

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
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kejars as $kejar)
            <tr>
                <td>{{ $kejar-> judul }}</td>
                <td>{{ $kejar-> desc }}</td>
                <td>{{ $kejar-> tgl_mulai }}</td>
                <td>{{ $kejar-> tgl_selesai }}</td>
                {{-- crud --}}
                <td>
                    <form action="">
                        <button class="btn btn-primary" type="button">
                            Task <span class="badge">4</span>
                        </button>
                    </form>
                </td>
                <td>
                        <form action="">
                                <button class="btn btn-primary" type="button">
                                    Task <span class="badge">4</span>
                                </button>
                            </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection