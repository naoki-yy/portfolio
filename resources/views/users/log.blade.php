@extends('layouts.app2')
@section('content')
    @php
        $totalFavorites = $post->favoriteUsers()->count();
    @endphp
    <div class="container">
        @if($post->template_id == 1)
            @include('users.log1', ['post' => $post])
        @elseif($post->template_id == 2)
            @include('users.log2', ['post' => $post])
        @elseif($post->template_id == 3)
            @include('users.log3', ['post' => $post])
        @endif
    </div>

    </div>

<div class="text-center"><button type="submit" class="btn btn-primary mt-5 mb-5 btn-lg"><a href="{{route('/')}}" class="text-white">ホーム</a></button></div>

@endsection


