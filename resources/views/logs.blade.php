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

    <form action="{{ route('log.create') }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input class="form-control col-9" type="text" name="log" placeholder="行動ログを記録しましょう">
            <button type="submit" class="btn btn-primary col-2">追加</button>
        </div>
    </form>
    <div style="height:300px;" class="card text-left p-4 overflow-auto bg-dark">
        @foreach($logs as $log)
        {{--  <a class="border-0" href="{{ route('log.edit', $log) }}" data-toggle="tooltip" data-placement="bottom" title="ログを編集">  --}}
            <p class="text">
                {{$log->log}}
            </p>
        {{--  </a>  --}}
        @endforeach
    </div>
</div>
@endsection
