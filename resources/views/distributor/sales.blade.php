@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
    		<h2>売上</h2>
    		@foreach ($incentives as $incentive)
    			@foreach ($incentive->incentive_info as $i)
    				<p>{{ $i->incentive }}</p>
    				<p>{{ $i->receive }}</p>
    			@endforeach
    		@endforeach


    	</div>
    </div>
</div>
@endsection