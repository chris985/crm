@extends('common.app')
@section('content')

<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid-small uk-flex-middle" uk-grid>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="first"><i class="fa fa-fw fa-user uk-margin-small-right"></i>First</label>
				<input  class="uk-input" id="first" name="first" type="text" value="{{ $person->first }}">
			</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="last"><i class="fa fa-fw fa-diamond uk-margin-small-right"></i>Last</label>
				<input class="uk-input" id="last" name="last" type="text" value="{{ $person->last }}">
			</p>
			<p class="uk-width-1-3@m">
				<label class="uk-form-label" for="title"><i class="fa fa-fw fa-tag uk-margin-small-right"></i>Title</label>
				<input id="title" class="uk-input" name="title" type="text" value="{{ $person->title }}">
			</p>
			<p class="uk-width-2-3@m">
				<label class="uk-form-label" for="places"><i class="fa fa-fw fa-building uk-margin-small-right"></i>Places</label>
				{{ Form::select('places[]', $places, $selected, ['class' => 'uk-input select tags multiple', 'multiple' => true]) }}

			</p>
		</div>
	</div>
	<div class="uk-card-body">
		<div class="uk-grid-small uk-flex-middle" uk-grid>
			<p class="uk-width-1-1">DETAILS</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="phone"><i class="fa fa-fw fa-phone uk-margin-small-right"></i>Phone</label>
				<input id="phone" class="uk-input" name="phone" type="text" value="{{ $person->phone }}">
			</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="alt"><i class="fa fa-fw fa-mobile uk-margin-small-right"></i>Alt</label>
				<input id="alt" class="uk-input" name="alt" type="text" value="{{ $person->alt }}">
			</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="email" ><i class="fa fa-fw fa-envelope uk-margin-small-right"></i>Email</label>
				<input id="email" class="uk-input" name="email" type="text" value="{{ $person->email }}">
			</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="web"><i class="fa fa-fw fa-external-link uk-margin-small-right"></i>Web</label>
				<input id="web" class="uk-input" name="web" type="text" value="{{ $person->web }}">
			</p>
			<p class="uk-width-1-4@m">
				<label class="uk-form-label" for="facebook"><i class="fa fa-fw fa-facebook uk-margin-small-right"></i>Facebook</label>
				<input id="facebook" class="uk-input" name="facebook" type="text">
			</p>
			<p class="uk-width-1-4@m">
				<label class="uk-form-label" for="twitter"><i class="fa fa-fw fa-twitter uk-margin-small-right"></i>Twitter</label>
				<input id="twitter" class="uk-input" name="twitter" type="text">
			</p>
			<p class="uk-width-1-4@m">
				<label class="uk-form-label" for="linkedin"><i class="fa fa-fw fa-linkedin uk-margin-small-right"></i>LinkedIn</label>
				<input id="linkedin" class="uk-input" name="linkedin" type="text">
			</p>
			<p class="uk-width-1-4@m">
				<label class="uk-form-label" for="google"><i class="fa fa-fw fa-google uk-margin-small-right"></i>Google</label>
				<input id="google" class="uk-input" name="google" type="text">
			</p>
			<p class="uk-width-1-3@m">
				<label class="uk-form-label" for="prefix"><i class="fa fa-fw fa-venus-mars uk-margin-small-right"></i>Prefix</label>
				{!! Form::select('prefix', ['' => 'Unspecified', 'mr'=>'Mr.', 'mrs' => 'Mrs.', 'ms' => 'Ms.'], null, ['class' => 'uk-input select tags']) !!}
			</p>
			<p class="uk-width-1-3@m">
				<label class="uk-form-label" for="prefix"><i class="fa fa-fw fa-venus-mars uk-margin-small-right"></i>Suffix</label>
				{!! Form::select('suffix', ['' => 'Unspecified', 'sr'=>'Sr.', 'ii' => 'II', 'ms' => 'Ms.'], null, ['class' => 'uk-input select tags']) !!}
			</p>
			<div class="uk-width-1-3@m">
				<div>
					<label class="uk-form-label"><i class="fa fa-fw fa-photo uk-margin-small-right"></i>Photo</label>
					<div uk-form-custom="target: true">
						{!! Form::file('image', null, array('id' => 'image', 'class' => 'uk-input custom-file-control',  'placeholder' => 'Select a File...')) !!}
						<input class="uk-input" type="text" placeholder="Select file" disabled>
					</div>
				</div>
			</div>
			<p class="uk-width-1-1">ACCOUNT</p>
			<p class="uk-width-1-3">
				<label class="uk-form-label" for="account"><i class="fa fa-fw fa-credit-card uk-margin-small-right"></i>Number</label>
				<input id="phone" class="uk-input" name="account" type="text">
			</p>
			<p class="uk-width-1-3">
				<label class="uk-form-label" for="user"><i class="fa fa-fw fa-user-o uk-margin-small-right"></i>Manager</label>
				{{ Form::select('user', $person->person_type, $person->type, ['class' => 'uk-input select tags']) }}
			</p>
			<p class="uk-width-1-3">
				<label class="uk-form-label" for="refer"><i class="fa fa-fw fa-handshake-o uk-margin-small-right"></i>Referral</label>
				{{ Form::select('refer', $person->person_type, $person->type, ['class' => 'uk-input select tags']) }}
			</p>
		</div>
	</div>
	<div class="uk-card-footer">
		<a href="#" class="uk-button uk-button-primary">Save</a> <a href="#" class="uk-button uk-button-text uk-margin-left">Cancel</a>
	</div>
</div>

<!-- -->
<hr>
<article class="card">
	<div class="card-header">

	</div>
	<div class="card-block">
		<div class="row">
		
		
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

@section('aside')
<div class="uk-grid-small uk-flex-middle" uk-grid>
	<p class="uk-width-1-1">
		<label class="uk-form-label" for="status"><i class="fa fa-fw fa-eye uk-margin-small-right"></i>Status</label>
		{{ Form::select('status', $person->person_status, $person->status, ['class' => 'uk-input']) }}
	</p>
	<p class="uk-width-1-1">
		<label class="uk-form-label" for="type"><i class="fa fa-fw fa-cubes uk-margin-small-right"></i>Type</label>
		{{ Form::select('type', $person->person_type, $person->type, ['class' => 'uk-input']) }}
	</p>
	<p class="uk-width-1-1">
		<label class="uk-form-label" for="type"><i class="fa fa-fw fa-sitemap uk-margin-small-right"></i>Category</label>
		{{ Form::select('type', $person->person_type, $person->type, ['class' => 'uk-input']) }}
	</p>
	<p class="uk-width-1-1">
		<label class="uk-form-label" for="note"><i class="fa fa-fw fa-sticky-note uk-margin-small-right"></i>Notes</label>
		<textarea class="uk-textarea" id="note" name="note" rows="3"></textarea>
	</p>
	<p class="uk-width-1-1">
		<label class="uk-form-label" for="type"><i class="fa fa-fw fa-tags uk-margin-small-right"></i>Tags</label>
		{{ Form::select('tags', $person->person_type, $person->type, ['multiple' => 'multiple', 'class' => 'uk-input select multiple']) }}
	</p>
</div>
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