@extends('admin.layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Accounts</h1>
												<p>View Account</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Accounts </li>
												<li class="breadcrumb-item"><a href="#">Account</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col ">
												<div class="tile col ">

																<div class="d-flex justify-content-center">

																				<h3 class="tile-title">{{ $accountsdata['account']->name }}</h3>
																</div>
																<div class="row">
																				<div class="app-sidebar__user col-md-4">
																								<div class="col-md-8">
																												<img class="app-sidebar__user-avatar d-flex w-25 ml-3"
																																src="/storage/profilepictures/{{ $accountsdata['account']->profile ?? 'noprofile.png' }}"
																																alt="User Image">
																								</div>


																				</div>
																				<div class="app-sidebar__user col-md-8">
																								<div class="tile-body row d-flex justify-content-center">
																												@if (!$accountsdata['account']->isAdmin)
																																<a onclick="event.preventDefault(); document.getElementById('admin-form').submit();"
																																				class="btn btn-success mr-3">Set Admin</a>
																																<div class="d-none">
																																				<form
																																								action="{{ route('admin.useraccounts.update', ['useraccount' => $accountsdata['account']->id]) }}"
																																								method="POST" id="admin-form">
																																								@csrf
																																								@method('PUT')
																																								<input type="text" name="isAdmin" value="1">
																																				</form>
																																</div>
																												@else
																																<a onclick="event.preventDefault(); document.getElementById('admin-form').submit();"
																																				class="btn btn-danger mr-3">Unset admin</a>
																																<div class="d-none">
																																				<form
																																								action="{{ route('admin.useraccounts.update', ['useraccount' => $accountsdata['account']->id]) }}"
																																								method="POST" id="admin-form">
																																								@csrf
																																								@method('PUT')
																																								<input type="text" name="isAdmin" value="0">
																																				</form>
																																</div>
																												@endif

																												<a class="mr-3"
																																href="{{ route('admin.useraccounts.userarticles.index', ['useraccount' => $accountsdata['account']->id]) }}"><button
																																				class="btn btn-success "> Show Articles
																																</button></a>

																												@if (!$accountsdata['account']->isSuspended)
																																<a onclick="event.preventDefault(); document.getElementById('suspend-form').submit();"
																																				class="btn btn-danger mr-3">Suspend</a>
																																<div class="d-none">
																																				<form
																																								action="{{ route('admin.useraccounts.update', ['useraccount' => $accountsdata['account']->id]) }}"
																																								method="POST" id="suspend-form">
																																								@csrf
																																								@method('PUT')
																																								<input type="text" name="isSuspended" value="1">
																																				</form>
																																</div>
																												@else
																																<a onclick="event.preventDefault(); document.getElementById('suspend-form').submit();"
																																				class="btn btn-info mr-3">Unsuspend</a>
																																<div class="d-none">
																																				<form
																																								action="{{ route('admin.useraccounts.update', ['useraccount' => $accountsdata['account']->id]) }}"
																																								method="POST" id="suspend-form">
																																								@csrf
																																								@method('PUT')
																																								<input type="text" name="isSuspended" value="0">
																																				</form>
																																</div>
																												@endif
																												{{--  <a class="mr-3" href="/admin/account/users/delete/{{ $accountsdata['account']->id }}"><button
																																				class="btn btn-danger "> Delete Account
																																</button></a>  --}}
																								</div>

																				</div>


																</div>

												</div>
												<div class="tile">
																<div class="d-flex justify-content-center">
																				<h3 class="tile-title">Personal Details</h3>
																</div>
																<div class="tile-body row p-3">
																				<div class="col">
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Name</h5>
																												<h5 class="dispalay-3 ">{{ $accountsdata['account']->name }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Email</h5>
																												<h5 class="dispalay-3 ">{{ $accountsdata['account']->email }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Account Status</h5>
																												@if ($accountsdata['account']->isSuspended)
																																<h5 class="dispalay-3 "><span class="badge badge-danger">Suspended</span> </h5>
																												@else
																																<h5 class="dispalay-3 "><span class="badge badge-success">Active</span></h5>
																												@endif



																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Account Status</h5>
																												@if ($accountsdata['account']->isAdmin)
																																<h5 class="dispalay-3 "><span class="badge badge-info">Admin</span> </h5>
																												@elseif ($accountsdata['account']->role == 1)
																																<h5 class="dispalay-3 "><span class="badge badge-success">Author</span></h5>
																												@endif
																								</div>

																				</div>
																				<div class="col">
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Phone Number</h5>
																												<h5 class="dispalay-3 ">{{ $accountsdata['account']->phoneno }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">ID/Passport</h5>
																												<h5 class="dispalay-3 ">{{ $accountsdata['account']->nationalId }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Salary</h5>
																												<h5 class="dispalay-3 ">{{ $accountsdata['account']->salary }}</h5>

																								</div>

																				</div>


																</div>

																<hr>


												</div>
								</div>
				</div>
@endsection
