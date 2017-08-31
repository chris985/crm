
@extends('common.app')
@section('content')
<article class="card">
    <div class="card-header">
        @if (empty($place->image))
        <img class="float-left img-responsive rounded-circle mr-3" width="160" height="160" src="http://lorempixel.com/160/160/city/{{ $place->id }}" alt="" />
        @else
        <img class="float-left img-responsive rounded-circle mr-3" width="160" height="160" src="/../../storage/app/places/{{ $place->image }}" alt="" />
        @endif
        <p class="px-1 py-1 float-right"><span class="badge badge-default">{{ $place->real_status }}</span><span class="ml-3 badge badge-default">{{ $place->real_type }}</span></p>
        <h1 class="h4 card-title pt-5">
            {{ $place->name }}
        </h1>
        <h6 class="card-subtitle text-muted">
            @if (!empty($person->division))
            <i class="fa fa-tag mr-1"></i>{{ $place->division }}
            @endif
        </h6>
    </div>
    <div class="card-block row">
        @if (!empty($place->address OR $place->address2 OR $place->city OR $place->state OR $place->zip OR $place->country))
        <div class="col-md-4 pb-3">
            <p><i class="text-muted fa fa-home fa-2x fa-fw float-left mr-4 mb-4"></i></p>
            @if (!empty($place->address))
            {{ $place->address }},
            @endif
            @if (!empty($place->address2))
            <br />{{ $place->address2 }},
            @endif
            @if (!empty($place->city))
            <br />{{ $place->city }},
            @endif
            @if (!empty($place->state))
            {{ $place->state }},
            @endif
            @if (!empty($place->zip))
            {{ $place->zip }}
            @endif
            @if (!empty($place->country))
            <br />{{ $place->country }}
            @endif
        </div>
        @endif
        @if (!empty($place->phone))
        <div class="col-md-3 py-1">
            <p class="float-left mr-3"><i class="fa fa-phone fa-2x fa-fw text-muted"></i></p>
            <p>{{ $place->phone }}<br />{{ $place->alt }}</p>
        </div>
        @endif
        @if (!empty($place->email))
        <div class="col-md-3 py-1">
            <p class="float-left mr-3"><i class="fa fa-envelope fa-2x fa-fw text-muted"></i></p>
            <p>{{ $place->email }}</p>
        </div>
        @endif
        @if (!empty($place->fax))
        <div class="col-md-3 py-1">
            <p class="float-left mr-3"><i class="fa fa-fax fa-2x fa-fw text-muted"></i></p>
            <p>{{ $place->fax }}</p>
        </div>
        @endif
        @if (!empty($place->category))
        <div class="col-md-3 py-1">
            <p class="float-left mr-3"><i class="fa fa-external-link fa-2x fa-fw text-muted"></i></p>
            <p>{{ $place->category }}</p>
        </div>
        @endif
        @if (!empty($place->refer))
        <div class="col-md-3 py-1">
            <p class="float-left mr-3"><i class="fa fa-handshake-o fa-2x fa-fw text-muted"></i></p>
            <p>{{ $place->refer }}</p>
        </div>
        @endif
        @if (!empty($place->account))
        <div class="col-md-3 py-1">
            <p class="float-left mr-3"><i class="fa fa-credit-card fa-2x fa-fw text-muted"></i></p>
            <p>{{ $place->account }}</p>
        </div>
        @endif
    </div>
    @if (!empty($place->note))
    <div class="card-block row">
        <div class="col-md-12 py-1">
            <hr>
            <i class="fa fa-sticky-note mr-1 text-muted"></i>Notes: <br />
            {{ $place->note }}
        </div>
    </div>
    @endif
    <div class="card-footer card-block">
        <div class="row align-items-center">
            <div class="col-md-4">
                <small><i class="fa fa-id-card fa-fw mr-1 text-muted"></i>ID#: {{ $place->id }}</small>
            </div>
            <div class="col-md-4">
                <small><i class="fa fa-plus-square fa-fw text-muted"></i>Created: {{ $place->created_at }}</small>
            </div>
            <div class="col-md-4">
                <small><i class="fa fa-pencil-square fa-fw text-muted"></i>Updated: {{ $place->updated_at }}</small>
            </div>
        </div>
    </div>
    @if(!$place->people->isEmpty())
    <div class="related px-3 py-3">
        <h2>People</h2>
        @foreach ($place->people as $key => $person)
        <div class="card-list">
            <div class="card">
                <div class="card-block row align-items-center">
                    <header class="col-md-6">
                        @if (empty($person->image))
                        <img class="float-left rounded-circle mr-3" width="80" height="80" src="https://randomuser.me/api/portraits/men/{{ $person->id }}.jpg" alt="" />
                        @else
                        <img class="float-left rounded-circle mr-3" width="80" height="80" src="media\people\{{ $person->image }}" alt="" />
                        @endif
                        <h2 class="h4 card-title pt-3"><a class="btn-text" href="{{ route('people.show', $person->id) }}">{{ $person->name }}</a></h2>
                        <h6 class="card-subtitle text-muted">
                            {{ $person->title }}
                        </h6>
                    </header>
                    @if (!empty($person->phone))
                    <div class="col-md-3">
                        <p><i class="text-muted fa fa-phone fa-2x fa-fw mr-1 float-left"></i>{{ $person->phone }}</p>
                    </div>
                    @endif
                    @if (!empty($person->email))<div class="col-md-3">
                    <p><i class="text-muted fa fa-envelope fa-2x fa-fw mr-1 float-left"></i>{{ $person->email }}</p>
                </div>
                @endif
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

@section('page')
mx-3 card-open
@endsection

@section('back')
<li class="nav-item"><a href="{{ route('places.index') }}"><i class="fa fa-arrow-left fa-fw mr-1"></i></a></li>
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link btn-link text-white" href="{{ route('places.edit', $place->id) }}"><i class="fa fa-edit fa-fw"></i></a></li>
<li class="nav-item"><button class="nav-link btn-link text-white" type="button" data-toggle="modal" data-target="#modal"><i class="fa fa-trash fa-fw"></i></button></li>
<li class="nav-item"><a class="nav-link btn-link text-white" href="{{ route('places.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('modal')
<div class="modal-header">
    <h5 class="modal-title" id="modal-label">Delete {{ $place->name }}?</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>Are you sure you wish to delete? (There is no undo.)</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    {!! Form::open(['method' => 'DELETE','route' => ['places.destroy', $place->id],'style'=>'display:inline']) !!}{!! Form::button('OK', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}{!! Form::close() !!}
</div>
@endsection
