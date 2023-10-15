@extends('layouts.app')
@section('content')
<h2 class="mt-2 mb-3 ml-3">みんなのたび Log</h2>
<div>
    @foreach ($users as $user)
        @php
            $post = $user->posts->last();
        @endphp
        @if($post)
        <div class="margin-welcome">
            <div class="row">
                <div class="col-9 bg-secondary colback">
                    <div class="d-flex justify-content-between">
                            <h4 class="text-white">たび Logタイトル : {{ $post->title }}</h4>
                        <h5>いいね！０</h5>
                    </div>
                    <div class="row row-height">
                        <div class="col-8 bg-dark backgroud-height">
                            <h4 class="text-white">{{ $post -> cover_image}}</h4>
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
                    @if(Auth::user()->name === $user ->name)
                    <h4 class="mt-3"><a href="{{ route('users.mypage') }}" class=" text-white">たび人：{{$user -> name}}</a></h4>
                    @else
                    <h4 class="mt-3"><a href="{{ route('users.show',$user->id) }}" class=" text-white">たび人：{{$user -> name}}</a></h4>
                    @endif
                    <button type="button" class="mt-3 btn btn-primary btn-lg"><a href="{{ route('posts.log', ['user_id' => $post->user_id, 'id' => $post->id]) }}" class="text-white">たび Logを見る</a></button>
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
        @endif
    @endforeach
</div>
{{ $users->links('pagination::bootstrap-4') }}
@endsection