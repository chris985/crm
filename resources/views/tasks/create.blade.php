@extends('common')

@section('form-open')
{!! Form::model($task, array('route' => 'tasks.store', 'method' => 'POST', 'files' => true)) !!}
@endsection

@section('title')
New Place
@endsection

@section('actions')
<li class="nav-item"><button class="nav-link btn btn-primary rounded-circle" type="submit"><i class="fa fa-save fa-fw"></i></button></li>
@endsection

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
						<label class="text-muted" for="name"><i class="text-muted fa fa-building fa-fw mr-1"></i>Name</label>
						<input id="name" class="form-control" name="name" type="text" aria-describedby="name">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="text-muted" for="division"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Person</label>
						{!! Form::select('people', $people, null, ['class' => 'form-control select']) !!}
					</div>
					<div class="col">
						<label class="text-muted" for="parent"><i class="text-muted fa fa-building fa-fw mr-1"></i>Place</label>
						{!! Form::select('places', $places, null, ['class' => 'form-control select']) !!}
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
						<option value="6">Competitor</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="card-block text-muted">
		<div class="form-group row">
			<div class="col">
				<label for="note"><i class="text-muted fa fa-sticky-note fa-fw mr-1"></i>Notes</label>
				<textarea id="note" class="form-control" name="note" rows="3"></textarea>
			</div>
		</div>
	</div>
</div>
@endsection

@section('form-close')
{!! Form::close() !!}
@endsection
