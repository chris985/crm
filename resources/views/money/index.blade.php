@extends('common')

@section('title')
People
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link btn btn-primary rounded-circle" href="{{ route('people.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-times fa-fw"></i></span>
    </button>
    <p><strong>Success!</strong> {{ $message }}.</p>
</div>
@endif

@foreach ($people as $key => $person)
<article class="card card card-hover flex-row align-items-center my-3 row">
    <div class="col-md-7 col-xs-12 card-block p-3">
        @if (empty($person->image))
        <img class="float-left img-responsive rounded-circle mr-3" width="80" height="80" src="http://placehold.it/160x160&text=No%20Image" alt="" />
        @else
        <img class="float-left img-responsive rounded-circle mr-3" width="80" height="80" src="media\people\{{ $person->image }}" alt="" />
        @endif
        <h2 class="h4 card-title pt-3"><a class="btn-text" href="{{ route('people.show', $person->id) }}">{{ $person->name }}</a></h2>
        <p class="card-subtitle text-muted">
            @if (!empty($person->title))
            <i class="fa fa-diamond mr-1"></i>{{ $person->title }}
            @endif

            @if (!empty($person->places))
            at
            @foreach ($person->places as $key => $place)
                <i class="fa fa-building mr-1"></i><a class="btn-text mr-1" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a>
            @endforeach 
            @endif
        </p>
    </div>
    @if (!empty($person->phone))
    <div class="col-md-2 col-xs-12 card-block p-3">
        <p><i class="text-muted fa fa-phone fa-2x fa-fw mr-1 float-left"></i>{{ $person->phone }}</p>
    </div>
    @endif
    @if (!empty($person->email))
    <div class="col-md-3 col-xs-12 card-block p-3">
        <p><i class="text-muted fa fa-envelope fa-2x fa-fw mr-1 float-left"></i>{{ $person->email }}</p>
    </div>
    @endif
</article>
@endforeach

{!! $people->links() !!}

@endsection