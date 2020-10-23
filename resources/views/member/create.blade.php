<div class="container">
    <form action="{{ url('news') }}" method="post">
        @csrf {{-- CSRF保護 --}}
        @method('POST') {{-- 疑似フォームメソッド --}}
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control" name="title" required autofocus>
        </div>
        <div class="form-group">
            <label for="body">{{ __('Body') }}</label>
            <input id="body" type="textarea" class="form-control" name="body" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>