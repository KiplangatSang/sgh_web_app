@extends('admin.layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Accounts </h1>

								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Accounts</li>
												<li class="breadcrumb-item active"><a href="#">Accounts List</a></li>
								</ul>
				</div>


				<div class="row">
								<div class="col-md-6 col-lg-3">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-basket fa-3x"></i>
																<div class="info">
																				<h4>Accounts</h4>

																				<p class="text-warning"><b>{{ count($accountsdata['accounts']) }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h4>Suspended Acc</h4>
																				<p class="text-warning"><b>{{ count($accountsdata['suspended']) }} </b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h4>Active Acc</h4>
																				<p class="text-warning"><b>{{ count($accountsdata['active']) }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-signal fa-3x"></i>
																<div class="info">
																				<h4>Admin Acc</h4>
																				<p class="text-warning"><b>{{ count($accountsdata['admin']) }}</b></p>
																</div>
												</div>
								</div>
				</div>
				<div class="row">
								<div class="col-md-12">
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<table class="table table-hover table-bordered" id="sampleTable">
																												<thead>
																																<tr>
																																				<th>Account Id</th>
																																				<th>User Name</th>
																																				<th>User email</th>
																																				<th>Account Status</th>
																																				<th>Verified At</th>
																																				<th>Date Created</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($accountsdata['accounts'] as $account)
																																				<tr>
																																								<td>
																																												{{ $account->id }}
																																								</td>
																																								<td>
																																												{{ $account->name }}
																																								</td>
																																								<td>
																																												{{ $account->email }}
																																								</td>

																																								@if ($account->isSuspended)
																																												<td>
																																																Suspended
																																												</td>
																																												<td><a class="btn btn-primary"
																																																				href="/admin/account/users/update/{{ $account->id }}">Activate</a></td>
																																												</a>
																																								@else
																																												<td>
																																																Active
																																												</td>
																																												<td><a class="btn btn-primary"
																																																				href="/admin/account/users/update/{{ $account->id }}">Suspend</a></td>
																																												</a>
																																								@endif

																																								<td>
																																												{{ $account->email_verified_at }}
																																								</td>
																																								<td>
																																												{{ $account->created_at }}

																																								</td>

																																				</tr>
																																@endforeach
																												</tbody>
																								</table>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
