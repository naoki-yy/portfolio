@extends('layouts.app')
@section('content')
<h2 class="mt-2 mb-3 ml-3">みんなのたび Log</h2>
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
                            <h4 class="text-white">たび Logタイトル : {{ $post->title }}</h4>
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
                    @if(Auth::check() && Auth::user()->name === $post ->user->name)
                    <h4 class="mt-3"><a href="{{ route('users.mypage') }}" class=" text-white">たび人：{{$post ->user->name}}</a></h4>
                    @else
                    <h4 class="mt-3"><a href="{{ route('users.show',$post ->user_id) }}" class=" text-white">たび人：{{$post ->user->name}}</a></h4>
                    @endif
                    <button type="button" class="mt-3 btn btn-primary btn-lg mb-3"><a href="{{ route('posts.log', ['user_id' => $post->user_id, 'id' => $post->id]) }}" class="text-white">たび Logを見る</a></button>
                    </br>
                    <!-- <button type="button" class="mt-3 btn btn-secondary">いいね！</button> -->
                    @include('favorite.favorite_button', ['post' => $post])
                    </br>
                    <button type="button" class="mt-2 btn btn-primary"><a href="https://twitter.com/share? url={ページのURL} & hashtags=hashtag,hashtag2& text=リンクテキスト"  rel="nofollow"  target="_blank" class="text-white">twitter共有</a></button>
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
        @endif
    @endforeach
</div>
{{ $posts->links('pagination::bootstrap-4') }}
@endsection