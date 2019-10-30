@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Ubah Sprint</h4>
    <form action="{{ route('sprint.update', $sprint->id) }}" method="post" >
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="form-group {{ $errors->has('nama_sprint') ? 'has-error' : '' }}">
            <label for="nama_sprint" class="control-label">Judul</label>
            <input type="text" class="form-control" name="nama_sprint" placeholder="Judul" value="{{$sprint->nama_sprint}}">
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
                    <input type='date' class="form-control" name="tgl_mulai" value="{{$sprint->tgl_mulai}}" />
                    @if ($errors->has('tgl_mulai'))
                    <span class="help-block">{{ $errors->first('tgl_mulai') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('tgl_selesai') ? 'has-error' : '' }}">
                    <label for="tgl_selesai" class="control-label">Tanggal Selesai</label>
                    <input type='date' class="form-control" name="tgl_selesai" placeholder="MM/DD/YYYY" value="{{$sprint->tgl_selesai}}"/>
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
    @endsection
</div>