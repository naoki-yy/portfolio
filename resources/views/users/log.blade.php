@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex">
        <div>
            <h1>{{ $post->title}}</h1>
            <h5 style="border-top: solid thick #6C757D"></h5>
        </div>
        <h5 class="ml-5 mt-4 pt-1">いいね！ 0</h5>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            {{ $post->cover_image }}
        </div>
        <div class="col-6">
            <h2 class="pb-3">{{$post -> concept}}</h2>
            <h4 class="pb-3">たび人  :  {{$user->name}}</h4>
            <h4 class="pb-3">たびエリア  :  {{$post -> area}}</h4>
        </div>
    </div>

    <div class="col-6 card text-bg-primary mb-3 mt-5">
        <div class="card-header">ー  たび Log 目次  ー</div>
            <div class="card-body">
                <p class="card-text"><a href="#1" class="text-muted">１ー  {{$post->recommendation_point1}}</a></p>
                <p class="card-text"><a href="#2" class="text-muted">２ー  {{$post->recommendation_point2}}</a></p>
                <p class="card-text"><a href="#3" class="text-muted">３ー  {{$post->recommendation_point3}}</a></p>
            </div>
    </div>
    <h1 class="mt-5 pt-1" id="1">１ー  {{$post->recommendation_point1}}</h1>
    <h5 style="border-top: solid thick #6C757D" class="w-50"></h5>
    <div class="row mt-4 pt-2">
        <div class="col-6">
            {{ $post->recommendation_image1 }}
        </div>
        <div class="col-6">
            <h4 class="pb-3">{{$post -> recommendation_text1}}</h4>
        </div>
    </div>

    <h1 class="mt-5 text-right pt-3" id="2">２ー  {{$post->recommendation_point2}}</h1>
    <h5 style="border-top: solid thick #6C757D; float: right;" class="w-50"></h5>
    <div class="row mt-4 pt-2">
        <div class="col-6">
            <h4 class="pb-3">{{$post -> recommendation_text2}}</h4>
        </div>
        <div class="col-6">
            {{ $post->recommendation_image2 }}
        </div>
    </div>

    <h1 class="mt-5 pt-3" id="3">３ー  {{$post->recommendation_point3}}</h1>
    <h5 style="border-top: solid thick #6C757D" class="w-50"></h5>
    <div class="row mt-4 pt-2">
        <div class="col-6">
            {{ $post->recommendation_image3 }}
        </div>
        <div class="col-6">
            <h4 class="pb-3">{{$post -> recommendation_text3}}</h4>
        </div>
    </div>

</div>

    

@endsection