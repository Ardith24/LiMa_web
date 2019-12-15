@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

{{-- <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-xs-6">
            <a href="{{ route('sprint.index') }}" class="btn btn-default">Kembali</a>
<h3 class="text-center">Sprint</h3>
<div class="well" style="max-height: 500px; overflow: auto;">
    <ul id="check-list-box" class="list-group">
        <li class="list-group-item" data-color="success">
            <h4>Judul:</h4>
            <p>{{ $sprint -> nama_sprint }}</p>
        </li>
        <li class="list-group-item" data-color="success">
            <h4>Deskripsi:</h4>
            <p>{{ $sprint -> desc_sprint }}</p>
        </li>
        <li class="list-group-item" data-color="success">
            <h4>Tanggal Mulai:</h4>
            <p>{{ $sprint -> tgl_mulai }}</p>
        </li>
        <li class="list-group-item" data-color="success">
            <h4>Tanggal Selesai:</h4>
            <p>{{ $sprint -> tgl_selesai }}</p>
        </li>
    </ul>
    <br />
</div>
</div>
<div class="col-xs-6">
    <a href="{{ route('task.create') }}">
        <button type="button" class="btn btn-default">Tambah Task</button>
    </a>
    <h3 class="text-center">Task</h3>
    <div class="well" style="max-height: 500px; overflow: auto;">
        <ul id="check-list-box" class="list-group checked-list-box">
            @foreach ($task as $t)
            <li class="list-group-item">{{ $t -> nama_task }}</li>
            @endforeach
        </ul>
        <br />
        <button class="btn btn-primary col-xs-12" id="get-checked-data">Selesai</button>
    </div>
</div>
</div>
</div> --}}

<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{ $sprint->nama_sprint }} - Task</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('task.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nama Task</th>
                                <th scope="col">Level</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $t)
                            <tr>
                                <th scope="row">
                                    {{ $t -> nama_task }}
                                </th>
                                <td>
                                    {{ $t -> kesulitan -> nama_tingkat }}
                                </td>
                                <td>
                                    @if ($t -> status == 0)
                                    <a href="#" class="badge badge-warning">Belum Selesai</a>
                                    @elseif ($t -> status == 1)
                                    <span class="badge-sm badge-pill badge-success">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Detail Sprint</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('sprint.edit', $sprint->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Nama Sprint :
                                </th>
                                <td>
                                    {{ $sprint -> nama_sprint }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Deskripsi Sprint :
                                </th>
                                <td>
                                    {{ $sprint -> desc_sprint }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Tanggal Mulai :
                                </th>
                                <td>
                                    {{ $sprint -> tgl_mulai }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Tanggal Mulai :
                                </th>
                                <td>
                                    {{ $sprint -> tgl_selesai }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Jumlah Task :
                                </th>
                                <td>
                                    {{ $task -> count() }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection