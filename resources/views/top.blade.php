@extends('layouts.app2')
@section('content')  
    <div class="container-fluid bg01" >
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="mt-5 pb-5 mb-5"></h1>
                
                <h2 class="mt-4 pb-5 text-white font-weight-bold">あなたにぴったりな旅場所は？</h2>
                @include('gpt.gpt')
            </div>
        </div>
    </div>
    <div class="container pt-4">
        <h1 class="text-center font-weight-bold mb-1" style="color: #1bacb6;">たび Logとは？</h1>
        <hr class="mx-auto w-50 custom-hr">
        <h2 class="mt-5 pt-1 text-center font-weight-bold">旅場所のおすすめポイントをシェアするサイト</h2>
        <div class="row mt-4 pt-2 pb-3">
            <div class="col-6 bg02"></div>
            <div class="col-6">
                <h4 class="pb-3 font-weight-bold">投稿３ステップ！<i class="fa-solid fa-shoe-prints"></i></h4>
                <ol>
                    <li class="mb-5"><span class="font-weight-bold-custom">「ログイン」or「新規ユーザ登録」</span>でユーザログイン！</li>
                    <li class="mb-5"><span class="font-weight-bold-custom">「上部のたびLog登録する」</span>をクリック！</li>
                    <li class="mb-5"><span class="font-weight-bold-custom">おすすめポイント「３つ！」その説明「３つ！」関連画像「３つ！」</span>で投稿完了！</li>
                </ol>
            </div>
        </div>

        <h1 class="text-center font-weight-bold mt-5" style="color: #1bacb6;">特徴</h1>
        <hr class="mx-auto w-50 custom-hr">
        <section class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="row ml-5">
                        <div class="col-2 mt-3">
                            <h1><i class="fa-solid fa-magnifying-glass" style="color: #1bacb6;"></i></h1>
                        </div>
                        <div class="col-8">
                            <h4 class="text-left font-weight-bold">AIが次の旅場所を提案</h4>
                            <p class="text-left">あなたの旅の嗜好を入力するとAIがおすすめ旅スポットを提案してくれます。</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="row ml-5">
                        <div class="col-2 mt-3">
                            <h1><i class="fa-solid fa-share-nodes" style="color: #1bacb6;"></i></h1>
                        </div>
                        <div class="col-8">
                            <h4 class="text-left font-weight-bold">旅スポットをキャッチ</h4>
                            <p class="text-left">他のユーザの旅場所のおすすめポイントがすぐに分かる！３つの画像と３つのおすすめポイントですぐに情報をキャッチ！</p>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="row ml-5">
                        <div class="col-2 mt-3">
                            <h1><i class="fa-solid fa-3" style="color: #1bacb6;"></i></h1>
                        </div>
                        <div class="col-8">
                            <h4 class="text-left font-weight-bold">投稿もラクラク！</h4>
                            <p class="text-left">おすすめポイント３つとそれに関連する画像３つ、その内容説明３つで簡単投稿！</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="row ml-5">
                        <div class="col-2 mt-3">
                            <h1><i class="fa-solid fa-share-nodes" style="color: #1bacb6;"></i></h1>
                        </div>
                        <div class="col-8">
                            <h4 class="text-left font-weight-bold">いいね！で簡単アクセス</h4>
                            <p class="text-left">いいね機能を使えば、いつでも簡単に気に入ったたびLogにアクセスできます</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </section>


    </div>
@endsection
