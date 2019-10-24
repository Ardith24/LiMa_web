@extends('layouts.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-xs-6">
            <a href="{{ route('sprint.index') }}" class="btn btn-default">Kembali</a>
            <h3 class="text-center">Sprint</h3>
            <div class="well" style="max-height: 500px; overflow: auto;">
                <ul id="check-list-box" class="list-group">
                    <li class="list-group-item" data-color="success">
                        <h4>Judul:</h4>
                        <p>{{ $sprint->nama_sprint }}</p>
                    </li>
                    <li class="list-group-item" data-color="success">
                        <h4>Deskripsi:</h4>
                        <p>{{ $sprint->desc_sprint }}</p>
                    </li>
                    <li class="list-group-item" data-color="success">
                        <h4>Tanggal Mulai:</h4>
                        <p>{{ $sprint->tgl_mulai }}</p>
                    </li>
                    <li class="list-group-item" data-color="success">
                        <h4>Tanggal Selesai:</h4>
                        <p>{{ $sprint->tgl_selesai }}</p>
                    </li>
                </ul>
                <br />
            </div>
        </div>
        <div class="col-xs-6">
            <a href="{{ route('task.create') }}">
                <button type="button" class="btn btn-default">Tambah Task</button>
            </a>
            <h3 class="text-center">Task</h3>
            <div class="well" style="max-height: 500px; overflow: auto;">
                <ul id="check-list-box" class="list-group checked-list-box">
                    {{-- <li class="list-group-item">{{ $task->nama_task}}</li> --}}
                    {{-- <li class="list-group-item">{{ $task->nama_task}}</li> --}}
                </ul>
                <br />
                <button class="btn btn-primary col-xs-12" id="get-checked-data">Selesai</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.list-group.checked-list-box .list-group-item').each(function () {

            // Settings
            var $widget = $(this),
                $checkbox = $('<input type="checkbox" class="hidden" />'),
                color = ($widget.data('color') ? $widget.data('color') : "primary"),
                style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
                settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
                };

            $widget.css('cursor', 'pointer')
            $widget.append($checkbox);

            // Event Handlers
            $widget.on('click', function () {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
                $checkbox.triggerHandler('change');
                updateDisplay();
            });
            $checkbox.on('change', function () {
                updateDisplay();
            });


            // Actions
            function updateDisplay() {
                var isChecked = $checkbox.is(':checked');

                // Set the button's state
                $widget.data('state', (isChecked) ? "on" : "off");

                // Set the button's icon
                $widget.find('.state-icon')
                    .removeClass()
                    .addClass('state-icon ' + settings[$widget.data('state')].icon);

                // Update the button's color
                if (isChecked) {
                    $widget.addClass(style + color + ' active');
                } else {
                    $widget.removeClass(style + color + ' active');
                }
            }

            // Initialization
            function init() {

                if ($widget.data('checked') == true) {
                    $checkbox.prop('checked', !$checkbox.is(':checked'));
                }

                updateDisplay();

                // Inject the icon if applicable
                if ($widget.find('.state-icon').length == 0) {
                    $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon +
                        '"></span>');
                }
            }
            init();
        });

        $('#get-checked-data').on('click', function (event) {
            event.preventDefault();
            var checkedItems = {},
                counter = 0;
            $("#check-list-box li.active").each(function (idx, li) {
                checkedItems[counter] = $(li).text();
                counter++;
            });
            $('#display-json').html(JSON.stringify(checkedItems, null, '\t'));
        });
    });
</script>
@endsection