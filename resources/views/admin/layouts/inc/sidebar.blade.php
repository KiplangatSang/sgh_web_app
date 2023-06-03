<aside class="app-sidebar">
				<div class="app-sidebar__user bg-dark"><img class="app-sidebar__user-avatar d-flex w-25"
												src="/storage/profile/mine?? 'noprofile.png' }}" alt="profile">
								<div>
												<p class="app-sidebar__user-name">
																{{ auth()->user()->username ?? 'guest' }}</p>
												@if (auth()->user()->isAdmin)
																<p class="app-sidebar__user-designation">Admin</p>
												@else
																@if (Auth::user()->isAdmin)
																				<p class="app-sidebar__user-designation">Employee</p>
																@else
																				<p class="app-sidebar__user-designation">Guest</p>
																@endif

												@endif

								</div>
				</div>
				<ul class="app-menu ">
								<li><a class="app-menu__item active " href="/home"><i class="app-menu__icon fa fa-dashboard"></i><span
																				class="app-menu__label">Dashboard</span></a>
								</li>

								<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																				class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Articles</span><i
																				class="treeview-indicator fa fa-angle-right"></i></a>
												<ul class="treeview-menu">
																<li><a class="treeview-item " href="{{ route('admin.articles.index') }}"><i
																												class="icon fa fa-circle-o"></i>All
																								Articles
																				</a></li>
																<li><a class="treeview-item " href="{{ route('admin.pendingarticles.index') }}"><i
																												class="icon fa fa-circle-o"></i>Pending
																								Articles</a></li>

												</ul>
								</li>

								<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																				class="app-menu__icon fa fa-square"></i><span class="app-menu__label">Articles
																				Cartegory</span><i class="treeview-indicator fa fa-angle-right"></i></a>
												<ul class="treeview-menu">
																<li><a class="treeview-item " href="{{ route('admin.categories.index') }}"><i
																												class="icon fa fa-circle-o"></i>Existing Categories
																				</a></li>
																<li><a class="treeview-item " href="{{ route('admin.categories.create') }}"><i
																												class="icon fa fa-circle-o"></i>Add a
																								Category</a></li>

												</ul>
								</li>
								<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																				class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Article
																				Writers</span><i class="treeview-indicator fa fa-angle-right"></i></a>
												<ul class="treeview-menu">
																<li><a class="treeview-item " href="{{ route('admin.useraccounts.index') }}"><i
																												class="icon fa fa-circle-o"></i>
																								Published Writers
																				</a></li>
																<li><a class="treeview-item " href="{{ route('admin.suspendeduseraccounts.index') }}"><i
																												class="icon fa fa-circle-o"></i>Suspended</a></li>

												</ul>
								</li>
								<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																				class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">APIS
																</span><i class="treeview-indicator fa fa-angle-right"></i></a>
												<ul class="treeview-menu">
																<li><a class="treeview-item " href="{{ route('admin.apis.index') }}"><i class="icon fa fa-circle-o"></i>
																								APIS
																				</a></li>
																<li><a class="treeview-item " href="{{ route('admin.apis.create') }}"><i
																												class="icon fa fa-circle-o"></i>
																								Create APIS
																				</a></li>

												</ul>
								</li>

				</ul>
</aside>
