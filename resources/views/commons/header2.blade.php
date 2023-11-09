<header style="background-color: #f2f7fb;">
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="d-flex align-items-end m-2">
            <div>
            <h1>
                <a class="navbar-brand text-white" href="/"><div class="display-4 text-dark">たび Log</div></a>
                <i class="fa-regular fa-paper-plane" style="color: #343a3f;"></i>
            </h1>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav text-primary">
                @if (Auth::check())
                @php
                    $user = Auth::User()
                @endphp
                    <li class="nav-item1"><a href="{{ route('/') }}" class="nav-link ">ホーム</a></li>
                    <li class="nav-item1"><a href="{{ route('logout') }}" class="nav-link">ログアウト</a></li>
                    <li class="nav-item1"><a href="{{ route('users.mypage')}}" class="nav-link ml-4"><h5>{{$user->name}}</h5></a></li>
                @else
                    <li class="nav-item1"><a href="{{ route('/') }}" class="nav-link">ホーム</a></li>
                    <li class="nav-item1"><a href="{{ route('login') }}" class="nav-link">ログイン</a></li>
                    <li class="nav-item1"><a href="{{ route('signup') }}" class="nav-link">新規ユーザ登録</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>
