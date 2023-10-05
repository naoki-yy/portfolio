@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>たび Log<i class="fa-regular fa-paper-plane ml-2 mr-3"></i>へようこそ！</h1>
    </div>
    <div class="text-center mt-3">
        <p class="text-left d-inline-block">新規ユーザ登録すると,あなたの旅の思い出を登録出来ます。</p>
    </div>
    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">新規ユーザー登録</h3>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-sm-6 offset-sm-3">
            <form method="POST" action="{{ route('signup.post') }}">
                @csrf
                <div class="form-group">
                    <label for="name">名前</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="４文字以上" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">パスワード確認</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="４文字以上" value="{{ old('password_confirmation') }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-2 btn-lg">新規登録</button>
                </div>
            </form>
        </div>
    </div>
@endsection