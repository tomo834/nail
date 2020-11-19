@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
    		<h2>ネイル売上</h2>

    		<div class="mb-3">
				<form action="incentive" method="GET">
				    <input type="date" name="from" placeholder="yyyy-mm-dd">
				        <span class="mx-3 text-grey">~</span>
				    <input type="date" name="until" placeholder="yyyy-mm-dd">
				    <button type="submit">検索</button>
				</form>
			</div>

			<div class="table-resposible">
	    		<table class="table text-nowrap">
	    			<tr>
	    				<th>ネイル</th>
	    				<th>ユーザー</th>
	    				<th>個数</th>
	    				<th>報酬</th>
	    				<th>受取日時</th>
	    				<th>合計</th>
	    			</tr>
	    			@foreach ($incentives as $incentive)
	    			<tr>
	    				<td>{{ $incentive->sale->sales_detail->nail->en_name }}</td>
	    				<td>{{ $incentive->sale->user->name }}</td>
	    				<td>{{ $incentive->sale->sales_detail->amount }}</td>
	    				<td class="incentive">{{ $incentive->incentive }}円</td>
	    				<td>{{ $incentive->receive->format('Y年m月d日') }}</td>
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

@endsection

@section("javascript-footer")
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