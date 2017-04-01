@extends('common.app')
@section('content')
@if ($message = Session::get('success'))
<div class="messages py-1">
    <div class="alert alert-success alert-dismissible fade show mx-3 my-3" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fa fa-times fa-fw"></i></span>
        </button>
        <p><strong>Success!</strong> {{ $message }}.</p>
    </div>
</div>
@endif
@if(!$people->isEmpty())
    @foreach ($people as $key => $person)
    <article class="card">
        <div class="card-block row align-items-center">
            <header class="col-md-6">
                @if (empty($person->image))
                <img class="float-left rounded-circle mr-3" width="80" height="80" src="https://randomuser.me/api/portraits/men/{{ $person->id }}.jpg" alt="" />
                @else
                <img class="float-left rounded-circle mr-3" width="80" height="80" src="media\people\{{ $person->image }}" alt="" />
                @endif
                <h1 class="card-title h4 pt-3"><a class="btn-text" href="{{ route('people.show', $person->id) }}">{{ $person->name }}</a></h1>
                <h6 class="card-subtitle text-muted">
                    @if (!empty($person->title))
                    <i class="fa fa-diamond mr-1"></i>{{ $person->title }}
                    @endif 
                    @if (!empty($person->places))
                    at
                    @foreach ($person->places as $key => $place)
                    <i class="fa fa-building mr-1"></i><a class="btn-text mr-1" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a>
                    @endforeach 
                    @endif
                </h6>
            </header>
            <div class="col-md-3">
                @if (!empty($person->phone))
                <p><i class="text-muted fa fa-phone fa-2x fa-fw mr-1 float-left"></i>{{ $person->phone }}</p>
                @endif
            </div>
            <div class="col-md-3">
                @if (!empty($person->email))
                <p><i class="text-muted fa fa-envelope fa-2x fa-fw mr-1 float-left"></i>{{ $person->email }}</p>
                @endif
            </div>
        </div>
    </article>
    @endforeach
    @else
    <div class="card">
        <div class="card-block row align-items-center">
            <p>No results found</p>
        </div>
    </div>
    @endif
    <div class="py-3 px-3">
        {!! $people->links() !!}
    </div>
@endsection

@section('title')
People
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link" href="{{ route('people.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('page')
mx-3 card-list
@endsection