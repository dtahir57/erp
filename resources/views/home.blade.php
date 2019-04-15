@extends('layouts.tabler')
@section('title', 'Homepage')

@push('links')

	<script src="{{ asset('tabler/assets/js/require.min.js') }}"></script>
	<script>
		requirejs.config({
				baseUrl: 'tabler'
		});
	</script>

	<script src="{{ asset('js/app.js') }}" defer></script>

	<link href="{{ asset('tabler/assets/css/dashboard.css') }}" rel="stylesheet" />
	<script src="{{ asset('tabler/assets/js/dashboard.js') }}"></script>

	<!-- c3.js Charts Plugin -->
	<link href="{{ asset('tabler/assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
	<script src="{{ asset('tabler/assets/plugins/charts-c3/plugin.js') }}"></script>
@endpush

@section('content')

<div class="my-3 my-md-5">
	<div class="container">
		<div class="col-12">
			<div class="card">
				<div class="table-responsive">
					<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
						<thead>
							<tr>
								<th class="text-center w-1"><i class="icon-people"></i></th>
								<th>User</th>
								<th>Detail</th>
								<th class="text-center">Designation</th>
								<th>Activity</th>
								<th class="text-center">Avg. Score</th>
								<th class="text-center"><i class="icon-settings"></i></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">
									<div class="avatar d-block" style="background-image: url(tabler/demo/faces/female/26.jpg)">
										<span class="avatar-status bg-green"></span>
									</div>
								</td>
								<td>
									<div>Elizabeth Martin</div>
									<div class="small text-muted">
										Joined: Mar 19, 2018
									</div>
								</td>
								<td>
									<div>test@laxyo.com</div>
									<div class="small text-muted">1234567890</div>
								</td>
								<td class="text-center">
									<div>Jr. PHP Developer</div>
								</td>
								<td>
									<div class="small text-muted">Last login</div>
									<div>4 minutes ago</div>
								</td>
								<td class="text-center">
									<div class="mx-auto chart-circle chart-circle-xs" data-value="0.42" data-thickness="3" data-color="blue">
										<div class="chart-circle-value">42%</div>
									</div>
								</td>
								<td class="text-center">
									<div class="item-action dropdown">
										<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
											<a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
											<a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
											<div class="dropdown-divider"></div>
											<a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

@endpush		