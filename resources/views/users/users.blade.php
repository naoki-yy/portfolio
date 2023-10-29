@extends('layouts.app')
@section('content')
<div>
    <h1 class="mt-1 mb-2 text-center">みんなのたび Log<i class="fa-regular fa-paper-plane ml-2 mb-2" style="color: #343a3f;"></i></h1>
    
    <form action="{{ route('post.search') }}" method="GET" class="ml-3 pt-3 mb-4 mx-auto border-custom1">
    @csrf
    <h5 class="text-center pb-2">検索条件を指定</h5>
        <fieldset class="mb-2">
        <input id="item-1" class="radio-inline__input" type="radio" value="title" name="search_option[]" checked="checked"/>
        <label class="radio-inline__label" for="item-1">
            タイトル
        </label>
        <input id="item-2" class="radio-inline__input" type="radio" value="area" name="search_option[]">
        <label class="radio-inline__label" for="item-2">
            エリア
        </label>
        <input id="item-3" class="radio-inline__input" type="radio" value="name" name="search_option[]">
        <label class="radio-inline__label" for="item-3">
                ユーザ名
        </label>
    </fieldset>


    <input type="text" name="keyword">
    <input type="submit" value="検索" class="ml-3 text-center">
    </form>
</div>
<div>
    @foreach ($posts as $post)
        @php
            $user = $post->user->get();
                $totalFavorites = $post->favoriteUsers()->count();
        @endphp
        @if($post)
        <div class="margin-welcome">
            <div class="row">
                <div class="col-9 bg-secondary colback">
                    <div class="d-flex justify-content-between">
                            <h4 class="text-white pt-1">{{ $post->title }}</h4>
                            <h5>
                                <div class="text-right align-middle">
                                <span class="badge badge-pill badge-primary">{{ $totalFavorites }} いいね!</span>
                                </div>
                            </h5>
                    </div>
                    <div class="row row-height">
                        <div class="col-5 bg-dark backgroud-height p-0">
                            @if($post->cover_image_path !== null)
                            <img src="{{ asset($post->cover_image_path)}}" alt= "投稿画像" width="508" height="206"class="mx-auto d-block image-fit" style="width: 100%;">
                            @else
                            <img src="{{ asset('storage/image/ZpY2O0NcYLi8hrtLwuzhE6bHtjTorzwLEnyNCs0M.jpg')}}" alt= "投稿画像" width="508" height="206"class="mx-auto d-block image-fit" style="width: 100%;">
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
                <div class="col-3 bg-secondary">
                    @if(Auth::check() && Auth::user()->name === $post ->user->name)
                    <h4 class="mt-3"><a href="{{ route('users.mypage') }}" class=" text-white">たび人：{{$post ->user->name}}</a></h4>
                    @else
                    <h4 class="mt-3"><a href="{{ route('users.show',$post ->user_id) }}" class=" text-white">たび人：{{$post ->user->name}}</a></h4>
                    @endif
                    <button type="button" class="mt-3 btn border btn-lg mb-3 mb-5"><a href="{{ route('posts.log', ['user_id' => $post->user_id, 'id' => $post->id]) }}" class="text-white">たび Logを見る</a></button>
                    @include('favorite.favorite_button', ['post' => $post])
                    @if (Auth::id() === $post->user_id)
                        <div class="d-flex justify-content-between mt-4">
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
        @endif
    @endforeach
</div>
{{ $posts->links('pagination::bootstrap-4') }}
@endsection