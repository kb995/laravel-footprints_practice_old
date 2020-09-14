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

    {{--  行動ログフォーム  --}}
    <form action="{{ route('log.create', ['day' => $current_day]) }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input class="form-control col-3" type="time" name="" value="">
            <input class="form-control col-7" type="text" name="log" placeholder="行動ログを記録しましょう">
            <button type="submit" class="btn btn-primary col-2">追加</button>
        </div>
    </form>

    {{--  行動ログ一覧  --}}
    <div class="card text-left p-4 bg-dark log-scroll">
        <div id="log-inner">
            @isset($current_day)
            <p class="mb-0 log-link">
                <span>======== </span> {{ $current_day->date }} <span> =========================</span>
            </p>
            @endisset

            @empty($current_day)
            <p class="mb-0 log-link">
                <span>======== </span> 新しい日を登録しましょう <span> =========================</span>
            </p>
            @endempty

            @foreach($logs as $log)
            <p class="mb-0 log-link">
                <a class="log-link" href="{{ route('log.edit', ['day' => $current_day, 'log' => $log] ) }}">
                {{ $log->log }}
                </a>
            </p>
            @endforeach
        </div>
    </div>

    {{--  日付の選択/追加  --}}
    <div class="mt-4">
        日付一覧
        <select name="" id="">
        @foreach($days as $day)
            <option value="">{{ $day->date }}</option>
        @endforeach
        </select>
    </div>
    <form action="">
        日付追加
        <input type="text">
    </form>
</div>


@endsection
