@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
    		<h2>購入履歴</h2>

    		<div class="mb-3">
				<form action="sales" method="GET">
				    <input type="date" name="from" placeholder="yyyy-mm-dd">
				        <span class="mx-3 text-grey">~</span>
				    <input type="date" name="until" placeholder="yyyy-mm-dd">
				    <button type="submit">検索</button>
				</form>
			</div>

			<div class="table-resposible">
	    		<table class="table text-nowrap">
	    			<tr>
	    				<th>製品</th>
	    				<th>個数</th>
	    				<th>購入金額</th>
	    				<th>購入日時</th>
	    				<th>区分</th>
	    				<th>合計</th>
	    			</tr>
	    			@foreach ($histories as $history)
	    			<tr>
	    				<td>{{ $history->product_purchasing_detail->product->product }}</td>
	    				<td>{{ $history->product_purchasing_detail->amount }}</td>
	    				<td class="incentive">{{ $history->product_purchasing_detail->total }}円</td>
	    				<td>{{ $history->receive->format('Y年m月d日') }}</td>
	    				@if ($history->division == "1")
	    				<td>入金済み</td>
	    				@elseif ($history->division == "2")
	    				<td>未入金</td>
	    				@elseif ($history->division == "3")
	    				<td>期限きれ</td>
	    				@endif
	    				<td></td>
	    			</tr>
	    			@endforeach
	    			<tr>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    				<td></td>
	    				<td id="sum_price"></td>
	    			</tr>
	    		</table>
    		</div>
    	</div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
	$(function(){

		function sum(){
		    // 表の金額を取得する(tdの奇数列を取得)
		    var pricelist = $("table td[class=incentive]").map(function(index, val){
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
		    $("#sum_price").text(total+"円");
		  }
		sum();
	})
</script>
@endsection