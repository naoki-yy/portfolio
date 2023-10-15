@extends('layouts.app')
@section('content')
<h2 class="mt-2 mb-3 ml-3">{{$user->name}} のたび Log</h2>
    <ul class="nav nav-tabs nav-justified mt-5 mb-5">
        <li class="nav-item nav-link {{ Request::is('users/'. $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', $user->id) }}">たびLog<br><div class="badge badge-secondary">{{ $countPosts }}</div></a></li>
        <li class="nav-item nav-link><a href="">いいね一覧<br><div class="badge badge-secondary"></div></a></li>
    </ul>
   
    @if($posts)    
    @foreach ($posts as $post)
        
        <div class="margin-welcome">
            <div class="row">
                <div class="col-9 bg-secondary colback">
                    <div class="d-flex justify-content-between">
                        <h4 class="text-white">たび Logタイトル : {{$post->title}}</h4>
                        <h5>いいね！０</h5>
                    </div>
                    <div class="row row-height">
                        <div class="col-8 bg-dark backgroud-height">
                            <h4 class="text-white">投稿画像が入る箇所</h4>
                        </div>
                        <div class="col-4 card text-bg-primary mb-3">
                            <div class="card-header">たび地 : {{$post->area}}</div>
                            <div class="card-body">
                                <p class="card-text">たびコンセプト</p>
                                <p>{{$post->concept}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 bg-dark">
                    <h4 class="mt-3 text-white">たび人：{{$user -> name}}</h4>
                    <button type="button" class="mt-3 btn btn-primary btn-lg"><a href="/" class="text-white">たび Logを見る</a></button>
                    </br>
                    <button type="button" class="mt-3 btn btn-secondary">いいね！</button>
                    </br>
                    <button type="button" class="mt-3 btn btn-primary">SNS共有</button>
                    @if (Auth::id() === $post->user_id)
                        <form method="POST" action="{{ route('post.delete', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">このたび Logを削除する</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>     
    @endforeach
    @else
    <p>ユーザは投稿していません</p>
    @endif

@endsection