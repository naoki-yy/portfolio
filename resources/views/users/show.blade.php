@extends('layouts.app')
@section('content')
<h2 class="mt-2 mb-3 ml-3 font-weight-bold">{{$user->name}} のたび Log</h2>
    <ul class="nav nav-tabs nav-justified mt-5 mb-5">
        <li class="nav-item nav-link {{ Request::is('users/'. $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', $user->id) }}">たびLog<br><div class="badge badge-secondary">{{ $countPosts }}</div></a></li>
        <li class="nav-item nav-link {{ Request::is('users/'. $user->id. '/favorites') ? 'active' : '' }}"><a href="{{ route('users.favorites', $user->id) }}">いいね一覧<br><div class="badge badge-secondary">{{ $countFavorites }}</div></a></li>
    </ul>
   
    @if($posts)    
    @foreach ($posts as $post)
        @php
            $user = $post->user->get();
            $totalFavorites = $post->favoriteUsers()->count();
        @endphp
        
        <div class="margin-welcome">
            <div class="row">
                <div class="col-9 colback" style="background-color: #8fcafa">
                    <div class="d-flex justify-content-between">
                        <h4 class="text-white font-weight-bold pt-2">たび Logタイトル : {{$post->title}}</h4>
                        <h5>
                            <div class="text-right">
                            <div class="badge badge-pill badge-primary mt-2">{{ $totalFavorites }} いいね!</div>
                        </div>
                        </h5>
                    </div>
                    <div class="row row-height">
                        <div class="col-5 bg-dark backgroud-height p-0">
                        @if($post->cover_image_path !== null)
                            <img src="{{ $post->cover_image_path }}" alt= "投稿画像" width="508" height="206"class="mx-auto d-block object-fit-cover" style="width: 100%;">
                            @else
                            <img src="{{ asset('image/no_image.jpg')}}" alt= "投稿画像" width="508" height="206"class="mx-auto d-block object-fit-cover" style="width: 100%;">
                            @endif
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
                <div class="col-3" style="background-color: #8fcafa">
                    <h4 class="mt-3 text-white font-weight-bold">たび人：{{$post ->user->name}}</h4>
                    <button type="button" class="mt-3 btn border btn-lg mb-5"><a href="{{ route('posts.log', ['user_id' => $post->user_id, 'id' => $post->id]) }}" class="text-white">たび Logを見る</a></button>
                    <!-- <button type="button" class="mt-3 btn btn-secondary">いいね！</button> -->
                    @include('favorite.favorite_button', ['post' => $post])
                    @if (Auth::id() === $post->user_id)
                        <div class="d-flex justify-content-between pt-4">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">編集</a>
                            <form method="POST" action="{{ route('post.delete', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>     
    @endforeach
    @else
    <p>ユーザは投稿していません</p>
    @endif

    {{ $posts->links('pagination::bootstrap-4') }}

@endsection