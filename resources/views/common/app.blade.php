<!DOCTYPE html>
<html lang="en" style="background: #F5F5F5">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	{{-- Check for page title variable, if undefined, show application name --}}
	<title>@hasSection('title')@yield('title') | Starstation @else Starstation @endif</title>
	<link rel="icon" type="image/x-icon" href="/symfony/web/favicon.ico" /> <!-- App Icon -->

	{{-- Dependent CSS --}}
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" />  Bootstrap CSS Icon -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> <!-- Font Awesome CSS -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" /> <!-- Select 2 CSS -->

	{{-- Temporary embedded styles --}}
	<style type="text/css">
	/* 
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
	*/
	
	ul li button {
		background: none;
		border: none;
		color: inherit;
		margin: auto 0px auto 0px;
		padding: 0 15px;
		justify-content: center;
		display: flex;
		height: 80px;
		font-size: .875rem;
		color: #999;
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
		box-sizing: border-box;
		align-items: center;
	}
	ul li button:hover {
		color: #333;
		cursor: pointer; 
	}
	.select2-container--default .select2-selection--single, .select2-selection .select2-selection--multiple {
		border: 1px solid #e5e5e5;
		height: 40px;
		vertical-align: middle;
		padding: 5px 10px;
	}
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		color: #666666;
	}
	.select2-dropdown {
		border: 1px solid #e5e5e5;
}

	@yield('css')
</style>
</head>

<body>
	<header id="header" class="uk-container">
		<div class="uk-navbar-transparent" uk-navbar>
			<a class="uk-navbar-item uk-logo" href="javascript:history.go(-1)">SS</a>
			@if (Auth::check())
			<div class="uk-navbar-left">
				<ul class="uk-navbar-nav">
					<li class="uk-margin-right"><a href="javascript:history.go(-1)" class="uk-navbar-item uk-logo"><i class="fa fa-bars fa-fw"></i>&nbsp;Dashboard</a></li>
					<li class="uk-light"><a href="{{ route('tasks.index') }}"><i class="fa fa-leaf fa-fw"></i>&nbsp;Tasks</a></li>
					<li class="uk-light"><a href="{{ route('people.index') }}"><i class="fa fa-group fa-fw"></i>&nbsp;People</a></li>
					<li class="uk-light"><a href="{{ route('places.index') }}"><i class="fa fa-building fa-fw"></i>&nbsp;Places</a></li>
					<li class="uk-light"><a href="#"><i class="fa fa-money fa-fw"></i>&nbsp;Money</a></li>
					<li class="uk-light"><a href="#"><i class="fa fa-clock-o fa-fw"></i>&nbsp;Times</a></li>
					<li class="uk-light"><a href="#"><i class="fa fa-puzzle-piece fa-fw"></i>&nbsp;Things</a></li>
				</ul>
			</div>
			<div class="uk-navbar-right">
				<div>
					<a class="uk-navbar-toggle" uk-search-icon href="#"></a>
					<div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
						<form class="uk-search uk-search-navbar uk-width-1-1">
							<input class="uk-search-input" type="search" placeholder="Search..." autofocus>
						</form>
					</div>
				</div>
				<ul class="uk-navbar-nav">
					<li><a href="#"><img class="uk-border-circle" width="40" height="40" src="https://randomuser.me/api/portraits/men/5.jpg" alt=""><i class="fa fa-caret-down fa-fw"></i></a>
						<div class="uk-navbar-dropdown" uk-dropdown="animation: uk-animation-slide-top-small; duration: 1000; mode: click;">
							<ul class="uk-nav uk-navbar-dropdown-nav">
								<li><a href="#"><i class="fa fa-user fa-fw"></i>&nbsp;Profile</a></li>
								<li><a href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;Settings</a></li>
								<li><a href="#"><i class="fa fa-question-circle fa-fw"></i>&nbsp;Help</a></li>
								<li><hr /></li>
								<li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
			@else {{-- If not logged in, show login and registration menu items --}}
			<ul class="uk-navbar-nav uk-navbar-right">
				<li><a href="{{ route('login') }}"><i class="fa fa-key fa-fw"></i>&nbsp;Login</a></li>
				<li><a href="{{ route('register') }}"><i class="fa fa-user-plus fa-fw"></i>&nbsp;Register</a></li>
			</ul>
			@endif
		</div>
	</header>

	{{-- Open form early so variables are available to us and the navigation can function properly --}}
	@yield('form-open')
	<nav id="nav" class="material uk-background-primary">
		<div id="nav" class="uk-container">
			<div class="uk-navbar-container uk-navbar-transparent uk-light" uk-navbar>
				@if (Auth::check())
				<h1 class="uk-margin-remove"><a class="uk-navbar-item uk-logo">@yield('title', 'SS')</a></h1>
				<div class="uk-navbar-right">
					<ul class="uk-navbar-nav">
						@yield('actions')
					</ul>
				</div>
				@endif
			</div>
		</div>
	</nav>

	<main id="main" class="uk-container uk-padding">
		<div id="app" class="uk-grid-small" uk-grid>
			<div class="notify uk-width-1-1">
				{{-- Success Messages --}}
				@if ($message = Session::get('success'))
				<div class="uk-alert-success uk-animation-slide-left" uk-alert>
					<a class="uk-alert-close" uk-close></a>
					<p>{{ $message }}</p>
				</div>
				@endif
				{{-- Error Messages --}}
				@if (count($errors) > 0)
				@foreach ($errors->all() as $error)
				<div class="uk-alert-danger uk-animation-slide-right" uk-alert>
					<a class="uk-alert-close" uk-close></a>
					<p>{{ $error }}</p>
				</div>
				@endforeach
				@endif
			</div>

			<div id="content" class="uk-width-expand">
				@yield('content')
			</div>
			@hasSection('aside')
			<aside class="uk-width-1-4@s">
				@yield('aside')
			</aside>
			@endif
		</div>
	</main>

	<footer id="footer" class="uk-container">
		<hr>
		<p><a href="" class="uk-align-right" uk-totop uk-scroll></a><small>&copy; Powered by StarStation CRM. Automate your business.</small></p>
	</footer>

	{{-- Close a form if it is open --}}
	@yield('form-close')

	{{-- Dependent scripts --}}
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>-->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> <!-- Select2 JS -->
		<script type="text/javascript">
			$('select').select2();
			$("select.tags").select2({
				tags: true
			});
			$( document ).ready(function() {
				$(".dropdown-button").dropdown();
			});
		</script> <!-- Initialize Boostrap Components and Select2 -->

		{{-- If there is a modal dialog, such as a delete confirmation, load it in here --}}
		@hasSection('modal')
		@yield('modal')
		@endif

		{{-- You can use this section for any temporary page-specific JS --}}
		@hasSection('js')
		@yield('js')
		@endif
	</body>
	</html>
