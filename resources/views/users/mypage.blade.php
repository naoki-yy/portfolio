@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between">
    <h2 class="mt-2 mb-3 ml-3 mr-3">{{$user->name}} のたび Log</h2>
    <form method="POST" action="{{ route ( 'users.delete' , $user->id) }}" >
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger btn-sm mr-3">退会する</button>
    </form>
</div>


<ul class="nav nav-tabs nav-justified mt-3 mb-5">
    <li class="nav-item nav-link {{ Request::is('users/'. $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', $user->id) }}">たびLog<br><div class="badge badge-secondary">{{ $countPosts }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/'. $user->id. '/favorites') ? 'active' : '' }}"><a href="{{ route('users.favorites', $user->id) }}">いいね一覧<br><div class="badge badge-secondary">{{ $countFavorites }}</div></a></li>
</ul>
<div>
@if($posts -> count() > 0)    
    @foreach ($posts as $post)

        @php
            $user = $post->user->get();
            $totalFavorites = $post->favoriteUsers()->count();
        @endphp
        
        <div class="margin-welcome">
            <div class="row">
                <div class="col-9 bg-secondary colback">
                    <div class="d-flex justify-content-between">
                        <h4 class="text-white">たび Logタイトル : {{$post->title}}</h4>
                        <h5>
                            <div class="text-right">
                                <span class="badge badge-pill badge-primary">{{ $totalFavorites }} いいね!</span>
                            </div>
                        </h5>
                    </div>
                    <div class="row row-height">
                        <div class="col-5 bg-dark backgroud-height p-0">
                            <img src="{{ asset($post->cover_image_path)}}" alt= "投稿画像" width="508" height="206"class="mx-auto d-block image-fit" style="width: 100%;">
                        </div>
                        <div class="col-7 card text-bg-primary mb-3">
                            <div class="card-header">たび地 : {{$post->area}}</div>
                            <div class="card-body">
                                <p class="card-text">たびコンセプト</p>
                                <p>{{$post->concept}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 bg-dark">
                    <h4 class="mt-3 text-white">たび人：{{$post-> user -> name}}</h4>
                    <button type="button" class="mt-3 btn btn-primary btn-lg"><a href="/" class="text-white">たび Logを見る</a></button>
                    </br>
                    <button type="button" class="mt-3 btn btn-secondary">いいね！</button>
                    </br>
                    <button type="button" class="mt-3 btn btn-primary">SNS共有</button>
                    @if (Auth::id() === $post->user_id)
                    <div class="d-flex justify-content-between">
                        <form method="POST" action="{{ route('post.delete', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">このたび Logを削除する</button>
                        </form>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">編集する</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>     
    @endforeach
    {{ $posts->links('pagination::bootstrap-4') }}
@else
<p>ユーザは投稿していません</p>
@endif



<div class="text-center"><button type="submit" class="btn btn-primary mt-5 mb-5 btn-lg"><a href="{{route('/')}}" class="text-white">ホーム</a></button></div>
</div>  
@endsection