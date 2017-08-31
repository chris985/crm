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
					<div class="col-md-6">
						<label class="text-muted" for="first"><i class="text-muted fa fa-user fa-fw mr-1"></i>First</label>
						<input id="first" class="form-control" name="first" type="text" aria-describedby="first">
					</div>
					<div class="col-md-6">
						<label class="text-muted" for="lat"><i class="text-muted fa fa-diamond fa-fw mr-1"></i>Last</label>
						<input id="last" class="form-control" name="last" type="text" aria-describedby="last">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-5">
						<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Title</label>
						<input id="title" class="form-control" name="title" type="text" aria-describedby="title">
					</div>
					<div class="col-md-7">
						<label class="text-muted" for="palces"><i class="text-muted fa fa-building fa-fw mr-1"></i>Places</label>
						{!! Form::select('places[]', $places, null, ['multiple' => 'multiple', 'class' => 'form-control select multiple']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="form-group row">
			<div class="col-md-6 mb-3">
				<label class="text-muted" for="phone"><i class="text-muted fa fa-phone fa-fw mr-1"></i>Phone</label>
				<input id="phone" class="form-control" name="phone" type="text" aria-describedby="phone">
			</div>
			<div class="col-md-6">
				<label class="text-muted" for="email" ><i class="text-muted fa fa-envelope fa-fw mr-1"></i>Email</label>
				<input id="email" class="form-control" name="email" type="text" aria-describedby="email">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-6 mb-3">
				<label class="text-muted" for="alt" ><i class="text-muted fa fa-mobile fa-fw mr-1"></i>Alt</label>
				<input id="alt" class="form-control" name="alt" type="text" aria-describedby="alt">
			</div>
			<div class="col-md-6">
				<label class="text-muted" for="web"><i class="text-muted fa fa-external-link fa-fw mr-1"></i>Web</label>
				<input id="web" class="form-control" name="web" type="text" aria-describedby="web">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-12">
				<label for="note" class="text-muted"><i class="text-muted fa fa-sticky-note fa-fw mr-1"></i>Notes</label>
				<textarea id="note" class="form-control" name="note" rows="3"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-3 mb-3">
				<label class="text-muted" for="email"><i class="text-muted fa fa-sitemap fa-fw mr-1"></i>Category</label>
				<input id="tags" class="form-control" name="tags" type="text" aria-describedby="tags">
			</div>
			<div class="col-md-2 mb-3">
				<label class="text-muted" for="prefix"><i class="text-muted fa fa-venus-mars fa-fw mr-1"></i>Prefix</label>
				<input id="prefix" class="form-control" name="prefix" type="text" aria-describedby="prefix">
			</div>
			<div class="col-md-3 mb-3">
				<label class="text-muted" for="email"><i class="text-muted fa fa-handshake-o fa-fw mr-1"></i>Refer</label>
				<input id="refer" class="form-control" name="refer" type="text" aria-describedby="refer">
			</div>
			<div class="col-md-4 mb-3">
				<label class="text-muted" for="account"><i class="text-muted fa fa-credit-card fa-fw mr-1"></i>Account</label>
				<input id="account" class="form-control" name="account" type="text" aria-describedby="acocunt">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-4 mb-1">
				<label class="text-muted"><i class="text-muted fa fa-photo fa-fw mr-1"></i>Photo</label><br />
				<label class="custom-file">
					{!! Form::file('image', null, array('id' => 'image', 'class' => 'custom-file-control')) !!}
					<span class="custom-file-control"></span>
				</label>
			</div>
			<div class="col-md-8 mb-1">
				<label class="text-muted" for="email"><i class="text-muted fa fa-tags fa-fw mr-1"></i>Tags</label>
				<select id="type" class="form-control" name="type" multiple="multiple">

				</select>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<label></label>
	</div>
</div>
@endsection

@section('aside')
<div class="form-group mb-3">
	<label class="text-white" for="status"><i class="text-white fa fa-eye fa-fw mr-1"></i>Status</label>
	{{ Form::select('status', $person->person_status, $person->status, ['class' => 'form-control']) }}
</div>
<div class="form-group mb-3">
	<label class="text-white" for="type"><i class="text-white fa fa-cubes fa-fw mr-1"></i>Type</label>
	{{ Form::select('type', $person->person_type, $person->type, ['class' => 'form-control']) }}
</div>
@endsection

@section('title')
New
@endsection

@section('actions')
<li class="nav-item"><button class="nav-link btn-link text-white" type="submit"><i class="fa fa-save fa-fw"></i></button></li>
@endsection

@section('page')
mx-3 card-open
@endsection

@section('form-open')
{!! Form::model($person, array('route' => 'people.store', 'method' => 'POST', 'files' => true)) !!}
@endsection

@section('form-close')
{!! Form::close() !!}
@endsection
