@extends('common.app')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<button class="close" type="button" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"><i class="fa fa-times fa-fw"></i></span>
	</button>
	<p><strong>Error!</strong> Please fix the following to continue:</p>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col main">
				<div class="form-group row">
					<div class="col">
						<label class="text-muted" for="first"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>First</label>
						<input id="first" class="form-control" name="first" type="text" aria-describedby="first">
					</div>
					<div class="col">
						<label class="text-muted" for="lat"><i class="text-muted fa fa-diamond fa-fw mr-1"></i>Last Name</label>
						<input id="last" class="form-control" name="last" type="text" aria-describedby="last">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Title</label>
						<input id="title" class="form-control" name="title" type="text" aria-describedby="title">
					</div>
					<div class="col">
						<label class="text-muted" for="palces"><i class="text-muted fa fa-building fa-fw mr-1"></i>Places</label>
						{!! Form::select('places[]', $places, null, ['multiple' => 'multiple', 'class' => 'form-control select multiple']) !!}
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="text-muted" for="status"><i class="text-muted fa fa-eye fa-fw mr-1"></i>Status</label>
					<select id="status" class="form-control" name="status" aria-describedby="company">
						<option value="0">Inactive</option>
						<option value="1" selected>Active</option>
					</select>
				</div>
				<div class="form-group">
					<label class="text-muted" for="type"><i class="text-muted fa fa-sitemap fa-fw mr-1"></i>Type</label>
					<select class="form-control" name="type" aria-describedby="type">
						<option value="0">Not-A-Fit</option>
						<option value="1" selected>Unspecified</option>
						<option value="2">Contact</option>
						<option value="3">Prospect</option>
						<option value="4">Partner</option>
						<option value="5">Vendor</option>
						<option value="6">Reseller</option>
						<option value="7">Competitor</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="card-block">
		<div class="form-group row">
			<div class="col">
				<label class="text-muted" for="phone"><i class="text-muted fa fa-phone fa-fw mr-1"></i>Phone</label>
				<input id="phone" class="form-control" name="phone" type="text" aria-describedby="phone">
			</div>
			<div class="col">
				<label class="text-muted" for="email" ><i class="text-muted fa fa-envelope fa-fw mr-1"></i>Email</label>
				<input id="email" class="form-control" name="email" type="text" aria-describedby="email">
			</div>
		</div>
		<div class="form-group row">
			<div class="col">
				<label class="text-muted" for="alt" ><i class="text-muted fa fa-mobile fa-fw mr-1"></i>Alt</label>
				<input id="alt" class="form-control" name="alt" type="text" aria-describedby="alt">
			</div>
			<div class="col">
				<label class="text-muted" for="web"><i class="text-muted fa fa-external-link fa-fw mr-1"></i>Web</label>
				<input id="web" class="form-control" name="web" type="text" aria-describedby="web">
			</div>
		</div>
		<div class="form-group row">
			<div class="col">
				<p class="text-muted"><i class="text-muted fa fa-photo fa-fw mr-1"></i>Photo</p>
				<label class="custom-file">
					{!! Form::file('image', null, array('id' => 'image', 'class' => 'custom-file-control')) !!}
					<span class="custom-file-control"></span>
				</label>
			</div>
			<div class="col">
				<label class="text-muted" for="web"><i class="text-muted fa fa-handshake-o fa-fw mr-1"></i>Referrer</label>
				<input id="web" class="form-control" name="web" type="text" aria-describedby="web">
			</div>
		</div>
	</div>
	<div class="card-footer text-muted">
		<div class="form-group row">
			<div class="col">
				<label for="note"><i class="text-muted fa fa-sticky-note fa-fw mr-1"></i>Notes</label>
				<textarea id="note" class="form-control" name="note" rows="3"></textarea>
			</div>
		</div>
	</div>
</div>
@endsection

@section('title')
New
@endsection

@section('actions')
<li class="nav-item"><button class="nav-link btn btn-primary rounded-circle" type="submit"><i class="fa fa-save fa-fw"></i></button></li>
@endsection

@section('back')
<a class="nav-link" href="{{ route('people.index') }}"><i class="fa fa-arrow-left fa-fw"></i></a>
@endsection

@section('form-open')
{!! Form::model($person, array('route' => 'people.store', 'method' => 'POST', 'files' => true)) !!}
@endsection

@section('form-close')
{!! Form::close() !!}
@endsection
