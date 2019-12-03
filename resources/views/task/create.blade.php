@extends('layouts.app', ['title' => __('Task')])

@section('content')
@include('users.partials.header', ['title' => __('Tambah Task Baru')])


<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Task') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('task.index') }}"
                                class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('task.store') }}">
                        {{csrf_field()}}

                        <h6 class="heading-small text-muted mb-4">{{ __('Detail Task') }}</h6>
                        <div class="pl-lg-4">
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
                                    placeholder="{{ __('Nama Task') }}" value="{{ old('nama_task') }}" required
                                    autofocus>
                                @if ($errors->has('nama_task'))

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_task') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('kesulitan_id') ? 'has-error' : '' }}">
                                <label for="kesulitan_id" class="form-control-label">{{ __('Level') }}</label>
                                <select name="kesulitan_id" id="kesulitan" class="form-control"
                                    value="{{ old('kesulitan_id') }}">
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
                                {{-- <input type="text" class="form-control" name="status" placeholder="Status"> --}}
                                <select name="status" id="status" class="form-control" value="{{ old('status') }}"
                                    required="required">
                                    <tr>
                                        <option value="0">Belum Selesai</option>
                                    </tr>
                                </select>
                                @if ($errors->has('status'))
                                <span class="help-block">{{ $errors->first('status') }}</span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>


{{-- <div class="container">
    <h4>Task Baru</h4>
    <form action="{{ route('task.store') }}" method="post">

{{csrf_field()}}

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

<div class="form-group {{ $errors->has('nama_task') ? 'has-error' : '' }}">
    <label for="nama_task" class="control-label">Nama Task</label>
    <input type="text" class="form-control" name="nama_task" placeholder="Nama Task">
    @if ($errors->has('nama_task'))
    <span class="help-block">{{ $errors->first('nama_task') }}</span>
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
</form> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#task', '#kesulitan', '#status').select2();
    });
</script>
@endsection
</div>