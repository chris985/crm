@extends('common.app')
@section('content')
<div class="uk-card uk-card-default">
	<div class="uk-card-header">
		<div class="uk-grid-small uk-flex-middle" uk-grid>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="first"><i class="fa fa-fw fa-user uk-margin-small-right"></i>First</label>
				<input class="uk-input" id="first" name="first" type="text">
			</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="last"><i class="fa fa-fw fa-diamond uk-margin-small-right"></i>Last</label>
				<input class="uk-input" id="last" name="last" type="text">
			</p>
			<p class="uk-width-1-3@m">
				<label class="uk-form-label" for="title"><i class="fa fa-fw fa-tag uk-margin-small-right"></i>Title</label>
				<input id="title" class="uk-input" name="title" type="text">
			</p>
			<p class="uk-width-2-3@m">
				<label class="uk-form-label" for="places"><i class="fa fa-fw fa-building uk-margin-small-right"></i>Places</label>
				{!! Form::select('places[]', $places, null, ['multiple' => 'multiple', 'class' => 'uk-input select tags multiple']) !!}
			</p>
		</div>
	</div>
	<div class="uk-card-body">
		<div class="uk-grid-small uk-flex-middle" uk-grid>

			<p class="uk-width-1-1">DETAILS</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="phone"><i class="fa fa-fw fa-phone uk-margin-small-right"></i>Phone</label>
				<input id="phone" class="uk-input" name="phone" type="text">
			</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="alt"><i class="fa fa-fw fa-mobile uk-margin-small-right"></i>Alt</label>
				<input id="alt" class="uk-input" name="alt" type="text">
			</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="email" ><i class="fa fa-fw fa-envelope uk-margin-small-right"></i>Email</label>
				<input id="email" class="uk-input" name="email" type="text">
			</p>
			<p class="uk-width-1-2@m">
				<label class="uk-form-label" for="web"><i class="fa fa-fw fa-external-link uk-margin-small-right"></i>Web</label>
				<input id="web" class="uk-input" name="web" type="text">
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
@endsection

@section('css')
label {
text-transform: uppercase;
}
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

@section('title')
New
@endsection

@section('actions')
<li><button class="uk-button" type="submit"><i class="fa fa-fw fa-save"></i></button></li>
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
