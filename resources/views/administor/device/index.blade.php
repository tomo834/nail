@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
    		<h2>デバイス一覧</h2>
    		<p><a href="device/create">デバイス登録</a></p>
    		<table class="table">
    			<tr>
    				<th>デバイスコード</th>
    				<th>登録日</th>
    			</tr>
			    @foreach ($devices as $device)
			    <tr>
			    	<td>{{ $device->device_code }}</td>
			    	<td>{{ $device->created_at->format('yy/m/d') }}</td>
			    </tr>
			    @endforeach
    		</table>
		</div>
	</div>
</div>
@endsection
