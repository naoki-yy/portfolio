<header class="mb-4" style="background-color: #6ebeff;">
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="d-flex align-items-end m-2">
            <div>
            <h1>
                <a class="navbar-brand text-white" href="/"><div class="display-4 text-white font-weight-bold">たび Log</div></a>
                <i class="fa-regular fa-paper-plane font-weight-bold" style="color: #ffffff;"></i>
            </h1>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav  font-weight-bold">
                @if (Auth::check())
                @php
                    $user = Auth::User()
                @endphp
                    <li class="nav-item"><a href="{{ route('top') }}" class="nav-link">トップに戻る</a></li>
                    <li class="nav-item"><a href="{{ route('post.create') }}" class = "nav-link">たび Log登録する</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">ログアウト</a></li>
                    <li class="nav-item"><a href="{{ route('users.mypage')}}" class="nav-link ml-3"><h5><i class="fa-solid fa-user mr-2" style="color: #ffffff;"></i>{{$user->name}}</h5></a></li>
                @else
                    <li class="nav-item"><a href="{{ route('top') }}" class="nav-link">トップに戻る</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">ログイン</a></li>
                    <li class="nav-item"><a href="{{ route('signup') }}" class="nav-link">新規ユーザ登録</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>
