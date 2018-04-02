@extends('common.app')
@section('content')
<div class="card-list">
	@if(!$people->isEmpty())
	@foreach ($people as $key => $person)
	<article class="uk-comment uk-card-hover uk-card-body">
		<header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
			<div class="uk-width-auto">
				@if (empty($person->image))
				<img class="uk-border-circle" width="80" height="80" src="https://randomuser.me/api/portraits/men/{{ $person->id }}.jpg" alt="" />
				@else
				<img class="uk-border-circle" width="80" height="80" src="{{ Storage::url('people/' . $person->image) }}" alt="" />
				@endif
			</div>
			<div class="uk-width-expand">
				<h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="{{ route('people.show', $person->id) }}">{{ $person->name }}</a></h4>
				<ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
					<li>
						@if (!empty($person->title))
						<i class="fa fa-fw fa-tag uk-margin-small-right"></i>{{ $person->title }}
						@endif
						@if (!$person->places->isEmpty())
						at<i class="fa fa-fw fa-building uk-margin-small-left uk-margin-small-right"></i>
						@foreach ($person->places as $key => $place)
						<a class="" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a>
						@endforeach
						@endif
					</li>
					@if (!empty($person->phone))<li><i class="fa fa-fw fa-phone uk-margin-small-right"></i>{{ $person->phone }}</li>@endif
					@if (!empty($person->email))<li><i class="fa fa-fw fa-envelope uk-margin-small-right"></i>{{ $person->email }}</li>@endif
				</ul>
			</div>
		</header>
	</article>
	@endforeach
	@else
	<p>No results found</p>
	@endif
</div>
<div class="py-3 px-3">
	{!! $people->links() !!}
</div>
@endsection

@section('title')
People
@endsection

@section('icon')
groups
@endsection

@section('actions')
<li><a href="{{ route('people.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('page')
mx-3 card-list
@endsection
