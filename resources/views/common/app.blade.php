<!DOCTYPE html>
<html lang="en" style="background: #F5F5F5">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	{{-- Check for page title variable, if undefined, show application name --}}
	<title>@hasSection('title')@yield('title') | Starstation @else Starstation @endif</title>
	<link rel="icon" type="image/x-icon" href="/symfony/web/favicon.ico" /> <!-- App Icon -->

	{{-- Dependent CSS --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" /> <!-- Bootstrap CSS Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> <!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" /> <!-- Select 2 CSS -->

	{{-- Temporary embedded styles --}}
	<style type="text/css">
	body {
		background: #E1E2E1;
	}
	a {
		color: inherit;
	}
	#material {
		background: url('https://graphicflip.com/wp-content/uploads/2016/02/40-backgrounds-material.jpg') center center;
		background-size: cover;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 70%;
		z-index: 0;
	}
	#nav, #app, header, #header, #main, #footer {
		z-index: 1;
	}
	#content {
		background: #FFF;
		box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .26);
	}
	.card-subtitle {
		font-size: 80%;
	}
	.card-list .card {
		border-top: none;
		border-right: none;
		border-bottom: none;
		border-left: 5px solid #FFF;
		border-radius: 0;
	}
	.card-list .card:hover {
		border-left: 5px solid purple;
		background: #fafafa;
		box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
		transition: all 0.3s cubic-bezier(.25,.8,.25,1);
	}
	.peek {
		font-size: 80%;
	}
	</style>

	{{-- Injection point for temporary page-specific CSS --}}
	@hasSection('css')
	<style type="text/css">
	@yield('css')
	</style>
	@endif
</head>

<body>

	<nav id="nav" class="navbar navbar-expand-lg">
		<a class="navbar-brand text-white" href="#"><i class="fa fa-bars"></i> Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarToggler">
			@if (Auth::check())
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link text-white" href="{{ route('tasks.index') }}"><i class="fa fa-leaf fa-fw"></i>&nbsp;Tasks</a></li>
				<li class="nav-item"><a class="nav-link text-white" href="{{ route('people.index') }}"><i class="fa fa-group fa-fw"></i>&nbsp;People</a></li>
				<li class="nav-item"><a class="nav-link text-white" href="{{ route('places.index') }}"><i class="fa fa-building fa-fw"></i>&nbsp;Places</a></li>
				<li class="nav-item"><a class="nav-link disabled" href="#"><i class="fa fa-money fa-fw"></i>&nbsp;Money</a></li>
				<li class="nav-item"><a class="nav-link disabled" href="#"><i class="fa fa-clock-o fa-fw"></i>&nbsp;Times</a></li>
				<li class="nav-item"><a class="nav-link disabled" href="#"><i class="fa fa-puzzle-piece fa-fw"></i>&nbsp;Things</a></li>
			</ul>
			<div>
				<ul class="navbar-nav float-right">
					<li class="nav-item dropdown">
						<a class="nav-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" width="40" height="40" src="https://randomuser.me/api/portraits/men/5.jpg" alt=""></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item text-muted disabled" href="#"><i class="fa fa-user fa-fw"></i>&nbsp;Profile</a>
							<a class="dropdown-item text-muted disabled" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;Settings</a>
							<a class="dropdown-item text-muted disabled" href="#"><i class="fa fa-question-circle fa-fw"></i>&nbsp;Help</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a>
						</div>
					</li>
				</ul>
				<form class="form-inline">
					<input class="form-control mr-sm-2" type="text" placeholder="Search...">
				</form>
			</div>
			@else {{-- If not logged in, show login and registration menu items --}}
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-key fa-fw"></i>&nbsp;Login</a></li>
				<li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus fa-fw"></i>&nbsp;Register</a></li>
			</ul>
			@endif
		</div>
	</nav>

	<div id="material"></div>

	{{-- Open form early so variables are available to us and the navigation can function properly --}}
	@yield('form-open')

	<header id="header" class="container-fluid">
		<div class="row no-gutters my-3">
			<div class="col-md-3">
				<h2 class="display-3"><a href="javascript:history.go(-1)" class="text-white">@yield('title')</a></h2>
			</div>
			<div class="col-md-3 my-auto">
				<ul class="nav text-white">
					@yield('actions')
				</ul>
			</div>
			<div class="col my-auto">
				{{-- More Actions... --}}
			</div>
		</div>
	</header>

	{{-- Use page variable to specify page-specific css classes. This will eventually be cleaned up to the page title or just targeted CSS --}}
	<main id="app" class="container-fluid">
		<div class="row">
			<div class="col">
				<div id="content" class="p-1">
					@yield('content')
				</div>
			</div>

			@hasSection('aside')
			<aside class="col-md-3">
				<div id="sidebar">
					@yield('aside')
				</div>
			</aside>
			@endif
		</div>
	</main>

	{{-- Close a form if it is open --}}
	@yield('form-close')

	<footer id="footer">
		<p>&copy; 2017 Starcresc Interactive</p>
	</footer>

	{{-- Dependent scripts --}}
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> <!-- Select2 JS -->
	<script type="text/javascript">
	$('select').select2();
	$( document ).ready(function() {
		$(".dropdown-button").dropdown();
	});
	</script> <!-- Initialize Boostrap Components and Select2 -->

	{{-- If there is a modal dialog, such as a delete confirmation, load it in here --}}
	@hasSection('modal')
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				@yield('modal')
			</div>
		</div>
	</div>
	@endif
	{{-- You can all this section for any temporary page-specific JS --}}
	@hasSection('js')
	@yield('js')
	@endif
</body>
</html>
