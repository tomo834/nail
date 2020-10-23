@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
		    <form action="{{ url('admin/device') }}" method="post">
		        @csrf {{-- CSRF保護 --}}
		        @method('POST') {{-- 疑似フォームメソッド --}}
		        <div class="form-group">
		            <label for="device_code">{{ __('Device_code') }}</label>
		            <input id="device_code" type="text" class="form-control" name="device_code" required autofocus>
		        </div>
		        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
		    </form>
		</div>
	</div>
</div>
@endsection