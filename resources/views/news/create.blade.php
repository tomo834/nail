<div class="container">
	<div class="new">
	    <form action="{{ url('news') }}" method="post">
	        @csrf {{-- CSRF保護 --}}
	        @method('POST') {{-- 疑似フォームメソッド --}}
	        <div class="form-group">
	            <label for="title">{{ __('Title') }}</label>
	            <input id="title" type="text" class="form-control" name="title" required autofocus>
	        </div>
	        <div class="form-group">
	            <label for="body">{{ __('Body') }}</label>
	            <textarea id="body" rows="20" cols="80" class="form-control" name="body" required></textarea>
	        </div>
	        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
	    </form>
	</div>
</div>