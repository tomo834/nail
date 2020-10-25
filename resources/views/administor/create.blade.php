@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">店舗名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label for="company_name" class="col-md-4 control-label">会社名</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" autofocus>

                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('representative') ? ' has-error' : '' }}">
                            <label for="representative" class="col-md-4 control-label">代表者</label>

                            <div class="col-md-6">
                                <input id="representative" type="text" class="form-control" name="representative" value="{{ old('representative') }}" autofocus>

                                @if ($errors->has('representative'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('representative') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_pic') ? ' has-error' : '' }}">
                            <label for="shop_pic" class="col-md-4 control-label">店舗代表者</label>

                            <div class="col-md-6">
                                <input id="shop_pic" type="text" class="form-control" name="shop_pic" value="{{ old('shop_pic') }}" autofocus>

                                @if ($errors->has('shop_pic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_pic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
                            <label for="zip_code" class="col-md-4 control-label">郵便番号</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}" autofocus>

                                @if ($errors->has('zip_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                            <label for="fax" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="fax" type="text" class="form-control" name="fax" value="{{ old('fax') }}" autofocus>

                                @if ($errors->has('fax'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                            <label for="cellphone" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="cellphone" type="text" class="form-control" name="cellphone" value="{{ old('cellphone') }}" autofocus>

                                @if ($errors->has('cellphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('account_holder') ? ' has-error' : '' }}">
                            <label for="account_holder" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="account_holder" type="text" class="form-control" name="account_holder" value="{{ old('account_holder') }}" autofocus>

                                @if ($errors->has('account_holder'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_holder') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                            <label for="bank_name" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}" autofocus>

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('branch_name') ? ' has-error' : '' }}">
                            <label for="branch_name" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="branch_name" type="text" class="form-control" name="branch_name" value="{{ old('branch_name') }}" autofocus>

                                @if ($errors->has('branch_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_code') ? ' has-error' : '' }}">
                            <label for="bank_code" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="bank_code" type="text" class="form-control" name="bank_code" value="{{ old('bank_code') }}" autofocus>

                                @if ($errors->has('bank_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('branch_code') ? ' has-error' : '' }}">
                            <label for="branch_code" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="branch_code" type="text" class="form-control" name="branch_code" value="{{ old('branch_code') }}" autofocus>

                                @if ($errors->has('branch_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('account_type') ? ' has-error' : '' }}">
                            <label for="account_type" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="account_type" type="text" class="form-control" name="account_type" value="{{ old('account_type') }}" autofocus>

                                @if ($errors->has('account_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                            <label for="account_number" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control" name="account_number" value="{{ old('account_number') }}" autofocus>

                                @if ($errors->has('account_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('incentive') ? ' has-error' : '' }}">
                            <label for="incentive" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="incentive" type="number" class="form-control" name="incentive" value="{{ old('incentive') }}" autofocus>

                                @if ($errors->has('incentive'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('incentive') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('need_file') ? ' has-error' : '' }}">
                            <label for="need_file" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="need_file" type="text" class="form-control" name="need_file" value="{{ old('need_file') }}" autofocus>

                                @if ($errors->has('need_file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('need_file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('historical_matters') ? ' has-error' : '' }}">
                            <label for="historical_matters" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="historical_matters" type="text" class="form-control" name="historical_matters" value="{{ old('historical_matters') }}" autofocus>

                                @if ($errors->has('historical_matters'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('historical_matters') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('seal_certificate') ? ' has-error' : '' }}">
                            <label for="seal_certificate" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="seal_certificate" type="text" class="form-control" name="seal_certificate" value="{{ old('seal_certificate') }}" autofocus>

                                @if ($errors->has('seal_certificate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seal_certificate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('passbook') ? ' has-error' : '' }}">
                            <label for="passbook" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="passbook" type="text" class="form-control" name="passbook" value="{{ old('passbook') }}" autofocus>

                                @if ($errors->has('passbook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passbook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('residents_card') ? ' has-error' : '' }}">
                            <label for="residents_card" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="residents_card" type="text" class="form-control" name="residents_card" value="{{ old('residents_card') }}" autofocus>

                                @if ($errors->has('residents_card'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('residents_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mailing_date') ? ' has-error' : '' }}">
                            <label for="mailing_date" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="mailing_date" type="text" class="form-control" name="mailing_date" value="{{ old('mailing_date') }}" autofocus>

                                @if ($errors->has('mailing_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mailing_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('homepage') ? ' has-error' : '' }}">
                            <label for="homepage" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="homepage" type="text" class="form-control" name="homepage" value="{{ old('homepage') }}" autofocus>

                                @if ($errors->has('homepage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('homepage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('shop_zip_code') ? ' has-error' : '' }}">
                            <label for="shop_zip_code" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="shop_zip_code" type="text" class="form-control" name="shop_zip_code" value="{{ old('shop_zip_code') }}" autofocus>

                                @if ($errors->has('shop_zip_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_zip_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('shop_address') ? ' has-error' : '' }}">
                            <label for="shop_address" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="shop_address" type="text" class="form-control" name="shop_address" value="{{ old('shop_address') }}" autofocus>

                                @if ($errors->has('shop_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('request') ? ' has-error' : '' }}">
                            <label for="request" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="request" type="text" class="form-control" name="request" value="{{ old('request') }}" autofocus>

                                @if ($errors->has('request'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('request') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_phone') ? ' has-error' : '' }}">
                            <label for="shop_phone" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="shop_phone" type="text" class="form-control" name="shop_phone" value="{{ old('shop_phone') }}" autofocus>

                                @if ($errors->has('shop_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_open') ? ' has-error' : '' }}">
                            <label for="shop_open" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="shop_open" type="text" class="form-control" name="shop_open" value="{{ old('shop_open') }}" autofocus>

                                @if ($errors->has('shop_open'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_open') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('has_nailist') ? ' has-error' : '' }}">
                            <label for="has_nailist" class="col-md-4 control-label">住所</label>

                            <div class="col-md-6">
                                <input id="has_nailist" type="text" class="form-control" name="has_nailist" value="{{ old('has_nailist') }}" autofocus>

                                @if ($errors->has('has_nailist'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('has_nailist') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
