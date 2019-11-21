@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Ubah Task</h4>
    <form action="{{ route('task.update', $task->id) }}" method="post">
        {{csrf_field()}}

        {{ method_field('PUT') }}
        
        <div class="form-group {{ $errors->has('sprint_id') ? 'has-error' : '' }}">
            <label for="sprint_id" class="control-label">Judul Sprint</label>
            <select name="sprint_id" id="task" class="form-control">
                @foreach($tasks as $key => $lastName)
                <option value="{{ $key }}">{{ $lastName }}</option>
                @endforeach
            </select>
            @if ($errors->has('sprint_id'))
            <span class="help-block">{{ $errors->first('sprint_id') }}</span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('nama_task') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="nama_task">{{ __('Nama Task') }}</label>
                <input type="text" class="form-control" name="nama_task"
                    class="form-control form-control-alternative{{ $errors->has('nama_task') ? ' is-invalid' : '' }}"
                    placeholder="{{ __('Nama Task') }}" value="{{ old('nama_task') }}" required autofocus>
                @if ($errors->has('nama_task'))
                
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama_task') }}</strong>
                </span>
                @endif
            </div>

        <div class="form-group {{ $errors->has('kesulitan_id') ? 'has-error' : '' }}">
            <label for="kesulitan_id" class="control-label">Tingkat Kesulitan</label>
            <select name="kesulitan_id" id="kesulitan" class="form-control">
                @foreach($kesulitans as $key => $lastName)
                <option value="{{ $key }}">{{ $lastName }}</option>
                @endforeach
            </select>
            @if ($errors->has('kesulitan_id'))
            <span class="help-block">{{ $errors->first('kesulitan_id') }}</span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            <label for="status" class="control-label">Status</label>
            <input type="text" class="form-control" name="status" placeholder="Status">
            @if ($errors->has('status'))
            <span class="help-block">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('task.index') }}" class="btn btn-default">Kembali</a>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#task', '#kesulitan').select2();
        });
    </script>

    @endsection
</div>