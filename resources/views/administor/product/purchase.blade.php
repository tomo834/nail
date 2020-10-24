@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
		<h2>仕入れ</h2>
		<table class="table">
			<tr>
				<th class="table__col">製品</th>
				<th class="table__col">単価</th>
				<th class="table__col">個数</th>
				<th class="table__col">合計</th>
			</tr>
			<tr>
				<th class="table__col">ガジェット</th>
				<th class="table__col"><span id="gadget_price">{{ $gadget_price }}</span>円</th>
				<td class="table__col"><input type="number" name="GadgetAmount" id="gadget_amount" value="0" min="0"></td>
				<th class="table__col"><span class="total" id="gadget_total">0</span>円</th>
			</tr>
			<tr>
				<th class="table__col">コート液</th>
				<th class="table__col"><span id="gel_price">{{ $gel_price }}</span>円</th>
				<td class="table__col"><input type="number" name="GelAmount" id="gel_amount" value="0" min="0"></td>
				<th class="table__col"><span class="total" id="gel_total">0</span>円</th>
			</tr>
			<tr>
				<td class="table__col"></td>
				<td class="table__col"></td>
				<td class="table__col"></td>
				<th class="table__col"><span id="sum_price">0</span>円</th>
			</tr>
		</table>

		<button class="btn" id="modal" data-toggle="modal" data-target="#confirmPurchase">購入確認</button>

		<div class="modal fade" id="confirmPurchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">以下の内容で購入しますか？</h5>
		      </div>
		      <div class="modal-body">
		        <p>ガジェット : <span id="confirm_gad_amount"></span>個 : <span id="confirm_gad_total"></span>円</p>
		        <p>コート液 : <span id="confirm_gel_amount"></span>個 : <span id="confirm_gel_total"></span>円</p>
		        <p>合計 : <span id="confirm_total"></span>円</p>
		      </div>
		      <div class="modal-footer">
		        <form action="https://pt01.mul-pay.jp/link/tshop00046988/Multi/Entry" method="post" id="myform">
				 @csrf
				 <input type="hidden" name="ShopID" size="13" id="myshop" value="tshop00046988">
				 <input type="hidden" name="OrderID" size="27" id="myorder" value="{{ $order_id }}">
				 <input type="hidden" name="Amount" size="27" id="myamount" value="10">
				 <input type="hidden" name="DateTime" id="mydate">
				 <input type="hidden" name="ShopPassString" size="32" id="myinfo">
				 <input type="hidden" name="RetURL" value="http://133.125.45.49/admin">
				 <input type="hidden" name="UseVirtualaccount" value="1">
				 <input type="hidden" name="VaTradeDays" value="7">
				 <input type="hidden" name="VaTradeClientMailAddress" value="stomo834@gmail.com">
				 <input type="hidden" name="ClientField1" id="client_field1" value="device2-coat3">
				 <input type="hidden" name="ClientField2" id="client_field2" value="{{ $order_id }}">
				 <button type="button" class="btn" data-dismiss="modal">キャンセル</button>
				 <button type="button" class="btn" id="myButton">購入</button>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
			
		
		
		<style type="text/css">
			.table__col{
				width: 25%;
			}
		</style>
		
	</div>
</div>
@endsection
<script src="/js/purchase.js"></script>
@section("javascript-footer")

@endsection