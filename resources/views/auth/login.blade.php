@extends('layouts/layout')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Login</h1>

    <form action="{{ route('login') }}" method="POST" class="w-50 mx-auto">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
        @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
        @endforeach
        </div>
        @endif
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
          <label for="password">パスワード</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
</div>
@endsection
