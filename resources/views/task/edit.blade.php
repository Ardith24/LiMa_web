@extends('layouts.app', ['title' => __('Task')])

@section('content')
@include('users.partials.header', ['title' => __('Edit Task')])

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
                            <form action="{{ route('task.update', $task->id) }}" method="post">
                                    {{csrf_field()}}
                            
                                    {{ method_field('PUT') }}
    
                            <h6 class="heading-small text-muted mb-4">{{ __('Detail Task') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group {{ $errors->has('sprint_id') ? 'has-error' : '' }}">
                                    <label for="sprint_id" class="control-label">Judul Sprint</label>
                                    <select name="sprint_id" id="task" class="form-control" required="required">
                                        @foreach($tasks as $key => $lastName)
                                        @if($task->sprint->nama_sprint == $lastName)
                                            <option selected value="{{ $task->sprint->nama_sprint }}">{{ $task->sprint->nama_sprint }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $lastName }}</option>
                                        @endif
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
                                        placeholder="{{ __('Nama Task') }}" value="{{ $task->nama_task }}" required
                                        autofocus>
                                    @if ($errors->has('nama_task'))
    
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_task') }}</strong>
                                    </span>
                                    @endif
                                </div>
    
                                <div class="form-group {{ $errors->has('kesulitan_id') ? 'has-error' : '' }}">
                                    <label for="kesulitan_id" class="form-control-label">{{ __('Level') }}</label>
                                    <select name="kesulitan_id" id="kesulitan" class="form-control">
                                            @foreach($kesulitans as $key => $lastName)
                                            @if($task->kesulitan->nama_tingkat == $lastName)
                                                <option selected value="{{ $task->kesulitan->nama_tingkat }}">{{ $task->kesulitan->nama_tingkat }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $lastName }}</option>
                                            @endif
                                            @endforeach
                                    </select>
                                    @if ($errors->has('kesulitan_id'))
                                    <span class="help-block">{{ $errors->first('kesulitan_id') }}</span>
                                    @endif
                                </div>
    
                                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                    <label for="status" class="control-label">Status</label>
                                    <select name="status" id="status" class="form-control" required="required">
                                        <tr>
                                            <option value="1">Selesai</option>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#task', '#kesulitan').select2();
        });
    </script>

    @endsection
</div>