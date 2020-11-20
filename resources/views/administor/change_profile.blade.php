@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>登録情報変更</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/change-profile') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('account_id') ? ' has-error' : '' }}">
                            <label for="account_id" class="col-sm-2 col-form-label text-danger">アカウントID</label>

                            <div class="col-sm-10">
                                <input id="account_id" type="text" class="form-control" name="account_id" value="{{ $admin->account_id }}" autofocus=""> 

                                @if ($errors->has('account_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 col-form-label">店舗名</label>

                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $admin->name }}" autofocus=""> 

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-2 col-form-label">メールアドレス</label>

                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $admin->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notification_address') ? ' has-error' : '' }}">
                            <label for="notification_address" class="col-sm-2 col-form-label">店舗用メールアドレス</label>

                            <div class="col-sm-10">
                                <input id="notification_address" type="email" class="form-control" name="notification_address" value="{{ $admin->notification_address }}" placeholder="空欄の場合、メールアドレスに通知されます">

                                @if ($errors->has('notification_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notification_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label for="company_name" class="col-sm-2 col-form-label">会社名</label>

                            <div class="col-sm-10">
                                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ $admin->company_name }}">

                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('representative') ? ' has-error' : '' }}">
                            <label for="representative" class="col-sm-2 col-form-label">代表者</label>

                            <div class="col-sm-10">
                                <input id="representative" type="text" class="form-control" name="representative" value="{{ $admin->representative }}">

                                @if ($errors->has('representative'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('representative') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
                            <label for="zip_code" class="col-sm-2 col-form-label">郵便番号</label>

                            <div class="col-sm-10">
                                <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ $admin->zip_code }}">

                                @if ($errors->has('zip_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-sm-2 col-form-label">住所</label>

                            <div class="col-sm-10">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $admin->address }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-sm-2 col-form-label">電話番号</label>

                            <div class="col-sm-10">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $admin->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                            <label for="cellphone" class="col-sm-2 col-form-label">携帯番号</label>

                            <div class="col-sm-10">
                                <input id="cellphone" type="text" class="form-control" name="cellphone" value="{{ $admin->cellphone }}">

                                @if ($errors->has('cellphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('account_holder') ? ' has-error' : '' }}">
                            <label for="account_holder" class="col-sm-2 col-form-label">口座名義</label>

                            <div class="col-sm-10">
                                <input id="account_holder" type="text" class="form-control" name="account_holder" value="{{ $admin->account_holder }}">

                                @if ($errors->has('account_holder'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_holder') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                            <label for="bank_name" class="col-sm-2 col-form-label">銀行名</label>

                            <div class="col-sm-10">
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ $admin->bank_name }}">

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('branch_name') ? ' has-error' : '' }}">
                            <label for="branch_name" class="col-sm-2 col-form-label">支店名</label>

                            <div class="col-sm-10">
                                <input id="branch_name" type="text" class="form-control" name="branch_name" value="{{ $admin->branch_name }}">

                                @if ($errors->has('branch_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_code') ? ' has-error' : '' }}">
                            <label for="bank_code" class="col-sm-2 col-form-label">金融コード</label>

                            <div class="col-sm-10">
                                <input id="bank_code" type="text" class="form-control" name="bank_code" value="{{ $admin->bank_code }}">

                                @if ($errors->has('bank_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('branch_code') ? ' has-error' : '' }}">
                            <label for="branch_code" class="col-sm-2 col-form-label">支店コード</label>

                            <div class="col-sm-10">
                                <input id="branch_code" type="text" class="form-control" name="branch_code" value="{{ $admin->branch_code }}">

                                @if ($errors->has('branch_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('account_type') ? ' has-error' : '' }}">
                            <label for="account_type" class="col-sm-2 col-form-label">口座種類</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="account_type" name="account_type" value="{{ $admin->account_type }}">
                                  <option>普通</option>
                                  <option>当座</option>
                                </select>

                                @if ($errors->has('account_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                            <label for="account_number" class="col-sm-2 col-form-label">口座番号</label>

                            <div class="col-sm-10">
                                <input id="account_number" type="text" class="form-control" name="account_number" value="{{ $admin->account_number }}">

                                @if ($errors->has('account_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_pic') ? ' has-error' : '' }}">
                            <label for="shop_pic" class="col-sm-2 col-form-label">店舗代表者</label>

                            <div class="col-sm-10">
                                <input id="shop_pic" type="text" class="form-control" name="shop_pic" value="{{ $admin->shop_pic }}">

                                @if ($errors->has('shop_pic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_pic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_address') ? ' has-error' : '' }}">
                            <label for="shop_address" class="col-sm-2 col-form-label">店舗住所</label>

                            <div class="col-sm-10">
                                <input id="shop_address" type="text" class="form-control" name="shop_address" value="{{ $admin->shop_address }}">

                                @if ($errors->has('shop_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_phone') ? ' has-error' : '' }}">
                            <label for="shop_phone" class="col-sm-2 col-form-label">店舗電話番号</label>

                            <div class="col-sm-10">
                                <input id="shop_phone" type="text" class="form-control" name="shop_phone" value="{{ $admin->shop_phone }}">

                                @if ($errors->has('shop_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('homepage') ? ' has-error' : '' }}">
                            <label for="homepage" class="col-sm-2 col-form-label">ホームページ</label>

                            <div class="col-sm-10">
                                <input id="homepage" type="text" class="form-control" name="homepage" value="{{ $admin->homepage }}">

                                @if ($errors->has('homepage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('homepage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shop_open') ? ' has-error' : '' }}">
                            <label for="shop_open" class="col-sm-2 col-form-label">営業時間</label>

                            <div class="col-sm-10">
                                <input id="shop_open" type="text" class="form-control" name="shop_open" value="{{ $admin->shop_open }}">

                                @if ($errors->has('shop_open'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_open') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('request_date') ? ' has-error' : '' }}">
                            <label for="request_date" class="col-sm-2 col-form-label">申込日</label>

                            <div class="col-sm-10">
                                <input id="request_date" type="date" class="form-control" name="request_date" value="{{ $admin->request_date }}" placeholder ="2020-10-01">

                                @if ($errors->has('request_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('request_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="historical_matters" name="historical_matters" @if ($admin->historical_matters == 1) checked="" @endif>
                          <label class="form-check-label" for="historical_matters">
                            履歴事項証明書
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="passbook" name="passbook" @if ($admin->passbook == 1) checked="" @endif>
                          <label class="form-check-label" for="passbook">
                            振り込み通帳画像
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="other" name="other" @if ($admin->other == 1) checked="" @endif>
                          <label class="form-check-label" for="other">
                            開発業届出、確定申告、営業許可書
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="has_nailist" name="has_nailist" @if ($admin->has_nailist == 1) checked="" @endif>
                          <label class="form-check-label" for="has_nailist">
                            ネイリストの有無
                          </label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
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
