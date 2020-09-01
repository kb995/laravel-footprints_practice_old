@extends('layouts/layout')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Logs</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('log.create') }}" method="post" class="card text-center py-5">
        @csrf
        <p>
            <label for="">ログ追加</label>
            <input type="text" name="log">
            <button type="submit">送信</button>
        </p>
    </form>

    <div class="card text-left p-5">
        @foreach($logs as $log)
        <p>{{$log->created_at}} : {{$log->log}} <a href="{{ route('log.edit', $log) }}">編集/削除</a></p>
        @endforeach
    </div>
</div>
@endsection
