@extends('layouts.app')
@section('content')
<!-- <div class="container"> -->
<div class="container-fluid bg01">
    <div class="row">
        <div class="col-8 offset-2">
            <h1 class="mt-3 pb-5 mb-5">たび Log</h1>
            
            <h3 class="mt-3 pb-4">あなたにぴったりな旅場所は？</h3>
            @include('gpt')
        </div>
    </div>
</div>
@endsection