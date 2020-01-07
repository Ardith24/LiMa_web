@extends('layouts.app', ['title' => __('Sprints')])

@section('content')
@include('users.partials.header', ['title' => __('Sprints')])

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
                    <div class="progress-wrapper">
                        <div class="progress-info">
                            <div class="progress-label">
                                <span>Task Selesai</span>
                            </div>
                            <div class="progress-percentage">
                                <span>100%</span>
                            </div>
                        </div>
                        <div class="progress" style="height: 1rem">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $percent }}"
                                aria-valuemin="0" aria-valuemax="100" style="width: {{ $percent }}%">{{ $percent }}%
                            </div>
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
                                <th scope="col"></th>
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
                                    <a href="{{ url('task/status/'.$t->id) }}" class="badge badge-warning">Belum
                                        Selesai</a>
                                    @elseif ($t -> status == 1)
                                    <span class="badge-sm badge-pill badge-success">Selesai</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if ($t -> status == 0)
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{ route('task.destroy', $t->id) }}" method="post">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}

                                                <a class="dropdown-item"
                                                    href="{{ route('task.edit', $t->id) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item"
                                                    onclick="confirm('{{ __("Yakin mau hapus task ini?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Hapus') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @elseif ($t -> status == 1)
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{ route('task.destroy', $t->id) }}" method="post">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}

                                                <a class="dropdown-item"
                                                    href="{{ route('task.edit', $t->id) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item"
                                                    onclick="confirm('{{ __("Yakin mau hapus task ini?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Hapus') }}
                                                </button>
                                                <a class="dropdown-item"
                                                    href="{{ url('task/status/'.$t->id) }}">{{ __('Tandai belum selesai') }}</a>
                                            </form>
                                        </div>
                                    </div>
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