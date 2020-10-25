<!DOCTYPE html>
<html lang="en">
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
                        <li class="pr-3"><a href="{{ url('admin/create') }}">代理店登録</a></li>
                        <li class="pr-3"><a href="{{ url('admin/file-import-export') }}">代理店インポート</a></li>
                        @elseif (Auth::guard('admin')->user()->type === "1")
                        <li class="pr-3">{{ Auth::guard('admin')->user()->name }} : (代理店)</li>
                        <li class="pr-3"><a href="{{ url('admin/create') }}">特約店登録</a></li>
                        <li class="pr-3"><a href="{{ url('admin/file-import-export') }}">特約店インポート</a></li>
                        @elseif (Auth::guard('admin')->user()->type === "2")
                        <li class="pr-3">{{ Auth::guard('admin')->user()->name }} : (特約店)</li>
                        <li class="pr-3"><a href="{{ url('admin/create') }}">加盟店登録</a></li>
                        <li class="pr-3"><a href="{{ url('admin/file-import-export') }}">加盟店インポート</a></li>
                        @elseif (Auth::guard('admin')->user()->type === "3")
                        <li class="pr-3">{{ Auth::guard('admin')->user()->name }} : (加盟店)</li>
                        <li class="pr-3"><a href="{{ url('admin/user/create') }}">ユーザー登録</a></li>
                        <li class="pr-3"><a href="{{ url('/admin/device') }}">デバイス</a></li>
                        <li class="pr-3"><a href="{{ url('admin/product/purchase_history') }}">製品購入履歴</a></li>
                        <li class="pr-3"><a href="{{ url('/admin/product/purchase') }}">仕入れ</a></li>
                    @endif
                    <li class="pr-3"><a href="{{ url('admin/') }}">店舗一覧</a></li>
                    <li class="pr-3"><a href="{{ url('administor/user/list') }}">ユーザー一覧</a></li>
                    @if (Auth::guard('admin')->user()->type !== "3")
                        <li class="pr-3"><a href="{{ url('admin/sales') }}">店舗売上</a></li>
                        <li class="pr-3"><a href="{{ url('admin/product/incentive') }}">製品報酬</a></li>
                    @endif
                    <li class="pr-3"><a href="{{ url('admin/incentive') }}">ネイル報酬</a></li>
                    <li class="pr-3"><a href="{{ url('/admin/logout') }}">Logout</a></li>
                @endif
            </ul>
          </div>
      </div>
    </nav>

    @yield('content')
    

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/jquery.md5.js"></script>
    @yield('javascript-footer')
</body>
</html>
