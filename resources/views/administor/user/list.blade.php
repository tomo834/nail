@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">
    		<h2>NAILTRON : {{ Auth::guard('admin')->user()->name }}</h2>

			<h3>ユーザー一覧</h3>

			@foreach ($nodes as $node)
				<div class="admin__tree">
					<h5 class="admin__tree__btn">・{{ $node->admin_info->name }}aaa</h5>
					<div class="admin__tree__user">
						@foreach ($node->admin_info->user_info as $users)
							<p>{{ $users->name }}</p>
						@endforeach
					</div>
					@foreach ($node->children as $agency)
						<div class="admin__tree__agency">
							<h5 class="agency__tree__btn">・{{ $agency->admin_info->name }}</h5>
							<div class="admin__tree__user">
								@foreach ($agency->admin_info->user_info as $users)
									<p>{{ $users->name }}</p>
								@endforeach
							</div>
							@foreach ($agency->children as $distributor)
								<div class="admin__tree__distributor">
									<h5 class="distributor__tree__btn">・{{ $distributor->admin_info->name }}</h5>
									<div class="admin__tree__user">
									@foreach ($distributor->admin_info->user_info as $users)
										<p>{{ $users->name }}</p>
									@endforeach
								</div>
									@foreach ($distributor->children as $member)
										<div class="admin__tree__member">
											<h5 class="member__tree__btn">・{{ $member->admin_info }}</h5>
											<div class="admin__tree__user">
												@foreach ($member->admin_info->user_info as $users)
													<p>{{ $users->name }}</p>
												@endforeach
											</div>
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
						<th>ユーザー</th>
						<th>店舗名</th>
						<th>店舗タイプ</th>
						<th>メールアドレス</th>
						<th>ダウンロード回数</th>
						<th>デバイス</th>
						<th>デバイス登録日</th>
					</tr>

					@foreach ($nodes as $node)
					@foreach ($node->admin_info->user_info as $users)
					<tr>
						<td>{{ $users->name }}</td>
						<td>{{ $users->admin->name }}</td>
						<td>{{ $users->admin->type }}</td>
						<td>{{ $users->admin->email }}</td>
						<td>{{ $users->downloads }}</td>
						<td>{{ $users->gadget_id }}</td>
						<td>{{ $users->register_gadget }}</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					@endforeach

						@foreach ($node->children as $agency)
						<tr>
							<td>{{ $agency->admin_info->account_id }}</td>
							<td>{{ $agency->admin_info->name }}</td>
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
							<td>{{ $agency->admin_info->incentive }}%</td>
							<td>{{ $agency->admin_info->password }}</td>
						</tr>
							@foreach ($agency->children as $distributor)
							<tr>
								<td>{{ $distributor->admin_info->account_id }}</td>
								<td>{{ $distributor->admin_info->name }}</td>
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
								<td>{{ $distributor->admin_info->incentive }}%</td>
							</tr>
								@foreach ($distributor->children as $member)
								<tr>
									<td>{{ $member->admin_info->account_id }}</td>
									<td>{{ $member->admin_info->name }}</td>
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
									<td>{{ $member->admin_info->incentive }}%</td>
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
	.admin__tree__user{
		display: none;
		padding-left: 20px;
	}
	.admin__tree__user p{
		margin-bottom: 10px;
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
		$('.member__tree__btn').click(function(){
			$(this).siblings().slideToggle();
		});
	});
</script>
@endsection
