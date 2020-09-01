@extends('layouts/layout')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Edit</h1>
    <form action="{{ route('log.update', ['log' => $log]) }}" method="post" class="card text-center p-5">
        @csrf
        <p>
            <label for="">ログ編集</label>
            <input type="text" name="log" value="{{ $log->log }}">
            <button type="submit">送信</button>
        </p>
    </form>
    <form action="{{ route('log.destroy', ['log' => $log]) }}" method="post" id="delete_{{ $log->id }}">
        @csrf
        <a href="#" data-id="{{ $log->id }}" onclick="deletePost(this);">このログを削除する</a>
    </form>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除しますか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
@endsection
