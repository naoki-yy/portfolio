@extends('layouts.app')
@section('content')
<div> 
    <h1 class="mb-3 pb-1 ml-3">AIの提案場所</h1>
    <h3 class="mb-2 ml-3">
        @php
            $words = explode(' ', $response_text);

            $linkedResponseText = '';

            $noLinkPlaces = [];

            foreach ($words as $word) {
                if (in_array($word, $placeNames)) {
                    $linkedResponseText .= "<a href='" . route('topic.show', ['place' => $word]) . "'>$word</a> ";
                } else {
                    $linkedResponseText .= $word . ' ';
                
            

                }
            }
        @endphp
        {!! $linkedResponseText !!}
        </h3>


        @if ($areaPosts->isNotEmpty())
            <h2 class="pt-5 ml-3">{{ $response_text }} の投稿一覧</h2>
            @foreach ($areaPosts as $post)
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
                        <div class="col-3 bg-dark">
                            <h4 class="mt-3 text-white">たび人：{{$post ->user->name}}</h4>
                            <button type="button" class="mt-3 btn btn-primary btn-lg mb-3"><a href="{{ route('posts.log', ['user_id' => $post->user_id, 'id' => $post->id]) }}" class="text-white">たび Logを見る</a></button>
                            </br>
                            <!-- <button type="button" class="mt-3 btn btn-secondary">いいね！</button> -->
                            @include('favorite.favorite_button', ['post' => $post])
                            </br>
                            <button type="button" class="mt-2 btn btn-primary">SNS共有</button>
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
            <h5 class="ml-3 pt-2">このエリアに関連する投稿はありません。<a href="{{ route('post.create') }}">投稿</a>しますか？</h5>
        @endif

        <!-- {{ $areaPosts->links('pagination::bootstrap-4') }} -->
        {{$areaPosts->appends(request()->query())->links('pagination::bootstrap-4')}} 

    <a href="{{ route('top') }}" class="ml-3 mt-1">再度、AIで探す</a>
</div>
@endsection
