@extends('layouts.app')

@section('content')
<h4>{{ $sprint->nama_sprint }}</h4>
<p>{{ $sprint->desc_sprint }}</p>
<p>{{ $sprint->tgl_mulai }}</p>
<p>{{ $sprint->tgl_selesai }}</p>
<a href="{{ route('sprint.index') }}" class="btn btn-default">Kembali</a>
@endsection