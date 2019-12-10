@extends('layouts.app', ['title' => __('Sprint')])

@section('content')
@include('users.partials.header', ['title' => __('Tambah Sprint Baru')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Sprint') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('sprint.index') }}"
                                class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('sprint.store') }}" autocomplete="off">
                        {{csrf_field()}}

                        <h6 class="heading-small text-muted mb-4">{{ __('Detail Sprint') }}</h6>
                        <div class="pl-lg-4">

                            <div class="form-group{{ $errors->has('nama_sprint') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="nama_sprint">{{ __('Judul Sprint') }}</label>
                                <input type="text" class="form-control" name="nama_sprint"
                                    class="form-control form-control-alternative{{ $errors->has('nama_sprint') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Judul Sprint') }}" value="{{ old('nama_sprint') }}" required
                                    autofocus>
                                @if ($errors->has('nama_sprint'))

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_sprint') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('desc_sprint') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desc_sprint">{{ __('Deskripsi Sprint') }}</label>
                                <textarea type="text" name="desc_sprint"
                                    class="form-control form-control-alternative{{ $errors->has('desc_sprint') ? ' is-invalid' : '' }}"
                                    id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan deskripsi..."
                                    placeholder="{{ __('Deskripsi Sprint') }}" value="{{ old('desc_sprint') }}" required
                                    autofocus></textarea>
                                @if ($errors->has('desc_sprint'))

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('desc_sprint') }}</strong>
                                </span>
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
                                        <input type='date' class="form-control" name="tgl_selesai"
                                            placeholder="MM/DD/YYYY" />
                                        @if ($errors->has('tgl_selesai'))
                                        <span class="help-block">{{ $errors->first('tgl_selesai') }}</span>
                                        @endif
                                    </div>
                                </div>
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
@endsection