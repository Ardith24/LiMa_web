@extends('layouts.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-xs-6">
            <a href="{{ route('task.index') }}" class="btn btn-default">Kembali</a>
            <h3 class="text-center">Task</h3>
            <div class="well" style="max-height: 500px; overflow: auto;">
                <ul id="check-list-box" class="list-group">
                    <li class="list-group-item" data-color="success">
                        <h4>Sprint:</h4>
                        <p>{{ $task-> sprint -> nama_sprint }}</p>
                    </li>
                    <li class="list-group-item" data-color="success">
                        <h4>Nama Task:</h4>
                        <p>{{ $task-> nama_task }}</p>
                    </li>
                    <li class="list-group-item" data-color="success">
                        <h4>Tingkat Kesulitan:</h4>
                        <p>{{ $task-> kesulitan -> nama_tingkat }}</p>
                    </li>
                    <li class="list-group-item" data-color="success">
                        <h4>Status:</h4>
                        <p>{{ $task-> status }}</p>
                    </li>
                </ul>
                <br />
            </div>
        </div>
    </div>
</div>
@endsection