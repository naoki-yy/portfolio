@extends('layouts.app')
@section('content')
<div class="container"> 
    <h1 class="mb-4 pb-1font-weight-bold">AIの提案場所</h1>
    <h3 class="mb-4">
        @php
            $words = explode(' ', $response_text);

            $linkedResponseText = '';

            $noLinkPlaces = [];

            foreach ($words as $word) {
                if (in_array($word, $placeNames)) {
                    $linkedResponseText .= "<a href='" . route("topic.show", ["place" => $word]) . "'>$word</a> ";
                } else {
                    $linkedResponseText .= $word . ' ';
                
            

                }
            }
        @endphp
        {!! $linkedResponseText !!}
        </h3>


        @if ($areaPosts->isNotEmpty())
            <h2 class="pt-5 font-weight-bold">{{ $response_text }} の投稿一覧</h2>
            @foreach ($areaPosts as $post)
                @php
                    $user = $post->user->get();
                    $totalFavorites = $post->favoriteUsers()->count();
                @endphp

            <div>
            <div class="row">
                <div class="col-9 colback" style="background-color: #8fcafa">
                    <div class="d-flex justify-content-between">
                        <h4 class="text-white pt-1 font-weight-bold">{{ $post->title }}</h4>
                        <h5>
                            <div class="text-right align-middle">
                                <div class="badge badge-pill badge-primary mt-2">{{ $totalFavorites }} いいね!</div>
                            </div>
                        </h5>
                    </div>
                    <div class="row row-height">
                        <div class="col-5 bg-dark backgroud-height p-0">
                            @if($post->cover_image_path !== null)
                            <img src="{{ $post->cover_image_path}}" alt= "投稿画像" width="508" height="206"class="mx-auto d-block object-fit-cover" style="width: 100%;">
                            @else
                            <img src="{{ asset('public/image/no_image.jpg')}}" alt= "投稿画像" width="508" height="206"class="mx-auto d-block object-fit-cover" style="width: 100%;">
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
                    @if(Auth::check() && Auth::user()->name === $post ->user->name)
                    <h4 class="mt-3"><a href="{{ route('users.mypage') }}" class=" text-white font-weight-bold">たび人：{{$post ->user->name}}</a></h4>
                    @else
                    <h4 class="mt-3"><a href="{{ route('users.show',$post ->user_id) }}" class=" text-white">たび人：{{$post ->user->name}}</a></h4>
                    @endif
                    <button type="button" class="mt-3 btn border btn-lg mb-3"><a href="{{ route('posts.log', ['user_id' => $post->user_id, 'id' => $post->id]) }}" class="text-white">たび Logを見る</a></button>
                    @include('favorite.favorite_button', ['post' => $post])
                    @if (Auth::id() === $post->user_id)
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mt-4">編集</a>
                            <form method="POST" action="{{ route('post.delete', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-4">削除</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>     
        @endforeach
        @else
            <h5 class="pt-2">このエリアに関連する投稿はありません。<a href="{{ route('post.create') }}" class="font-weight-bold">投稿</a>しますか？</h5>
        @endif
        {{$areaPosts->appends(request()->query())->links('pagination::bootstrap-4')}} 

    <a href="{{ route('top') }}" class="mt-3">再度、AIで探す</a>
</div>
</div>
@endsection
