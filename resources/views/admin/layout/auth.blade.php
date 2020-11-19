<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nailtron') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <h2><a class="navbar-brand" href="{{ url('/admin') }}">Nailtron</a></h2>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if (Auth::guard('admin')->guest())
                    <li class="pr-3"><a href="{{ url('/admin/login') }}">Login</a></li>
                @else
                    @if (Auth::guard('admin')->user()->type === "99")
                        <li class="pr-3">{{ Auth::guard('admin')->user()->name }} : (運営)</li>
                        @elseif (Auth::guard('admin')->user()->type === "1")
                        <li class="pr-3">{{ Auth::guard('admin')->user()->name }} : (代理店)</li>
                        @elseif (Auth::guard('admin')->user()->type === "2")
                        <li class="pr-3">{{ Auth::guard('admin')->user()->name }} : (特約店)</li>
                        @elseif (Auth::guard('admin')->user()->type === "3")
                        <li class="pr-3">{{ Auth::guard('admin')->user()->name }} : (加盟店)</li>
                    @endif

                    @if (Auth::guard('admin')->user()->type !== "3")
                    <li class="pr-3">
                        <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            店舗登録
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (Auth::guard('admin')->user()->type === "99")
                                <a class="dropdown-item" href="{{ url('admin/create') }}">代理店登録</a>
                                <a class="dropdown-item" href="{{ url('admin/file-import-export') }}">代理店インポート</a>
                            @elseif (Auth::guard('admin')->user()->type === "1")
                                <a class="dropdown-item" href="{{ url('admin/create') }}">特約店登録</a>
                                <a class="dropdown-item" href="{{ url('admin/file-import-export') }}">特約店インポート</a>
                            @elseif (Auth::guard('admin')->user()->type === "2")
                                <a class="dropdown-item" href="{{ url('admin/create') }}">加盟店登録</a>
                                <a class="dropdown-item" href="{{ url('admin/file-import-export') }}">加盟店インポート</a>
                            @endif
                          </div>
                        </div>
                    </li>
                    @endif

                    <li class="pr-3">
                        <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            登録情報変更
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('admin/password/edit') }}">パスワード変更</a>
                            <a class="dropdown-item" href="{{ url('admin/change-profile/edit') }}">店舗情報変更</a>
                          </div>
                        </div>
                    </li>

                    <li class="pr-3">
                        <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            店舗情報
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('admin/') }}">店舗一覧</a>
                            <a class="dropdown-item" href="{{ url('admin/user/list') }}">ユーザー一覧</a>
                          </div>
                        </div>
                    </li>

                    


                    <li class="pr-3">
                        <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" id="check_sales" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->type !== "3")
                                売上確認
                            @else
                                加盟店メニュー
                            @endif  
                          </button>
                          <div class="dropdown-menu" aria-labelledby="check_sales">
                            @if (Auth::guard('admin')->user()->type !== "3")
                                <a class="dropdown-item" href="{{ url('admin/sales') }}">店舗売上</a>
                                <a class="dropdown-item" href="{{ url('admin/product/incentive') }}">製品報酬</a>
                            @else
                                <a class="dropdown-item" href="{{ url('admin/user/create') }}">ユーザー登録</a>
                                <a class="dropdown-item" href="{{ url('/admin/device') }}">デバイス</a>
                                <a class="dropdown-item" href="{{ url('admin/product/purchase/history') }}">製品購入履歴</a>
                                <a class="dropdown-item" href="{{ url('/admin/product/purchase') }}">仕入れ</a>
                            @endif

                            <a class="dropdown-item" href="{{ url('admin/incentive') }}">ネイル報酬</a>
                          </div>
                        </div>
                    </li>
                    <li class="pr-3"><a href="{{ url('/admin/logout') }}">Logout</a></li>

                    
                @endif
            </ul>
          </div>
      </div>
    </nav>

    @yield('content')
    

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('javascript-footer')
</body>
</html>
