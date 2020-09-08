@extends('layouts/layout')

@section('content')
<div class="container w-50">
    <h1 class="text-center my-5 log-title">Logs</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('log.create') }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input class="form-control col-9" type="text" name="log" placeholder="行動ログを記録しましょう">
            <button type="submit" class="btn btn-primary col-2">追加</button>
        </div>
    </form>
    <div class="card text-left p-4 bg-dark log-scroll">
        <div id="log-inner">
            @foreach($logs as $log)
            {{--  日付処理  --}}

            <p class="mb-0 text-white">{{date('Y年m月d日', strtotime($log->created_at))}}</p>
            <p class="mb-0">
                <a class="log-link" href="{{ route('log.edit', $log) }}" data-toggle="tooltip" data-placement="bottom" title="ログを編集">
                    {{$log->log}}
                </a>
            </p>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        let target = document.getElementById('log-inner');
        target.scrollIntoView(false);
    </script>
@endsection
