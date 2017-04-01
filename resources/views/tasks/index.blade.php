@extends('common')

@section('title')
Tasks
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link btn btn-primary rounded-circle" href="{{ route('tasks.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
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

@foreach ($tasks as $key => $task)


<article class="card card-transparent card-hover flex-row align-items-center my-3 row">
    <div class="col-md-7 col-xs-12 card-block p-3">
        <img class="float-left img-responsive rounded-circle mr-3" width="80" height="80" src="http://placehold.it/160x160?text={{ $task->id }}" alt="" />

        <h2 class="h4 card-title pt-3"><a class="btn-text" href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></h2>
        <p class="card-subtitle text-muted">
        @if (!empty($task->people))
            @foreach ($task->people as $key => $person)
                <a class="btn-text" href="{{ route('people.show', $person->id) }}">{{ $person->name }}</a>
            @endforeach
        @endif
        @if (!empty($task->places))
            @foreach ($task->places as $key => $place)
                at <a class="btn-text" href="{{ route('places.show', $place->id) }}">{{ $place->name }}</a>
            @endforeach
        @endif
        </p>
    </div>
    @if (!empty($tasks->phone))
    <div class="col-md-2 col-xs-12 card-block p-3">
        <p><i class="text-muted fa fa-phone fa-2x fa-fw mr-1 float-left"></i>{{ $task->phone }}</p>
    </div>
    @endif
    @if (!empty($tasks->email))
    <div class="col-md-3 col-xs-12 card-block p-3">
        <p><i class="text-muted fa fa-envelope fa-2x fa-fw mr-1 float-left"></i>{{ $task->email }}</p>
    </div>
    @endif
</article>
@endforeach

{!! $tasks->links() !!}

@endsection