@extends('layouts.app', ['title' => __('Task')])

@section('content')
@include('users.partials.header', ['title' => __('Tasks')])

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if ($message = Session::get('message'))
            <div class="alert alert-success martop-sm">
                <p>{{ $message }}</p>
</div>
@endif

<div class="card">
    <div class="card-header">Tasks</div>

    <div class="card-body">
        <table class="table table-striped">
            @foreach ($tasks as $task)
            <tr>
                <td>
                    @if ($task->status)
                    <s>{{ $task->nama_task }}</s>
                    @else
                    {{ $task->nama_task }}
                    @endif
                </td>
                <td class="text-right">
                    @if (! $task->status)
                    <form method="post" action="{{ route('task.update', $task->id) }}">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <button type="submit" class="btn btn-primary">Complete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        {{ $tasks->links() }}
    </div>
</div>
</div>
</div>
</div> --}}

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
                                <td>{{ $task -> status }}</td>
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

{{-- <div class="container">
    <h4>Daftar Task</h4>

    @if ($message = Session::get('message'))
    <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
</div>
@endif

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th scope="col">Sprint</th>
            <th scope="col">Nama Task</th>
            <th scope="col">Kesulitan</th>
            <th scope="col">Status</th>
            <th scope="col">CRUD</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task -> sprint -> nama_sprint }}</td>
            <td>{{ $task -> nama_task }}</td>
            <td>{{ $task -> kesulitan -> nama_tingkat }}</td>
            <td>{{ $task -> status }}</td>
            <td>
                <form action="{{ route('task.destroy', $task->id) }}" method="post">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return myFunction();">Hapus</button>
                    <i class='fas fa-edit'></i>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div> --}}

@endsection