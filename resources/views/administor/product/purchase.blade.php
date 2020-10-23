@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
		<h2>仕入れ</h2>
<p>{{ $order_id }}</p>
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
				 <input type="hidden" name="RetURL" value="http://crypter.xsrv.jp/gmo/public/aaa">
				 <input type="hidden" name="UseVirtualaccount" value="1">
				 <input type="hidden" name="VaTradeDays" value="7">
				 <input type="hidden" name="VaTradeClientMailAddress" value="stomo834@gmail.com">
				 <input type="hidden" name="ClientField1" id="client_field1" value="device2-coat3">
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
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/jquery.md5.js') }}"></script>
		<script language="javascript" type="text/javascript">
			function getStringFromDate(date) {
			 
			  var year_str = date.getFullYear();
			  //月だけ+1すること
			  var month_str = 1 + date.getMonth();
			  var day_str = date.getDate();
			  var hour_str = date.getHours();
			  var minute_str = date.getMinutes();
			  var second_str = date.getSeconds();
			  
			  month_str = ('0' + month_str).slice(-2);
			  day_str = ('0' + day_str).slice(-2);
			  hour_str = ('0' + hour_str).slice(-2);
			  minute_str = ('0' + minute_str).slice(-2);
			  second_str = ('0' + second_str).slice(-2);
			  
			  format_str = 'yyyyMMddhhmmss';
			  format_str = format_str.replace(/yyyy/g, year_str);
			  format_str = format_str.replace(/MM/g, month_str);
			  format_str = format_str.replace(/dd/g, day_str);
			  format_str = format_str.replace(/hh/g, hour_str);
			  format_str = format_str.replace(/mm/g, minute_str);
			  format_str = format_str.replace(/ss/g, second_str);
			  
			  return format_str;
			};
		 	function sum(){
		    // 表の金額を取得する(tdの奇数列を取得)
			    var pricelist = $("table span[class=total]").map(function(index, val){
			      var price = parseInt($(val).text());
			      if(price >= 0) {
			        return price;
			      } else {
			        return null;
			      }
			    });
			    // 価格の合計を求める
			    var total = 0;
			    pricelist.each(function(index, val){
			      total = total + val;
			    });
			    $("#sum_price").text(total);
			    $("#confirm_total").text(total);
		  	}
		    $(function(){

		    

			 $('#gadget_amount').on('input',function(){
			 	var gad_amount = $('#gadget_amount').val();
			 	if ($.isNumeric(gad_amount)){

			 	}else{
			 		$('#gadget_amount').val(0);
			 		window.alert("数値を入力してください");
			 	}
			 	var gad_price = $('#gadget_price').text();
			 	var gad_total = (gad_amount * gad_price);
			 	$('#gadget_total').text(gad_total);
			 	$('#confirm_gad_amount').text(gad_amount);
			 	$('#confirm_gad_total').text(gad_total);
			 	sum();
			 });

			 $('#gel_amount').on('input',function(){
			 	var gel_amount = $('#gel_amount').val();
			 	if ($.isNumeric(gel_amount)){

			 	}else{
			 		$('#gel_amount').val(0);
			 		window.alert("数値を入力してください");
			 	}
			 	var gel_price = $('#gel_price').text();
			 	var gel_total = (gel_amount * gel_price);
			 	$('#gel_total').text(gel_total);
			 	$('#confirm_gel_amount').text(gel_amount);
			 	$('#confirm_gel_total').text(gel_total);

			 	sum();
			 });

		     $('#myButton').click(function(){
		      $('#client_field1').val("device" + $('#gadget_amount').val() + "-coat" + $('#gel_amount').val());
		      console.log($('#client_field1').val())
		      var shop = $('#myshop').val();
		      var order = $('#myorder').val();
		      var gadget = $('#gadget_amount').val();
		      var gel = $('#gel_amount').val();
		      $("#myamount").val($("#sum_price").text());
		      var amount = $('#myamount').val();
		      var now = new Date();
		      var password = "6ftzw5gc";
		      var date = getStringFromDate(now);
		      $('#mydate').val(date);
		      var info = $.md5(shop + "|" + order + "|" + amount + "||" + password + "|" +date);
		      $('#myinfo').val(info);
		      console.log(shop + "|" + order + "|" + amount + "||" + password + "|" +date);
		      // $('#myform').submit();
		     });
		    });  
		  </script>
	</div>
</div>
@endsection