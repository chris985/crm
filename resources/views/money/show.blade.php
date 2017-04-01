@extends('common')

@section('title')
View
@endsection

@section('back')
<a class="nav-link" href="{{ route('people.index') }}"><i class="fa fa-arrow-left"></i></a>
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link btn btn-primary rounded-circle" href="{{ route('people.edit', $person->id) }}"><i class="fa fa-edit fa-fw"></i></a></li>
<li class="nav-item"><button class="nav-link btn btn-link" type="button" data-toggle="modal" data-target="#modal"><i class="fa fa-trash fa-fw"></i></button></li>
<li class="nav-item"><a class="nav-link btn btn-link" href="{{ route('people.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('aside')
<nav class="nav nav-pills flex-column sticky-top">
    <li class="nav-item"><a class="nav-link" href="#people"><i class="fa fa-group fa-fw mr-1"></i>People</a></li>
    <li class="nav-item"><a class="nav-link" href="#places"><i class="fa fa-building fa-fw mr-1"></i>Places</a></li>
    <li class="nav-item"><a class="nav-link" href="#tasks"><i class="fa fa-leaf fa-fw mr-1"></i>Tasks</a></li>
    <li class="nav-item"><a class="nav-link" href="#time"><i class="fa fa-clock-o fa-fw mr-1"></i>Time</a></li>
    <li class="nav-item"><a class="nav-link" href="#money"><i class="fa fa-money fa-fw mr-1"></i>Money</a></li>
    <li class="nav-item"><a class="nav-link" href="#things"><i class="fa fa-briefcase fa-fw mr-1"></i>Things</a></li>
</nav>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        @if (empty($person->image))
        <img class="float-left img-responsive rounded-circle mr-3" width="160" height="160" src="http://placehold.it/160x160&text=No%20Image" alt="" />
        @else
        <img class="float-left img-responsive rounded-circle mr-3" width="160" height="160" src="../media\people\{{ $person->image }}" alt="" />
        @endif
        <h2 class="h4 card-title pt-5">{{ $person->name }}<span class="float-md-right"><span class="badge badge-pill badge-default">Active</span><span class="badge badge-pill badge-default ml-1">Partner</span></span></h2>
        <p class="card-subtitle text-muted">
            @if (!empty($person->title))
            <i class="fa fa-diamond mr-1"></i>{{ $person->title }}
            @endif
            @if (!empty($person->phone))
            @if (!empty($person->title))
            at
            @endif
            @endif
            @if (!empty($person->places))
            @foreach ($person->places as $key => $place)
                <i class="fa fa-building mx-1"></i><a class="btn-text" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a>
            @endforeach 
            @endif
        </div>
        <div class="card-block">
            <div class="row">
                @if (!empty($person->phone))
                <div class="col-md-6">
                    <div class="row pb-3">
                        <div class="col-md-2">
                            <i class="text-muted fa fa-phone fa-2x fa-fw mr-1"></i>
                        </div>
                        <div class="col">
                            <p><span>{{$person->phone}}<br /><span class="mt-3">{{$person->alt}}</span></p>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($person->email))
                <div class="col-md-6">
                    <div class="row pb-3">
                        <div class="col-md-2">
                            <i class="text-muted fa fa-envelope fa-2x fa-fw mr-1"></i>
                        </div>
                        <div class="col">
                            <p>{{$person->email}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($person->web))
                <div class="col-md-6">
                    <div class="row pb-3">
                        <div class="col-md-2">
                            <i class="text-muted fa fa-globe fa-2x fa-fw mr-1"></i>
                        </div>
                        <div class="col">
                            <p>{{$person->web}}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="card-footer card-block text-muted">
            @if (!empty($person->note))
            <div class="row">
                <div class="col">
                    <i class="text-muted fa fa-sticky-note fa-fw mr-1"></i>{{$person->note}}
                    <hr>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col">
                    <small><i class="text-muted fa fa-id-card fa-fw mr-1"></i>ID#: {{$person->id}}</small>
                </div>
                <div class="col">
                    <small><i class="text-muted fa fa-plus-square fa-fw mr-1"></i>Created: {{$person->created_at}}</small>
                </div>
                <div class="col">
                    <small><i class="text-muted fa fa-pencil-square fa-fw mr-1"></i>Updated: {{$person->updated_at}}</small>
                </div>
            </div>
        </div>
    </div>
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