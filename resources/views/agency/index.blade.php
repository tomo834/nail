<h2>代理店ページ</h2>
<a href="{{ url('agency/create') }}">特約店登録</a>
<a href="">
</a>
<p>{{ $admin }}</p>
<p>{{ Auth::guard('admin')->user()->id }}</p>