<div>
	<a href="{{ url('news') }}/create">新規作成</a>
</div>
<div>
	@foreach ($news as $new)
	    <p><a href="{{ url('news') }}/{{ $new->id }}" >{{ $new->title }}</a></p>
	@endforeach
</div>