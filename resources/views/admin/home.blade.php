@extends('admin.layouts.app')

@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-dashboard"></i> Admin Dashboard</h1>
												<p><strong>SG-Hekima</strong></p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
								</ul>
				</div>

								<div class="row">
												<div class="col-md-6 col-lg-3">

																<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-2x"></i>
																				<div class="info">

																								<h4>Users</h4>
																								<p><b>{{$homedata['userscount']}}</b></p>

																				</div>
																</div>

												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up "></i>
																				<div class="info">
																								<h4>Articles</h4>
																								<p><b>{{ $homedata['articlescount']}}
                                                                                                   </b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-2x"></i>
																				<div class="info">
																								<h4>Categories</h4>
																								<p><b>
                                                                                                    {{$homedata['categoriescount']}}</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-2x"></i>
																				<div class="info">
																								<h4>Published</h4>
																								<p><b>
                                                                                                    {{$homedata['publishedcount']}}</b></p>
																				</div>
																</div>
												</div>

								</div>



				<div class="row">
								@if (session()->has('message'))
												<div class="container-fluid alert alert-danger">
																{{ session()->get('message') }}
												</div>
								@endif

								@if (session()->has('success'))
												<div class="container-fluid alert alert-success">
																{{ session()->get('success') }}
												</div>
								@endif
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Users</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="usersLineChart"></canvas>
																</div>
												</div>
								</div>
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Users</h3>

																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="usersPieChart">


																				</canvas>
																</div>
												</div>
								</div>
				</div>
@endsection
