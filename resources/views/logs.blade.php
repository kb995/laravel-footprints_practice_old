@extends('layouts/layout')

@section('styles')
    @include('libs.flatpickr.styles')
@endsection

@section('content')
<div class="container w-50">
    <h1 class="text-center my-5 log-title">Logs</h1>

    {{--  エラー表示  --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{--  日付フォーム  --}}
    {{--  <form action="{{ route('day.create') }}" method="post" class="card text-center px-5 bg-light">
    @csrf
    <div class="form-group p-3  mb-0 row">
            <input type="text" class="form-control col-9" name="date" id="date" value="{{ date('Y/m/d') }}" />
            <button type="submit" class="btn btn-primary col-2">追加</button>
        </div>
    </form>  --}}
    <a href="{{ route('index') }}">日付を追加</a>
    {{--  行動ログフォーム  --}}
    <form action="{{ route('log.create', ['day' => $day]) }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input class="form-control col-9" type="text" name="log" placeholder="行動ログを記録しましょう">
            <button type="submit" class="btn btn-primary col-2">追加</button>
        </div>
    </form>

    <div class="card text-left p-4 bg-dark log-scroll">
        <div id="log-inner">
            <p class="mb-0 log-link">
                    <span>======== </span> {{ $day->date }} <span> =========================</span>
            </p>
            @isset($logs)
            @foreach($logs as $log)
            <p class="mb-0 log-link">
                <a class="log-link" href="{{ route('log.edit', ['day' => $day, 'log' => $log] ) }}">
                {{ $log->log }}
                </a>
            </p>
            @endforeach
            @endisset

        </div>
    </div>
</div>
@endsection
