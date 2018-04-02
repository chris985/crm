@extends('common.app')
@section('content')
<article class="uk-card uk-card-default">
	<p class="uk-card-badge uk-label"><i class="fa fa-fw fa-cubes uk-margin-small-right"></i>{{ $person->real_type }}</p>
	<header class="uk-card-header">
		<div class="uk-grid-small uk-flex-middle" uk-grid>
			<div class="uk-width-auto">
				@if (empty($person->image))
				<img class="uk-border-circle" width="160" height="160" src="https://randomuser.me/api/portraits/men/{{ $person->id }}.jpg" alt="" />
				@else
				<img class="uk-border-circle" width="160" height="160" src="{{ Storage::url('people/' . $person->image) }}" alt="" />
				@endif
			</div>
			<div class="uk-width-expand">
				<h3 class="uk-card-title uk-margin-remove-bottom">@if (!empty($person->prefix))<span class="uk-text-muted uk-margin-small-right">{{ $person->prefix }}</span>@endif{{ $person->name }}</h3>
				<p class="uk-text-meta uk-margin-remove-top">
					@if (!empty($person->title))
					<i class="fa fa-fw fa-tag uk-margin-small-right"></i>{{ $person->title }}
					@endif 
					@if (!$person->places->isEmpty())
					at <i class="fa fa-building mx-1"></i>
					@foreach ($person->places as $key => $place)
					<a class="btn-text mr-1" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a>
					@endforeach
					@endif
				</p>
			</div>
		</div>
	</header>
	<div class="uk-card-body uk-grid">
		<div class="uk-width-1-4">
			<ul class="uk-tab-left" uk-tab="connect: #switcher"><li><a href="#">Details</a></li><li><a href="#">Account</a></li><li><a href="#">Notes</a></li></ul>
		</div>
		<div class="uk-width-expand">
			<ul id="switcher" class="uk-switcher">
				<li class="uk-margin-remove-top" uk-grid>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-phone uk-align-left"></i><span class="label uk-article-meta">PHONE</span><br />{{ $person->phone }}<br />{{ $person->alt }}</p>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-envelope uk-align-left"></i><span class="label uk-article-meta">EMAIL</span><br />{{ $person->email }}</p>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-external-link uk-align-left"></i><span class="label uk-article-meta">WEBSITE</span><br /><span class="uk-text-break">{{ $person->web }}</span></p>
					<p class="uk-width-1-2">
						<i class="fa fa-fw fa-2x fa-hashtag uk-align-left"></i><span class="label uk-article-meta">SOCIAL</span><br />
						<span class="fa-stack">
							<i class="fa fa-circle-thin fa-stack-2x"></i>
							<i class="fa fa-facebook fa-stack-1x"></i>
						</span>
						<span class="fa-stack">
							<i class="fa fa-circle-thin fa-stack-2x"></i>
							<i class="fa fa-twitter fa-stack-1x"></i>
						</span>

						<span class="fa-stack">
							<i class="fa fa-circle-thin fa-stack-2x"></i>
							<i class="fa fa-linkedin fa-stack-1x"></i>
						</span>

						<span class="fa-stack">
							<i class="fa fa-circle-thin fa-stack-2x"></i>
							<i class="fa fa-google fa-stack-1x"></i>
						</span>
					</p>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-tags uk-align-left"></i><span class="label uk-article-meta">TAGS</span><br />{{ $person->tags }}</p>
				</li>
				<li class="uk-margin-remove-top" uk-grid>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-credit-card uk-align-left"></i><span class="label uk-article-meta">ACCOUNT NUMBER</span><br />{{ $person->account }}</p>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-user-circle uk-align-left"></i><span class="label uk-article-meta">ACCOUNT MANAGER</span><br />{{ $person->account }}</p>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-eye uk-align-left"></i><span class="label uk-article-meta">STATUS</span><br />{{ $person->status }}</p>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-cubes uk-align-left"></i><span class="label uk-article-meta">TYPE</span><br />{{ $person->real_type }}</p>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-sitemap uk-align-left"></i><span class="label uk-article-meta">CATEGORY</span><br />{{ $person->category }}</p>
					<p class="uk-width-1-2"><i class="fa fa-fw fa-2x fa-handshake-o uk-align-left"></i><span class="label uk-article-meta">REFERRER</span><br />{{ $person->refer }}</p>

				</li>
				<li class="uk-margin-remove-top" uk-grid>
					<p class="uk-width-1-1"><i class="fa fa-fw fa-2x fa-sticky-note uk-align-left"></i><span class="label uk-article-meta">NOTES</span><br />{{ $person->note }}</p>
				</li>
			</ul>
		</div>
	</div>
	<footer class="uk-card-footer">
		<p><small><i class="fa fa-fw fa-id-card fa-fw uk-margin-small-right"></i>{{ $person->id }}
			<i class="fa fa-fw fa-plus-square uk-margin-small-left uk-margin-small-right"></i>{{ $person->created_at }}
			<i class="fa fa-fw fa-pencil-square uk-margin-small-left uk-margin-small-right"></i>{{ $person->updated_at }}</small>
		</p>
	</footer>
</article>
@endsection

@section('aside')
<div class="uk-card uk-card-body">
	<ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
		<li class="uk-nav-header">Actions</li>
		<li><a href="#"><i class="fa fa-fw fa-phone uk-margin-small-right"></i>Call Primary</a></li>
		<li><a href="#"><i class="fa fa-fw fa-mobile uk-margin-small-right"></i>Call Secondary</a></li>
		<li><a href="#"><i class="fa fa-fw fa-envelope uk-margin-small-right"></i>Send Email</a></li>
		<li class="uk-parent">
			<a href="#"><i class="fa fa-fw fa-plus uk-margin-small-right"></i>New...</a>
			<ul class="uk-nav-sub">
				<li><a href="#"><i class="fa fa-fw fa-tag uk-margin-small-right"></i>Task</a></li>
				<li><a href="#"><i class="fa fa-fw fa-building uk-margin-small-right"></i>Place</a></li>
				<li><a href="#"><i class="fa fa-fw fa-briefcase uk-margin-small-right"></i>Project</a></li>
				<li><a href="#"><i class="fa fa-fw fa-page uk-margin-small-right"></i>Invoice</a></li>
				<li><a href="#"><i class="fa fa-fw fa-calendar uk-margin-small-right"></i>Appointment</a></li>
			</ul>
		</li>
		<li class="uk-nav-header">Related</li>
		<li><a href="#"><i class="fa fa-fw fa-building uk-margin-small-right"></i></span> Places</a></li>
		<li><a href="#"><i class="fa fa-fw fa-tag uk-margin-small-right"></i> Tasks</a></li>
		<li><a href="#"><i class="fa fa-fw fa-briefcase uk-margin-small-right"></i> Projects</a></li>
		<li class="uk-nav-divider"></li>
		<li><a href="#"><i class="fa fa-fw fa-tag uk-margin-small-right"></i> Item</a></li>
	</ul>
</div>
@endsection

@section('title')
View
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link" href="{{ route('people.edit', $person->id) }}"><i class="fa fa-edit fa-fw"></i></a></li>
<li class="nav-item"><a class="nav-link" href="#modal" uk-toggle><i class="fa fa-trash fa-fw"></i></a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('people.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('page')
mx-3 card-open
@endsection

@section('modal')
<div id="modal" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header">
			<h2 class="uk-modal-title">Delete {{ $person->name }}?</h2>
		</div>
		<div class="uk-modal-body">
			<p>Are you sure you wish to delete? (There is no undo.)</p>
		</div>
		<div class="uk-modal-footer uk-text-right">
			{!! Form::open(['method' => 'DELETE','route' => ['people.destroy', $person->id],'style'=>'display:inline']) !!}{!! Form::button('OK', ['class'=>'uk-button uk-button-primary', 'type'=>'submit']) !!}{!! Form::close() !!}
			<button class="uk-button uk-button-text uk-modal-close" type="button">Cancel</button>
		</div>
	</div>
</div>
@endsection
