@extends('layouts/layout')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
<div class="container w-50">
    <h1 class="text-center my-5 log-title">Day</h1>

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
    <form action="{{ route('day.create') }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
                <input type="text" class="form-control col-9" name="date" id="date" value="{{ date('Y/m/d') }}" />
                <button type="submit" class="btn btn-primary col-2">追加</button>
            </div>
        </form>


    <div class="card text-left p-4 bg-dark">
        <div id="log-inner">
            <p class="mb-0 text-center log-link">
                ====== 新しい日を始めましょう！ =====
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
    <script>
    flatpickr(document.getElementById('date'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date()
    });
    </script>

    {{--  <script>
        let target = document.getElementById('log-inner');
        target.scrollIntoView(false);
    </script>  --}}
@endsection
