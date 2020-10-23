@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
		<h2>売上登録</h2>
		<form action="https://pt01.mul-pay.jp/link/tshop00046988/Multi/Entry" method="post" id="myform">
		 @csrf
		 <input type="text" name="quantity" id="myquantity">
		 <input type="hidden" name="ShopID" size="13" id="myshop" value="tshop00046988">
		 <input type="hidden" name="OrderID" size="27" id="myorder" value="{{ $ransu }}">
		 <input type="hidden" name="Amount" size="27" id="myamount" value="10">
		 <input type="hidden" name="DateTime" id="mydate">
		 <input type="hidden" name="ShopPassString" size="32" id="myinfo">
		 <input type="hidden" name="RetURL" value="http://crypter.xsrv.jp/gmo/public/aaa">
		 <input type="hidden" name="UseVirtualaccount" value="1">
		 <input type="hidden" name="VaTradeDays" value="7">
		 <input type="hidden" name="VaTradeClientMailAddress" value="stomo834@gmail.com">
		 <input type="hidden" name="ClientField1" value="device2-coat3">
		 <button type="button" id="myButton"></button>
		</form>
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
		    $(function(){
		     $('#myButton').click(function(){
		      var quantity = $('#myquantity').val();
		      var shop = $('#myshop').val();
		      var order = $('#myorder').val();
		      var amount = $('#myamount').val();
		      var now = new Date();
		      var password = "6ftzw5gc";
		      var date = getStringFromDate(now);
		      $('#mydate').val(date);
		      var info = $.md5(shop + "|" + order + "|" + amount + "||" + password + "|" +date);
		      $('#myinfo').val(info);
		      console.log(info);
		      $('#myform').submit();
		     });
		    });  
		  </script>
	</div>
</div>
@endsection