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
@if(!$places->isEmpty())
<div class="card-list">
@foreach ($places as $key => $place)
<article class="card my-3 p-1">
    <div class="card-block row align-items-center">
        <header class="col-md-6">
            @if (empty($place->image))
            <img class="float-left img-responsive rounded-circle mr-3" width="80" height="80" src="http://lorempixel.com/80/80/city/{{ $place->id }}" alt="" />
            @else
            <img class="float-left img-responsive rounded-circle mr-3" width="80" height="80" src="/../../storage/app/places/{{ $place->image }}" alt="" />
            @endif
            <h1 class="card-title h4 pt-3"><a class="btn-text" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a></h1>
            <p class="card-subtitle text-muted">
                @if (!empty($place->address))
                {{ $place->address }},
                @endif
                @if (!empty($place->address2))
                {{ $place->address2 }},
                @endif
                @if (!empty($place->city))
                {{ $place->city }},
                @endif
                @if (!empty($place->state))
                {{ $place->state }},
                @endif
                @if (!empty($place->zip))
                {{ $place->zip }}
                @endif
            </p>
        </header>
        @if (!empty($place->phone))
        <div class="col-md-3">
            <p class="peek"><i class="text-muted fa fa-phone fa-2x fa-fw mr-1 float-left"></i>{{ $place->phone }}</p>
        </div>
        @endif
        @if (!empty($place->email))
        <div class="col-md-3">
            <p class="peek"><i class="text-muted fa fa-envelope fa-2x fa-fw mr-1 float-left"></i>{{ $place->email }}</p>
        </div>
        @endif
    </div>
</article>
@endforeach
</div>
@else
<div class="card">
    <div class="card-block row align-items-center">
        <p>No results found</p>
    </div>
</div>
@endif
<div class="py-3 px-3">
    {!! $places->links() !!}
</div>
@endsection

@section('title')
Places
@endsection

@section('page')
mx-3 card-list
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link" href="{{ route('places.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection
