<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>たびLog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    </head>
    <body>
        @include('commons.header-2')
        
        <div class="container-fluid bg01" >
            <div class="row">
                <div class="col-8 offset-2">
                    <h1 class="mt-5 pb-5 mb-5"></h1>
                    
                    <h2 class="mt-4 pb-5 text-white">あなたにぴったりな旅場所は？</h2>
                    @include('gpt')
                </div>
            </div>
        </div>
        <div class="container pt-4">
            <h2 class="text-center pb-2">たび Logとは？</h2>
            <h5 style="border-top: solid thick #6C757D" class="w-30"></h5>


            <h1 class="mt-5 pt-1" id="1">あなたの旅をシェア</h1>
            <h5 style="border-top: solid thick #6C757D" class="w-50"></h5>
            <div class="row mt-4 pt-2">
                <div class="col-6"> 
                    <img src="{{ asset('storage/image/トップ画像例１.png')}}" alt= "投稿画像" width="550" height="300" class="image-fit">
                </div>
                <div class="col-6">
                    <h4 class="pb-3">誰でもすぐに旅のおすすめを投稿できる！</h4>
                    <ul>
                        <li class="mb-3">かんたん投稿。流れに沿ったらたびLog完成です</li>
                        <li class="mb-3">他のユーザのたびLogにいいね！ができます。いいね！したもののみも見れます。</li>
                        <li class="mb-3">他のユーザのたびLogにいいね！ができます。いいね！したもののみも見れます。</li>
                        <li class="mb-3">他のユーザのたびLogにいいね！ができます。いいね！したもののみも見れます。</li>
                    </ul>
                </div>
            </div>

        <h1 class="mt-5 text-right pt-3" id="2">たび Log投稿 3ステップ</h1>
        <h5 style="border-top: solid thick #6C757D; float: right;" class="w-50"></h5>
        <div class="row mt-4 pt-2">
            <div class="col-6">
                <h4 class="pb-3">誰でもすぐに旅のおすすめを投稿できる！</h4>
                <ul>
                    <li class="mb-3">かんたん投稿。流れに沿ったらたびLog完成です</li>
                    <li class="mb-3">他のユーザのたびLogにいいね！ができます。いいね！したもののみも見れます。</li>
                    <li class="mb-3">他のユーザのたびLogにいいね！ができます。いいね！したもののみも見れます。</li>
                    <li class="mb-3">他のユーザのたびLogにいいね！ができます。いいね！したもののみも見れます。</li>
                </ul>
            </div>
            <div class="col-6">
                <img src="{{ asset('storage/image/ZpY2O0NcYLi8hrtLwuzhE6bHtjTorzwLEnyNCs0M.jpg')}}" alt= "投稿画像" width="500" height="300" class="image-fit">
            </div>
        </div>


        </div>
            
        @include('commons.footer2')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="https://kit.fontawesome.com/a570e9e7cc.js" crossorigin="anonymous"></script>
    </body>
</html>