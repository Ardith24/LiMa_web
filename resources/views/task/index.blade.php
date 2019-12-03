@extends('layouts.app', ['title' => __('Task')])

@section('content')
@include('users.partials.header', ['title' => __('Tasks')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Daftar Task') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('task.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Task') }}</a>
                        </div>
                    </div>
                    <div class="container">
                        progress:
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}"
                                aria-valuemin="0" aria-valuemax="100">{{ $percent }}%</div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-12">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Sprint') }}</th>
                                <th scope="col">{{ __('Nama Task') }}</th>
                                <th scope="col">{{ __('Level') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task -> sprint -> nama_sprint }}</td>
                                <td>{{ $task -> nama_task }}</td>
                                <td>{{ $task -> kesulitan -> nama_tingkat }}</td>
                                {{-- <td>{{ $task -> status }}</td> --}}
                                <td>
                                    @if ($task -> status == 0)
                                        <a href="#" class="badge badge-warning">Belum Selesai</a>
                                    @elseif ($task -> status == 1)
                                        <span class="badge badge-pill badge-success">Selesai</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}

                                                <a class="dropdown-item"
                                                    href="{{ route('task.edit', $task->id) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item"
                                                    onclick="confirm('{{ __("Yakin mau hapus task ini?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $tasks->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>

@endsection