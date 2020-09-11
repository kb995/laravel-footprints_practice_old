@extends('layouts/layout')

@section('content')
<div class="container w-50">
    <h1 class="text-center my-5 log-title">Edit</h1>
    <form action="{{ route('log.update', ['day' => $day, 'log' => $log]) }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input class="form-control col-9" type="text" name="log" value="{{ $log->log }}">
            <button class="btn btn-primary col-2" type="submit">編集</button>
        </div>
    </form>
    <form action="{{ route('log.destroy', ['day' => $day, 'log' => $log]) }}" method="post" id="delete_{{ $log }}">
        @csrf
        <div class="text-right">
            <a class="text-danger" href="#" data-id="{{ $log }}" onclick="deletePost(this);">このログを削除する</a>
        </div>
    </form>
    </div>
@endsection

@section('scripts')
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除しますか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
@endsection
