@extends('common')

@section('form-open')
{!! Form::model($person, ['method' => 'PATCH', 'files' => true, 'route' => ['people.update', $person->id]]) !!}
@endsection

@section('title')
Edit
@endsection

@section('actions')
<li class="nav-item"><button class="nav-link btn btn-primary rounded-circle" type="submit" ><i class="fa fa-save fa-fw"></i></button></li>
<li class="nav-item"><button class="nav-link btn btn-link" type="button" data-toggle="modal" data-target="#modal"><i class="fa fa-trash fa-fw"></i></button></li>
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
						<label class="text-muted" for="first"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>First</label>
						<input id="first" class="form-control" name="first" type="text" value="{{ $person->first }}" aria-describedby="first">
					</div>
					<div class="col">
						<label class="text-muted" for="last"><i class="text-muted fa fa-diamond fa-fw mr-1"></i>Last Name</label>
						<input id="last" class="form-control" name="last" type="text" value="{{ $person->last }}" aria-describedby="last" >
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Title</label>
						<input id="title" class="form-control" name="title" type="text" value="{{ $person->title }}" aria-describedby="title" >
					</div>
					<div class="col">
						<label class="text-muted" for="places"><i class="text-muted fa fa-building fa-fw mr-1"></i>Places</label>
						<select name="places[]" class="select form-control" multiple>
							@foreach($places as $place)
							<option value="{{ $place->id }}">{{ $place->name }}</option>
							@endforeach 
						</select>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="text-muted" for="status"><i class="text-muted fa fa-eye fa-fw mr-1"></i>Status</label>
					<select id="status" class="form-control" name="status">
						<option value="0">Inactive</option>
						<option value="1" selected>Active</option>
					</select>
				</div>
				<div class="form-group">
					<label for="status"><i class="text-muted fa fa-sitemap fa-fw mr-1"></i>Type</label>
					<select id="type" class="form-control" name="type">
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
		<div class="row">
			<div class="col main">
				<div class="form-group">
					<label class="text-muted" for="phone"><i class="text-muted fa fa-phone fa-fw mr-1"></i>Phone</label>
					<input id="phone" class="form-control" name="phone" type="text" value="{{ $person->phone }}" aria-describedby="phone">
				</div>
				<div class="form-group">
					<label class="text-muted" for="alt"><i class="text-muted fa fa-mobile fa-fw mr-1"></i>Alt</label>
					<input id="alt" class="form-control" name="alt" type="text" value="{{ $person->alt }}" aria-describedby="alt">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-muted" for="email"><i class="text-muted fa fa-envelope fa-fw mr-1"></i>Email</label>
					<input id="email" class="form-control" name="email" type="text" value="{{ $person->email }}" aria-describedby="email">
				</div>
				<div class="form-group">
					<label class="text-muted" for="exampleInputEmail1"><i class="text-muted fa fa-external-link fa-fw mr-1"></i>Web</label>
					<input id="web" class="form-control" name="web" type="text" aria-describedby="emailHelp" value="{{ $person->web }}">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col">
				<p><i class="text-muted fa fa-photo fa-fw mr-1"></i>Photo</p>
				<img class="float-left img-responsive rounded-circle mr-3" width="40" height="40" src="../../media\people\{{ $person->image }}" alt="" />
				<label class="text-muted custom-file">
					{{ Form::file('image', null, array('id' => 'image', 'class' => 'custom-file-control')) }}
					<span class="custom-file-control"></span>
				</label>
			</div>
		</div>
	</div>
	<div class="card-footer text-muted">
		<div class="form-group row">
			<div class="col">
				<label class="text-muted" for="note"><i class="text-muted fa fa-sticky-note fa-fw mr-1"></i>Notes</label>
				<textarea id="note" class="form-control" name="note" rows="3" aria-describedby="note">{{ $person->note }}</textarea>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection

@section('modal')
<div class="modal-header">
	<h5 id="modal-label" class="modal-title">Delete {{ $person->name }}?</h5>
	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<p>Are you sure you wish to delete? (There is no undo.)</p>
</div>
<div class="modal-footer">
	<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	{!! Form::open(['method' => 'DELETE','route' => ['people.destroy', $person->id],'style'=>'display:inline']) !!}{!! Form::button('OK', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}{!! Form::close() !!}
</div>
@endsection