@extends('layouts.app')

@section('content')

<div class="container">
    {{-- <a href="{{ route('task.create') }}">
    <button type="button" class="btn btn-primary">Buat Task Baru</button>
    </a> --}}
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
                <td>{{ $task -> kesulitan_id }}</td>
                <td>{{ $task -> status }}</td>
                {{-- crud --}}
                <td>
                    <form action="{{ route('task.destroy', $task->id) }}" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        <i class='fas fa-edit'></i>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection