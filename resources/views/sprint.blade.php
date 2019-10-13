@extends('layouts.app')

@section('content')

<div class="container">

	<a href="/sprint/tambah">
		<button type="button" class="btn btn-primary">Buat Sprint Baru</button>
	</a>

	<table class="table table-dark">
		<thead class="thead-light">
			<tr>
				<th scope="col">Judul Srpint</th>
				<th scope="col">Deskripsi</th>
				<th scope="col">Tanggal Mulai</th>
				<th scope="col">Tanggal Selesai</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		@foreach($sprint as $p)
		<tr>
			<td>{{ $p->nama_sprint }}</td>
			<td>{{ $p->desc_sprint }}</td>
			<td>{{ $p->tgl_mulai }}</td>
			<td>{{ $p->tgl_selesai }}</td>
			<td>
				<a href="/sprint/edit/{{ $p->id }}">Edit</a>
				|
				<a href="/sprint/hapus/{{ $p->id }}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>
</div>

@endsection