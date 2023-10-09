@extends('layouts.app')
@section('content')
<div class= "container">
    <h2 class="mt-3">たび Logを投稿する</h2>
    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <div class="form-group mt-3">
            <div class="form-group">
                <label for="title">たび Log タイトル</label>
                <input id="title" type="text" class="form-control w-50" name="$posts->title" value="{{ old('$posts->title') }}">
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-6 mr-5">
                    <label for="title" class="mt-3">たびコンセプト</label>
                    <input id="title" type="text" class="form-control " name="$posts->concept" value="{{ old('$posts->concept') }}">
                </div>
                <div class="form-group col-4">
                    <label for="title" class="mt-3">たびエリア</label>
                    <input id="title" type="text" class="form-control " name="$posts->area" value="{{ old('$posts->area') }}">
                </div>
            </div>
            <div class="form-group pb-5 mt-3 mb-5">
                <label for="cover_image">背景画像の投稿</label>
                <br>
                <input id="cover_image" type="file"  name="$posts->cover_image" value="{{ old('$posts->cover_image') }}">
            </div>
            
        </div>


        <div class="form-group mt-3">
            <div class="form-row">
                <div class="form-group col-3 mr-3 border-top-0 border-bottom-0 border-left-0 border-end pr-5">
                    <label for="triptime" class="mt-3">時間</label>
                    <input id="triptime" type="string" class="form-control " name="$posts->triptime" placeholder="2023-08-25" value="{{ old('$posts->triptime') }}">
                </div>
                <div class="form-group col-8 ml-5">
                    <label for="heading" class="mt-3">見出し</label>
                    <input id="heading" type="string" class="form-control " name="$posts->heading" placeholder="関西空港へ" value="{{ old('$posts->heading') }}">

                    <label for="body" class="mt-3">内容</label>
                    <input id="body" type="text" class="form-control " name="$posts->body" placeholder="たび内容を記入" value="{{ old('$posts->body') }}">
                    <div class="form-row">
                        <div class="col-3">
                            <label for="traffic" class="mt-3">交通手段</label>
                            <input id="traffic" type="string" class="form-control " name="$posts->traffic" placeholder="南海電車" value="{{ old('$posts->traffic') }}">
                        </div>
                        <div class="de">
                            で
                        </div>
                        <div class="col-2 ml-2">
                            <label for="traffic_detail" class="mt-3">交通時間</label>
                            <input id="traffic_detail" type="string" class="form-control " name="$posts->traffic_detail"placeholder="６０分" value="{{ old('$posts->traffic_detail') }}">
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="text-center"><button type="submit" class="btn btn-dark mt-5 mb-5 center"><strong class="mr-2">+</strong>次の行程を登録</button></div>


        <div class="text-center"><button type="submit" class="btn btn-primary mt-5 mb-5 btn-lg">たび Log 登録</button></div>
    </form>
</div>
@endsection