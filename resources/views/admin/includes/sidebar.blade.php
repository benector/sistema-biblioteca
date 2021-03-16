<aside class="main-sidebar elevation-4 white-sidebar" style="overflow-x: hidden;background-color:white">
	<a href="index3.html" class="brand-link">
	<img style="max-width:100%" src="{{ asset('img/logo.png')}}"  />
		
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{Auth::user()->name}}</a>
			</div>
			<div class="info align-self-center">
				<form id="logout-form" method="post" action="{{ route('logout') }}">
					@csrf
					<a href="#" onclick="$('#logout-form').submit()" class="d-block"><i class="nav-icon fas fa-power-off"></i></a>
				</form>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item has-treeview ">
					<a href="/" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
					<i class="nav-icon fas fa-book"></i>							<p>
						<p>
							Acervo
						</p>
					</a>
				</li>
				@can('viewAny', App\User::class)
					<li class="nav-item has-treeview ">
						<a href="{{ route('users.index') }}"
							class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Usuários
							</p>
						</a>
					</li>
				@endcan
					<li class="nav-item has-treeview ">
						<a href="{{ route('categories.index') }}"
							class="nav-link {{ Route::is('categories.index') ? 'active' : '' }}">
							<i class="nav-icon fas fa-list-ul"></i>
							<p>
								Categorias
							</p>
						</a>
					</li>
					<li class="nav-item has-treeview ">
						<a href="{{ route('subjects.index') }}"
							class="nav-link {{ Route::is('subjects.index') ? 'active' : '' }}">
							<i class="nav-icon fas fa-list-ul"></i>
							<p>
								Assuntos
							</p>
						</a>
					</li>
					<li class="nav-item has-treeview ">
						<a href="{{ route('works.index') }}"
							class="nav-link {{ Route::is('works.index') ? 'active' : '' }}">
							<i class="nav-icon fas fa-book"></i>							<p>
								Obras
							</p>
						</a>
					</li>
			</ul>
		</nav>
	</div>
</aside>