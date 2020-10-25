@extends('admin/layout.auth')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12">

			<h3>ユーザー一覧</h3>

			@foreach ($nodes as $node)
				<div class="admin__tree">
					<h5 class="admin__tree__btn">・{{ $node->admin_info->name }}</h5>
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
						@foreach ($node->admin_info->user_info as $users_info)
							@foreach ($users_info as $users)
							<tr>
								<td>{{ $users->name }}</td>
								<td>{{ $users->admin->name }}</td>
								<td>{{ $users->admin->type }}</td>
								<td>{{ $users->admin->email }}</td>
								<td>{{ $users->downloads }}</td>
								<td>{{ $users->gadget_id }}</td>
								<td>{{ $users->register_gadget }}</td>
							</tr>
								@foreach ($users as $user)
								<tr>
									<td>{{ $user->name }}</td>
									<td>{{ $user->admin->name }}</td>
									<td>{{ $user->admin->type }}</td>
									<td>{{ $user->admin->email }}</td>
									<td>{{ $user->downloads }}</td>
									<td>{{ $user->gadget_id }}</td>
									<td>{{ $user->register_gadget }}</td>
								</tr>
									@foreach ($user as $use)
									<tr>
										<td>{{ $use->name }}</td>
										<td>{{ $use->admin->name }}</td>
										<td>{{ $use->admin->type }}</td>
										<td>{{ $use->admin->email }}</td>
										<td>{{ $use->downloads }}</td>
										<td>{{ $use->gadget_id }}</td>
										<td>{{ $use->register_gadget }}</td>
									</tr>
										@foreach ($use as $us)
										<tr>
											<td>{{ $us->name }}</td>
											<td>{{ $us->admin->name }}</td>
											<td>{{ $us->admin->type }}</td>
											<td>{{ $us->admin->email }}</td>
											<td>{{ $us->downloads }}</td>
											<td>{{ $us->gadget_id }}</td>
											<td>{{ $us->register_gadget }}</td>
										</tr>
										@endforeach
									@endforeach
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
