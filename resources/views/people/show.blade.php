@extends('common.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show mx-3 my-3" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-times fa-fw"></i></span>
    </button>
    <p><strong>Success!</strong> {{ $message }}.</p>
</div>
@endif
<article class="card">
    <div class="card-header">
        @if (empty($person->image))
        <img class="float-left rounded-circle mr-3" width="160" height="160" src="https://randomuser.me/api/portraits/men/{{ $person->id }}.jpg" alt="" />
        @else
        <img class="float-left rounded-circle mr-3" width="160" height="160" src="../media\people\{{ $person->image }}" alt="" />
        @endif
        <p class="px-1 py-1 float-right"><span class="badge badge-default">{{ $person->status }}</span><span class="ml-3 badge badge-default">{{ $person->type }}</span></p>
        <h1 class="h4 card-title pt-5">{{ $person->name }}</h1>
        <p class="card-subtitle text-muted">
            @if (!empty($person->title))
            <i class="fa fa-diamond mr-1"></i>{{ $person->title }}
            @endif
            @if (!empty($person->places))
            @foreach ($person->places as $key => $place)
            <i class="fa fa-building mx-1"></i><a class="btn-text" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a>
            @endforeach 
            @endif
        </p>
    </div>
    <div class="card-block row">
        <div class="col-md-3">
            @if (!empty($person->phone))
            <p class="float-left mr-3"><i class="fa fa-phone fa-2x fa-fw text-muted"></i></p>
            <p>{{$person->phone}}<br />{{$person->alt}}</p>
            @endif
        </div>
        <div class="col-md-3 py-1">
            @if (!empty($person->email))
            <p class="float-left mr-3"><i class="fa fa-envelope fa-2x fa-fw text-muted"></i></p>
            <p>{{$person->email}}</p>
            @endif
        </div>
        <div class="col-md-3 py-1">
            @if (!empty($person->web))
            <p class="float-left mr-3"><i class="fa fa-external-link fa-2x fa-fw text-muted"></i></p>
            <p>{{$person->web}}</p>
            @endif
        </div>
        <div class="col-md-3 py-1">
            @if (!empty($person->web))
            <p class="float-left mr-3"><i class="fa fa-external-link fa-2x fa-fw text-muted"></i></p>
            <p>{{$person->web}}</p>
            @endif
        </div>
    </div>
    <div class="card-block row">
        <div class="col-md-12 py-1">
            @if (!empty($person->note))
            <hr>
            <i class="fa fa-sticky-note mr-1 text-muted"></i>Notes: <br />
            {{$person->note}}
            @endif
        </div>
    </div>
    <div class="card-footer card-block">
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
    @if(!$person->places->isEmpty())
    <div class="related px-3 py-3">
        <h2>Places</h2>
        @foreach ($person->places as $key => $place)
        <div class="card-list">
            <div class="card">
                <div class="card-block row align-items-center">
                    <header class="col-md-6">
                        @if (empty($person->image))
                        <img class="float-left rounded-circle mr-3" width="80" height="80" src="http://lorempixel.com/80/80/city/{{ $place->id }}" alt="" />
                        @else
                        <img class="float-left rounded-circle mr-3" width="80" height="80" src="/media/places/{{ $place->image }}" alt="" />
                        @endif
                        
                        <h2 class="h4 card-title pt-3"><a class="btn-text" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a></h2>
                        <h6 class="card-subtitle text-muted">
                            {{ $place->address }} {{ $place->address2 }}, {{ $place->city }} {{ $place->state }} {{ $place->zip }}
                        </h6>
                    </header>
                    <div class="col-md-3">
                        @if (!empty($place->phone))
                        <p><i class="text-muted fa fa-phone fa-2x fa-fw mr-1 float-left"></i>{{ $person->phone }}</p>
                        @endif
                    </div>
                    <div class="col-md-3">
                        @if (!empty($place->email))
                        <p><i class="text-muted fa fa-envelope fa-2x fa-fw mr-1 float-left"></i>{{ $person->email }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</article>
@endsection

@section('title')
View
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link" href="{{ route('people.edit', $person->id) }}"><i class="fa fa-edit fa-fw"></i></a></li>
<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modal"><i class="fa fa-trash fa-fw"></i></a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('people.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('page')
mx-3 card-open
@endsection

@section('modal')
<div class="modal-header">
    <h5 class="modal-title" id="modal-label">Delete {{ $person->name }}?</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>Are you sure you wish to delete? (There is no undo.)</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    {!! Form::open(['method' => 'DELETE','route' => ['people.destroy', $person->id],'style'=>'display:inline']) !!}{!! Form::button('OK', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}{!! Form::close() !!}
</div>
@endsection