@extends('layouts.app2')
@section('content')
    @php
        $totalFavorites = $post->favoriteUsers()->count();
    @endphp

    <div>
        @if($post->recommendation_image1 !== null)
        <img src="{{ $post->cover_image_path}}" alt= "投稿画像" width="100%" height="500px" class="image-fit">
        @else
        <img src="{{ asset('image/no_image.jpg')}}" alt= "投稿画像" width="500" height="300" class="image-fit">
        @endif
    </div>


@endsection