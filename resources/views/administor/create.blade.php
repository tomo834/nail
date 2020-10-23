@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ url('admin') }}" method="post">
                @csrf {{-- CSRF保護 --}}
                @method('POST') {{-- 疑似フォームメソッド --}}
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control" name="email" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection