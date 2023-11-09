@extends('layouts.app')
@section('content')
<div class= "container">
    <h2 class="mt-3">たび Logを投稿する</h2>
    @include('commons.error_messages')
    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <div class="form-group">
                <label for="title">たび Log タイトル</label>
                <input id="title" type="text" class="form-control w-50" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-6 mr-5">
                    <label for="title" class="mt-3">たびコンセプト</label>
                    <input id="title" type="text" class="form-control " name="concept" value="{{ old('concept') }}">
                </div>
                <div class="form-group col-4">
                    <label for="title" class="mt-3">たびエリア</label>
                    <input id="title" type="text" class="form-control " name="area" value="{{ old('area') }}">
                </div>
            </div>
            <div class="form-row mt-3 mb-5 pb-5">
                <div class="form-group col6">
                    <label for="cover_image">背景画像の投稿</label>
                    <br>
                    <input id="cover_image" type="file"  name="cover_image_path" value="{{ old('cover_image_path') }}">
                </div>
                <div class="form-group col-4">
                    <label for="template">テンプレート選択</label>
                    <select class="form-control" id="template" name="template_id">
                        <option value="1">テンプレート1</option>
                        <option value="2">テンプレート2</option>
                        <option value="3">テンプレート3</option>
                    </select>
                </div>
            </div>
            
        </div>

        <h3 class="mt-3">たびの<strong>「おすすめポイント」</strong>を登録</h3>


        <div class="form-group mt-3">
            <div class="form-row mb-5 pb-4">
                <div class="form-group col-3 mr-3 pr-5">
                    <label for="triptime" class="mt-3 font-weight-bold">おすすめポイント  その１</label>
                    <input id="triptime" type="string" class="form-control " name="recommendation_point1" value="{{ old('recommendation_point1') }}">
                </div>
                <div class="form-group col-8 ml-5">
                    <label for="cover_image" class="mr-3 pr-3 font-weight-bold">画像（500px✖️300px）</label>
                    <input id="cover_image" type="file"  name="recommendation_image1" value="{{ old('recommendation_image1') }}">
                    <br>
                    <label for="body" class="mt-3 font-weight-bold">内容</label>
                    <textarea id="textarea" class="form-control" name="recommendation_text1" placeholder="たび内容を記入" >{{ old('recommendation_text1') }}</textarea>
                </div> 
            </div>
        </div>  
        
        <div class="form-group mt-3">
            <div class="form-row  mb-5 pb-4">
                <div class="form-group col-3 mr-3 pr-5">
                    <label for="triptime" class="mt-3 font-weight-bold">おすすめポイント  その２</label>
                    <input id="triptime" type="string" class="form-control " name="recommendation_point2" value="{{ old('recommendation_point2') }}">
                </div>
                <div class="form-group col-8 ml-5">
                    <label for="cover_image" class="mr-3 pr-3 font-weight-bold">画像（500px✖️300px）</label>
                    <input id="cover_image" type="file"  name="recommendation_image2" value="{{ old('recommendation_image2') }}">
                    <br>
                    <label for="body" class="mt-3 font-weight-bold">内容</label>
                    <textarea id="textarea" class="form-control" name="recommendation_text2" placeholder="たび内容を記入" >{{ old('recommendation_text2') }}</textarea>
                </div> 
            </div>
        </div> 

        <div class="form-group mt-3">
            <div class="form-row  mb-5 pb-4">
                <div class="form-group col-3 mr-3 pr-5">
                    <label for="triptime" class="mt-3 font-weight-bold">おすすめポイント  その３</label>
                    <input id="triptime" type="string" class="form-control " name="recommendation_point3"  value="{{ old('recommendation_point3') }}">
                </div>
                <div class="form-group col-8 ml-5">
                    <label for="cover_image" class="mr-3 pr-3 font-weight-bold">画像（500px✖️300px）</label>
                    <input id="cover_image" type="file"  name="recommendation_image3" value="{{ old('recommendation_image3') }}">
                    <br>
                    <label for="body" class="mt-3 font-weight-bold">内容</label>
                    <textarea id="textarea" class="form-control" name="recommendation_text3" placeholder="たび内容を記入" >{{ old('recommendation_text3') }}</textarea>
                </div> 
            </div>
        </div> 

        <div class="text-center"><button type="submit" class="btn btn-primary mt-5 mb-5 btn-lg">たび Log 登録</button></div>
    </form>
</div>
@endsection