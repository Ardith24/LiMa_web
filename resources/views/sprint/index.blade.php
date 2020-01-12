@extends('layouts.app', ['title' => __('Sprint')])

@section('content')
@include('users.partials.header', ['title' => __('Sprints')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Daftar Sprint') }} - {{ __('3/4') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('sprint.create') }}"
                                class="btn btn-sm btn-primary">{{ __('Tambah Sprint') }}</a>
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
                                <th scope="col">{{ __('Judul') }}</th>
                                <th scope="col">{{ __('Deskripsi') }}</th>
                                <th scope="col">{{ __('Tanggal Mulai') }}</th>
                                <th scope="col">{{ __('Tanggal Selesai') }}</th>
                                <th scope="col">{{ __('Task') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sprints as $sprint)
                            <tr>
                                <td>{{ $sprint -> nama_sprint }}</td>
                                <td>{{ $sprint -> desc_sprint }}</td>
                                <td>{{ $sprint -> tgl_mulai }}</td>
                                <td>{{ $sprint -> tgl_selesai }}</td>
                                <td>
                                    <form action="{{ route('sprint.show', $sprint->id) }}" method="GET">
                                        {{csrf_field()}}
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-tasks"></i>
                                            <span class="badge">
                                                {{ $sprint-> task -> count() }}
                                            </span>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{ route('sprint.destroy', $sprint->id) }}" method="post">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}

                                                <a class="dropdown-item"
                                                    href="{{ route('sprint.edit', $sprint->id) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item"
                                                    onclick="confirm('{{ __("Yakin mau hapus sprint ini?") }}') ? this.parentElement.submit() : ''">
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
                        {{ $sprints->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>

@endsection