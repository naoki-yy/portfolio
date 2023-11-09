@extends('layouts.app2')
@section('content')
    @php
        $totalFavorites = $post->favoriteUsers()->count();
    @endphp
    <div class="bgover">
        @if($post->recommendation_image1 !== null)
        <img src="{{ $post->cover_image_path}}" alt= "投稿画像" width="100%" height="550px" class="object-fit-cover">
        @else
        <img src="{{ asset('image/no_image.jpg')}}" alt= "投稿画像" width="100%" height="550" class="object-fit-cover">
        @endif
        <div class="overlay1">
            <div class="d-flex justify-content-between">
                <p class="ml-2">{{$post->area}}</p>
                <p class="mr-2 text-dangerbadge badge-pill badge-success">いいね！ {{ $totalFavorites }}</p>
            </div>
            <h3>{{$post->title}}</h3>
            <p>{{$post->concept}}</p>
        </div>
    </div>

    <div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-title text-center">{{ $post->recommendation_point1 }}</h5>
                @if($post->recommendation_image1 !== null)
                <img src="{{ $post->recommendation_image1}}" alt= "投稿画像" width="500" height="300" class="object-fit-cover card-img-top">
                @else
                <img src="{{ asset('image/no_image.jpg')}}" alt= "投稿画像" width="500" height="300" class="object-fit-cover card-img-top">
                @endif
                <div class="card-body">
                    <p class="card-text">{{ $post->recommendation_text1 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-title text-center">{{ $post->recommendation_point2 }}</h5>
                @if($post->recommendation_image2 !== null)
                <img src="{{ $post->recommendation_image2}}" alt= "投稿画像" width="500" height="300" class="object-fit-cover card-img-top">
                @else
                <img src="{{ asset('image/no_image.jpg')}}" alt= "投稿画像" width="500" height="300" class="object-fit-cover card-img-top">
                @endif
                <div class="card-body">
                    <p class="card-text">{{ $post->recommendation_text2 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-title text-center">{{ $post->recommendation_point3 }}</h5>
                @if($post->recommendation_image3 !== null)
                <img src="{{ $post->recommendation_image3}}" alt= "投稿画像" width="500" height="300" class="object-fit-cover card-img-top">
                @else
                <img src="{{ asset('image/no_image.jpg')}}" alt= "投稿画像" width="500" height="300" class="object-fit-cover card-img-top">
                @endif
                <div class="card-body">
                    <p class="card-text">{{ $post->recommendation_text3 }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center"><button type="submit" class="btn btn-primary mt-2 mb-3 btn-lg"><a href="{{route('/')}}" class="text-white">ホーム</a></button></div>


@endsection