@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">

			<h3>店舗売上</h3>

    		<div class="mb-3">
				<form action="sales" method="GET">
				    <input type="date" name="from" placeholder="yyyy-mm-dd">
				        <span class="mx-3 text-grey">~</span>
				    <input type="date" name="until" placeholder="yyyy-mm-dd">
				    <button type="submit">検索</button>
				</form>
			</div>


			<div class="table-responsible">
				<table class="table table-hover text-nowrap">
					<tr>
						<th>店舗ID</th>
						<th>店舗タイプ</th>
						<th>店舗名</th>
						<th>ネイル報酬</th>
						<th>製品報酬</th>
						<th>総報酬</th>
					</tr>

					@foreach ($nodes as $node)
					<tr>
						<td>{{ $node->admin_info->account_id }}</td>
						<td>
							@if ($node->admin_info->type === "1")
							    代理店
							@elseif ($node->admin_info->type === "2")
							    特約店
							@elseif ($node->admin_info->type === "3")
							    加盟店			
							@elseif ($node->admin_info->type === "99")
								運営
							@endif
						</td>
						<td>{{ $node->admin_info->name }}</td>
						<td class="incentive">{{ $node->admin_info->incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive") }}円</td>
						<td class="p_incentive">{{ $node->admin_info->product_incentive_info->sum("incentive") }}円</td>
						<td class="total">{{ intval($node->admin_info->incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive"))  +  intval($node->admin_info->product_incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive")) }}円</td>
					</tr>

						@foreach ($node->children as $agency)
						<tr>
							<td>{{ $agency->admin_info->account_id }}</td>
							<td>
								@if ($agency->admin_info->type === "1")
								    代理店
								@elseif ($agency->admin_info->type === "2")
								    特約店
								@elseif ($agency->admin_info->type === "3")
								    加盟店			
								@elseif ($agency->admin_info->type === "99")
									運営
								@endif
							</td>
							<td>{{ $agency->admin_info->name }}</td>
							<td class="incentive">{{ $agency->admin_info->incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive") }}円</td>
							<td class="p_incentive">{{ $agency->admin_info->product_incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive") }}円</td>
							<td class="total">{{ intval($agency->admin_info->incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive")) + intval($agency->admin_info->product_incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive")) }}円</td>
							</tr>
							@foreach ($agency->children as $distributor)
							<tr>
								<td>{{ $distributor->admin_info->account_id }}</td>
								<td>
									@if ($distributor->admin_info->type === "1")
									    代理店
									@elseif ($distributor->admin_info->type === "2")
									    特約店
									@elseif ($distributor->admin_info->type === "3")
									    加盟店			
									@elseif ($distributor->admin_info->type === "99")
										運営
									@endif
								</td>
								<td>{{ $distributor->admin_info->name }}</td>
								<td class="incentive">{{ $distributor->admin_info->incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive") }}円</td>
								<td class="p_incentive">{{ $distributor->admin_info->product_incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive") }}円</td>
								<td class="total">{{ intval($distributor->admin_info->incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive"))  + intval($distributor->admin_info->product_incentive_info->sum("incentive")) }}円</td>
							</tr>
								@foreach ($distributor->children as $member)
								<tr>
									<td>{{ $member->admin_info->account_id }}</td>
									<td>
										@if ($member->admin_info->type === "1")
										    代理店
										@elseif ($member->admin_info->type === "2")
										    特約店
										@elseif ($member->admin_info->type === "3")
										    加盟店			
										@elseif ($member->admin_info->type === "99")
											運営
										@endif
									</td>
									<td>{{ $member->admin_info->name }}</td>
									<td class="incentive">{{ $member->admin_info->incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive") }}円</td>
									<td class="p_incentive">{{ $member->admin_info->product_incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive") }}円</td>
									<td class="total">{{ intval($member->admin_info->incentive_info->whereBetween("receive", [ $from , $until])->sum("incentive")) + intval($member->admin_info->product_incentive_info->sum("incentive"))}}円</td>
								</tr>
								@endforeach
							@endforeach
						@endforeach
					@endforeach
				</table>
			</div>
    	</div>
	</div>
</div>
<style type="text/css">
	.admin__action p{
		margin-right: 20px;
	}
	.admin__tree{
		margin: 20px;
	}
	.admin__tree h5:hover{
		cursor: pointer;
	}
	.admin__tree__agency{
		display: none;
		padding-left: 20px; 
		margin:10px;
	}
	.admin__tree__distributor{
		display: none;
		padding-left: 20px; 
		margin:10px;
	}
	.admin__tree__member{
		display: none;
		padding-left: 20px; 
		margin:10px;
	}
	.table-responsible{
		overflow-x: scroll;
	}
</style>

@endsection

@section("javascript-footer")
<script type="text/javascript">
	$(function(){
		$('.admin__tree__btn').click(function(){
			$(this).siblings().slideToggle();
		});
		$('.agency__tree__btn').click(function(){
			$(this).siblings().slideToggle();
		});
		$('.distributor__tree__btn').click(function(){
			$(this).siblings().slideToggle();
		});
	});
</script>


@endsection
