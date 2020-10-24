@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
    		<div class="d-flex admin__action">
    			
    		</div>

			<h3>店舗一覧</h3>

			@foreach ($nodes as $node)
				<div class="admin__tree">
					<h5 class="admin__tree__btn">・{{ $node->admin_info->name }}</h5>
					@foreach ($node->children as $agency)
						<div class="admin__tree__agency">
							<h5 class="agency__tree__btn">・{{ $agency->admin_info->name }}</h5>
							@foreach ($agency->children as $distributor)
								<div class="admin__tree__distributor">
									<h5 class="distributor__tree__btn">・{{ $distributor->admin_info->name }}</h5>
									@foreach ($distributor->children as $member)
										<div class="admin__tree__member">
											<h5>・{{ $member->admin_info->name }}</h5>
										</div>
									@endforeach
								</div>
							@endforeach
						</div>
					@endforeach
				</div>
			@endforeach

			<div class="table-responsible">
				<table class="table table-hover text-nowrap">
					<tr>
						<th>店舗ID</th>
						<th>店舗タイプ</th>
						<th>メールアドレス</th>
						<th>会社名</th>
						<th>代表者</th>
						<th>申込日</th>
						<th>郵便番号</th>
						<th>住所</th>
						<th>携帯</th>
						<th>電話番号</th>
						<th>FAX</th>
						<th>店舗名</th>
						<th>責任者</th>
						<th>店舗郵便番号</th>
						<th>店舗住所</th>
						<th>店舗電話番号</th>
						<th>営業時間</th>
						<th>ネイリストの有無</th>
						<th>ホームページ</th>
						<th>口座名義</th>
						<th>銀行名</th>
						<th>支店名</th>
						<th>金融コード</th>
						<th>支店コード</th>
						<th>口座タイプ</th>
						<th>口座番号</th>
						<th>インセンティブ</th>
						<th>必要書類</th>
						<th>履歴事項証明</th>
						<th>印鑑証明</th>
						<th>振り込み通帳画像</th>
						<th>住民票</th>
						<th>開発業、確定申告書、営業許可書</th>
						<th>登録通知</th>
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
						<td>{{ $node->admin_info->email}}</td>
						<td>{{ $node->admin_info->company_name }}</td>
						<td>{{ $node->admin_info->representative }}</td>
						<td>{{ $node->admin_info->request }}</td>
						<td>{{ $node->admin_info->zip_code }}</td>
						<td>{{ $node->admin_info->address }}</td>
						<td>{{ $node->admin_info->cellphone }}</td>
						<td>{{ $node->admin_info->phone }}</td>
						<td>{{ $node->admin_info->fax }}</td>
						<td>{{ $node->admin_info->name }}</td>
						<td>{{ $node->admin_info->shop_pic }}</td>
						<td>{{ $node->admin_info->shop_zip_code }}</td>
						<td>{{ $node->admin_info->shop_address }}</td>
						<td>{{ $node->admin_info->shop_phone }}</td>
						<td>{{ $node->admin_info->shop_open }}</td>
						<td>{{ $node->admin_info->has_nailist }}</td>
						<td>{{ $node->admin_info->homepage }}</td>
						<td>{{ $node->admin_info->account_holder }}</td>
						<td>{{ $node->admin_info->bank_name }}</td>
						<td>{{ $node->admin_info->branch_name }}</td>
						<td>{{ $node->admin_info->bank_code }}</td>
						<td>{{ $node->admin_info->branch_code }}</td>
						<td>{{ $node->admin_info->account_type }}</td>
						<td>{{ $node->admin_info->account_number }}</td>
						<td>{{ $node->admin_info->incentive }}%</td>
						<td>{{ $node->admin_info->need_file }}</td>
						<td>{{ $node->admin_info->historical_matters }}</td>
						<td>{{ $node->admin_info->seal_certficate }}</td>
						<td>{{ $node->admin_info->passbook }}</td>
						<td>{{ $node->admin_info->residents_card }}</td>
						<td>{{ $node->admin_info->other }}</td>
						<td>{{ $node->admin_info->mailing_date }}</td>
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
							<td>{{ $agency->admin_info->email}}</td>
							<td>{{ $agency->admin_info->company_name }}</td>
							<td>{{ $agency->admin_info->representative }}</td>
							<td>{{ $agency->admin_info->request }}</td>
							<td>{{ $agency->admin_info->zip_code }}</td>
							<td>{{ $agency->admin_info->address }}</td>
							<td>{{ $agency->admin_info->cellphone }}</td>
							<td>{{ $agency->admin_info->phone }}</td>
							<td>{{ $agency->admin_info->fax }}</td>
							<td>{{ $agency->admin_info->name }}</td>
							<td>{{ $agency->admin_info->shop_pic }}</td>
							<td>{{ $agency->admin_info->shop_zip_code }}</td>
							<td>{{ $agency->admin_info->shop_address }}</td>
							<td>{{ $agency->admin_info->shop_phone }}</td>
							<td>{{ $agency->admin_info->shop_open }}</td>
							<td>{{ $agency->admin_info->has_nailist }}</td>
							<td>{{ $agency->admin_info->homepage }}</td>
							<td>{{ $agency->admin_info->account_holder }}</td>
							<td>{{ $agency->admin_info->bank_name }}</td>
							<td>{{ $agency->admin_info->branch_name }}</td>
							<td>{{ $agency->admin_info->bank_code }}</td>
							<td>{{ $agency->admin_info->branch_code }}</td>
							<td>{{ $agency->admin_info->account_type }}</td>
							<td>{{ $agency->admin_info->account_number }}</td>
							<td>{{ $agency->admin_info->incentive }}%</td>
							<td>{{ $agency->admin_info->need_file }}</td>
							<td>{{ $agency->admin_info->historical_matters }}</td>
							<td>{{ $agency->admin_info->seal_certificate }}</td>
							<td>{{ $agency->admin_info->passbook }}</td>
							<td>{{ $agency->admin_info->residents_card }}</td>
							<td>{{ $agency->admin_info->other }}</td>
							<td>{{ $agency->admin_info->mailing_date }}</td>
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
								<td>{{ $distributor->admin_info->email}}</td>
								<td>{{ $distributor->admin_info->company_name }}</td>
								<td>{{ $distributor->admin_info->representative }}</td>
								<td>{{ $distributor->admin_info->request }}</td>
								<td>{{ $distributor->admin_info->zip_code }}</td>
								<td>{{ $distributor->admin_info->address }}</td>
								<td>{{ $distributor->admin_info->cellphone }}</td>
								<td>{{ $distributor->admin_info->phone }}</td>
								<td>{{ $distributor->admin_info->fax }}</td>
								<td>{{ $distributor->admin_info->name }}</td>
								<td>{{ $distributor->admin_info->shop_pic }}</td>
								<td>{{ $distributor->admin_info->shop_zip_code }}</td>
								<td>{{ $distributor->admin_info->shop_address }}</td>
								<td>{{ $distributor->admin_info->shop_phone }}</td>
								<td>{{ $distributor->admin_info->shop_open }}</td>
								<td>{{ $distributor->admin_info->has_nailist }}</td>
								<td>{{ $distributor->admin_info->homepage }}</td>
								<td>{{ $distributor->admin_info->account_holder }}</td>
								<td>{{ $distributor->admin_info->bank_name }}</td>
								<td>{{ $distributor->admin_info->branch_name }}</td>
								<td>{{ $distributor->admin_info->bank_code }}</td>
								<td>{{ $distributor->admin_info->branch_code }}</td>
								<td>{{ $distributor->admin_info->account_type }}</td>
								<td>{{ $distributor->admin_info->account_number }}</td>
								<td>{{ $distributor->admin_info->incentive }}%</td>
								<td>{{ $distributor->admin_info->need_file }}</td>
								<td>{{ $distributor->admin_info->historical_matters }}</td>
								<td>{{ $distributor->admin_info->seal_certficate }}</td>
								<td>{{ $distributor->admin_info->passbook }}</td>
								<td>{{ $distributor->admin_info->residents_card }}</td>
								<td>{{ $distributor->admin_info->other }}</td>
								<td>{{ $distributor->admin_info->mailing_date }}</td>
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
									<td>{{ $member->admin_info->email}}</td>
									<td>{{ $member->admin_info->company_name }}</td>
									<td>{{ $member->admin_info->representative }}</td>
									<td>{{ $member->admin_info->request }}</td>
									<td>{{ $member->admin_info->zip_code }}</td>
									<td>{{ $member->admin_info->address }}</td>
									<td>{{ $member->admin_info->cellphone }}</td>
									<td>{{ $member->admin_info->phone }}</td>
									<td>{{ $member->admin_info->fax }}</td>
									<td>{{ $member->admin_info->name }}</td>
									<td>{{ $member->admin_info->shop_pic }}</td>
									<td>{{ $member->admin_info->shop_zip_code }}</td>
									<td>{{ $member->admin_info->shop_address }}</td>
									<td>{{ $member->admin_info->shop_phone }}</td>
									<td>{{ $member->admin_info->shop_open }}</td>
									<td>{{ $member->admin_info->has_nailist }}</td>
									<td>{{ $member->admin_info->homepage }}</td>
									<td>{{ $member->admin_info->account_holder }}</td>
									<td>{{ $member->admin_info->bank_name }}</td>
									<td>{{ $member->admin_info->branch_name }}</td>
									<td>{{ $member->admin_info->bank_code }}</td>
									<td>{{ $member->admin_info->branch_code }}</td>
									<td>{{ $member->admin_info->account_type }}</td>
									<td>{{ $member->admin_info->account_number }}</td>
									<td>{{ $member->admin_info->incentive }}%</td>
									<td>{{ $member->admin_info->need_file }}</td>
									<td>{{ $member->admin_info->historical_matters }}</td>
									<td>{{ $member->admin_info->seal_certficate }}</td>
									<td>{{ $member->admin_info->passbook }}</td>
									<td>{{ $member->admin_info->residents_card }}</td>
									<td>{{ $member->admin_info->other }}</td>
									<td>{{ $member->admin_info->mailing_date }}</td>
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
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
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
