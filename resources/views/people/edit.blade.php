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
<article class="card">
	<div class="card-header">
		<div class="row">
			<div class="col main">
				<div class="form-group row">
					<div class="col-md-6">
						<label class="text-muted" for="first"><i class="text-muted fa fa-user fa-fw mr-1"></i>First</label>
						<input id="first" class="form-control" name="first" type="text" value="{{ $person->first }}" aria-describedby="first">
					</div>
					<div class="col-md-6">
						<label class="text-muted" for="last"><i class="text-muted fa fa-diamond fa-fw mr-1"></i>Last</label>
						<input id="last" class="form-control" name="last" type="text" value="{{ $person->last }}" aria-describedby="last">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-5">
						<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Title</label>
						<input id="title" class="form-control" name="title" type="text" value="{{ $person->title }}" aria-describedby="title" >
					</div>
					<div class="col-md-7">
						<label class="text-muted" for="places"><i class="text-muted fa fa-building fa-fw mr-1"></i>Places</label>
						{{ Form::select('places[]', $places, $selected, ['class' => 'form-control', 'multiple' => true]) }}
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="text-muted" for="status"><i class="text-muted fa fa-eye fa-fw mr-1"></i>Status</label>
 					{{ Form::select('status', $person->person_status, $person->status, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					<label for="type"><i class="text-muted fa fa-cubes fa-fw mr-1"></i>Type</label>
 					{{ Form::select('type', $person->person_type, $person->type, ['class' => 'form-control']) }}
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
					<label class="text-muted" for="web"><i class="text-muted fa fa-external-link fa-fw mr-1"></i>Web</label>
					<input id="web" class="form-control" name="web" type="text" aria-describedby="web" value="{{ $person->web }}">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col">
				<label class="text-muted" for="note"><i class="text-muted fa fa-sticky-note fa-fw mr-1"></i>Notes</label>
				<textarea id="note" class="form-control" name="note" rows="3" aria-describedby="note">{{ $person->note }}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-3">
				<label class="text-muted" for="category"><i class="text-muted fa fa-sitemap fa-fw mr-1"></i>Category</label>
				<input id="category" class="form-control" name="category" type="text" value="{{ $person->category }}" aria-describedby="category">
			</div>
			<div class="col-md-2">
				<label class="text-muted" for="prefix"><i class="text-muted fa fa-venus-mars fa-fw mr-1"></i>Prefix</label>
				<input id="prefix" class="form-control" name="prefix" type="text" value="{{ $person->prefix }}" aria-describedby="prefix">
			</div>
			<div class="col-md-3">
				<label class="text-muted" for="email"><i class="text-muted fa fa-handshake-o fa-fw mr-1"></i>Refer</label>
				<input id="refer" class="form-control" name="refer" type="text" value="{{ $person->refer }}" aria-describedby="refer">
			</div>
			<div class="col-md-4">
				<label class="text-muted" for="account"><i class="text-muted fa fa-credit-card fa-fw mr-1"></i>Account</label>
				<input id="account" class="form-control" name="account" type="text" value="{{ $person->account }}" aria-describedby="acocunt">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-4">
				<label><i class="text-muted fa fa-photo fa-fw mr-1"></i>Photo</label><br />
				@if (empty($person->image))
				<img class="float-left rounded-circle mr-3" width="40" height="40" src="https://randomuser.me/api/portraits/men/{{ $person->id }}.jpg" alt="" />
				@else
				<img class="float-left rounded-circle mr-3" width="40" height="40" src="/../../storage/app/people/{{ $person->image }}" alt="" />
				@endif
				<label class="text-muted custom-file">
					{{ Form::file('image', null, array('id' => 'image', 'class' => 'custom-file-control')) }}
					<span class="custom-file-control"></span>
				</label>
				<p class="my-1"><input id="delete" name="delete" type="checkbox" aria-describedby="remove"> Delete</p>
			</div>
			<div class="col-md-8">
				<label class="text-muted" for="email"><i class="text-muted fa fa-tags fa-fw mr-1"></i>Tags</label>
					<select id="type" class="form-control" name="type" multiple="multiple">
						
					</select>
			</div>
		</div>
	</div>
	<div class="card-footer text-muted">
        <div class="row align-items-center">
            <div class="col-md-4">
                <small><i class="fa fa-id-card fa-fw mr-1 text-muted"></i>ID#: {{ $person->id }}</small>
            </div>
            <div class="col-md-4">
                <small><i class="fa fa-plus-square fa-fw text-muted"></i>Created: {{ $person->created_at }}</small>
            </div>
            <div class="col-md-4">
                <small><i class="fa fa-pencil-square fa-fw text-muted"></i>Updated: {{ $person->updated_at }}</small>
            </div>
        </div>
	</div>
</article>
@endsection

@section('title')
Edit
@endsection

@section('page')
mx-3 card-open
@endsection

@section('actions')
<li class="nav-item"><button class="nav-link btn-link" type="submit" ><i class="fa fa-save fa-fw"></i></button></li>
<li class="nav-item"><button class="nav-link btn-link" type="button" data-toggle="modal" data-target="#modal"><i class="fa fa-trash fa-fw"></i></button></li>
@endsection

@section('form-open')
{!! Form::model($person, ['method' => 'PATCH', 'files' => true, 'route' => ['people.update', $person->id]]) !!}
@endsection

@section('form-close')
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