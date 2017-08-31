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
		@if (empty($task->status))
		<img class="float-left rounded-circle mr-3" width="160" height="160" src="http://placehold.it/80/000000/ffffff?text={{ $task->real_status }}" alt="" />
		@else
		<img class="float-left rounded-circle mr-3" width="160" height="160" src="http://placehold.it/80/000000/ffffff?text={{ $task->real_status }}" alt="" />
		@endif
		<p class="px-1 py-1 float-right"><span class="badge badge-default">{{ $task->real_status }}</span><span class="ml-3 badge badge-default">{{ $task->real_type }}</span></p>
		<h1 class="h4 card-title pt-5">
			@if (!empty($task->prefix))
			{{ $task->prefix }}
			@endif
			{{ $task->name }}
		</h1>
		<h6 class="card-subtitle text-muted">
			@if (!empty($task->title))
			<i class="fa fa-tag mr-1"></i>{{ $task->title }}
			@endif
		</h6>
	</div>
	<div class="card-body row">
		@if (!empty($task->note))
		<div class="col-md-12 py-1">
			<i class="fa fa-sticky-note mr-1 text-muted"></i>Notes: <br />
			{{$task->note}}
		</div>
		@endif
		@if (!empty($task->due))
		<div class="col-md-4 py-1">
			<p class="float-left mr-3"><i class="fa fa-external-link fa-2x fa-fw text-muted"></i></p>
			<p>{{ $task->due }}</p>
		</div>
		@endif
		@if (!empty($task->priority))
		<div class="col-md-4 py-1">
			<p class="float-left mr-3"><i class="fa fa-envelope fa-2x fa-fw text-muted"></i></p>
			<p>{{ $task->priority }}</p>
		</div>
		@endif
		@if (!empty($task->type))
		<div class="col-md-4">
			<p class="float-left mr-3"><i class="fa fa-phone fa-2x fa-fw text-muted"></i></p>
			<p>{{ $task->type }}
			@endif
			@if (!empty($task->parent))
			<div class="col-md-4 py-1">
				<p class="float-left mr-3"><i class="fa fa-sitemap fa-2x fa-fw text-muted"></i></p>
				<p>{{ $task->parent }}</p>
			</div>
			@endif
		</div>
	</div>
	<div class="card-footer card-block">
		<div class="row align-items-center">
			<div class="col-md-4">
				<small><i class="fa fa-id-card fa-fw mr-1 text-muted"></i>ID#: {{ $task->id }}</small>
			</div>
			<div class="col-md-4">
				<small><i class="fa fa-plus-square fa-fw text-muted"></i>Created: {{ $task->created_at }}</small>
			</div>
			<div class="col-md-4">
				<small><i class="fa fa-pencil-square fa-fw text-muted"></i>Updated: {{ $task->updated_at }}</small>
			</div>
		</div>
	</div>
</article>
@endsection

@section('title')
View
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link" href="{{ route('tasks.edit', $task->id) }}"><i class="fa fa-edit fa-fw"></i></a></li>
<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modal"><i class="fa fa-trash fa-fw"></i></a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('tasks.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('page')
mx-3 card-open
@endsection

@section('modal')
<div class="modal-header">
	<h5 class="modal-title" id="modal-label">Delete {{ $task->name }}?</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<p>Are you sure you wish to delete? (There is no undo.)</p>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	{!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id],'style'=>'display:inline']) !!}{!! Form::button('OK', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}{!! Form::close() !!}
</div>
@endsection
