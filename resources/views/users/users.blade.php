@extends('layouts.app')
@section('content')
<h2 class="mt-2 mb-3 ml-3">みんなのたび Log</h2>
<div>
    @foreach ($users as $user)
        @php
            $post = $user->posts->last();
        @endphp
        <div class="margin-welcome">
            <div class="row">
                <div class="col-9 bg-secondary colback">
                    <div class="d-flex justify-content-between">
                        <h4 class="text-white">たび Logタイトル : {{$schedules->title}}</h4>
                        <h5>いいね！０</h5>
                    </div>
                    <div class="row row-height">
                        <div class="col-8 bg-dark backgroud-height">
                            <h4 class="text-white">投稿画像が入る箇所</h4>
                        </div>
                        <div class="col-4 card text-bg-primary mb-3">
                            <div class="card-header">たび地 : {{$schedules->area}}</div>
                            <div class="card-body">
                                <p class="card-text">たびコンセプト</p>
                                <p>{{$schedules->concept}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 bg-danger">
                    <h4 class="mt-3">たび人：{{$user -> name}}</h4>
                    <button type="button" class="mt-3 btn btn-primary btn-lg"><a href="/" class="text-white">たび Logを見る</a></button>
                    </br>
                    <button type="button" class="mt-3 btn btn-secondary">いいね！</button>
                    </br>
                    <button type="button" class="mt-3 btn btn-primary">SNS共有</button>
                </div>
            </div>
        </div>
        
    @endforeach
</div>
{{ $users->links('pagination::bootstrap-4') }}
@endsection