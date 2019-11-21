@extends('layouts.app')

@section('content')

<div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Tambah Sprint</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Sprint Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sprint.store') }}" method="post">
                        {{csrf_field()}}
                        <div class="form-group {{ $errors->has('nama_sprint') ? 'has-error' : '' }}">
                                <label for="nama_sprint" class="control-label">Judul</label>
                                <input type="text" class="form-control" name="nama_sprint" placeholder="Judul">
                                @if ($errors->has('nama_sprint'))
                                <span class="help-block">{{ $errors->first('nama_sprint') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('desc_sprint') ? 'has-error' : '' }}">
                                    <label for="desc_sprint" class="control-label">Deskripsi</label>
                                    <textarea name="desc_sprint" cols="30" rows="5" class="form-control"></textarea>
                                    @if ($errors->has('desc_sprint'))
                                    <span class="help-block">{{ $errors->first('desc_sprint') }}</span>
                                    @endif
                                </div>
                        
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('tgl_mulai') ? 'has-error' : '' }}">
                                            <label for="tgl_mulai" class="control-label">Tanggal Mulai</label>
                                            <input type='date' class="form-control" name="tgl_mulai" />
                                            @if ($errors->has('tgl_mulai'))
                                            <span class="help-block">{{ $errors->first('tgl_mulai') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('tgl_selesai') ? 'has-error' : '' }}">
                                            <label for="tgl_selesai" class="control-label">Tanggal Selesai</label>
                                            <input type='date' class="form-control" name="tgl_selesai" placeholder="MM/DD/YYYY" />
                                            @if ($errors->has('tgl_selesai'))
                                            <span class="help-block">{{ $errors->first('tgl_selesai') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('sprint.index') }}" class="btn btn-default">Kembali</a>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h4>Daftar Sprint</h4>

    @if ($message = Session::get('message'))
    <div class="alert alert-success martop-sm">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th scope="col">Judul Sprint</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sprints as $sprint)
            <tr>
                <td>{{ $sprint-> nama_sprint }}</td>
                <td>{{ $sprint-> tgl_mulai }}</td>
                <td>{{ $sprint-> tgl_selesai }}</td>
                {{-- crud --}}
                <td>
                    <form action="{{ route('sprint.show', $sprint->id) }}" method="GET">
                        {{-- {{csrf_field()}} --}}
                        <button class="btn btn-primary" type="submit">

                            Task <span class="badge">
                                {{-- @foreach ( as $s) --}}
                                {{ $sprint-> tasks -> count() }}
                                {{-- @endforeach --}}
                            </span>
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('sprint.destroy', $sprint->id) }}" method="post">
                        {{-- {{csrf_field()}} --}}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('sprint.edit', $sprint->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return myFunction();">Hapus</button>
                        <i class='fas fa-edit'></i>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
    })

    function myFunction() {
        if (!confirm("Yakin mau hapus sprint ini?"))
            event.preventDefault();
    }
</script>

@endsection