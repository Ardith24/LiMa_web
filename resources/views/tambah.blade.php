@extends('layouts.app')

@section('content')

<body>
    <div class="container">
        <form action="/sprint/tambah" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="judul" class="col-4 col-form-label">Judul Sprint</label>
                <div class="col-8">
                    <input name="judul" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                <div class="col-8">
                    <textarea name="deskripsi" cols="40" rows="3" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl_mulai" class="col-4 col-form-label">Tanggal Mulai</label>
                <div class='input-group date'>
                    <input type='date' class="form-control" name="tgl_mulai"/>
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>  
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_selesai" class="col-4 col-form-label">Tanggal Selesai</label>
                <div class='input-group date'>
                    <input type='date' class="form-control" name="tgl_selesai"/>
                    <span class="input-group-addon">
                        <i class="fa fa-calendar-check-o"></i>  
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Style --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('theme/assets/vendor/font-awesome/css/font-awesome.min.css') }}">

</body>
@endsection