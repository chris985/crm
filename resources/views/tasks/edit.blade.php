@extends('common.app')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<button class="close" type="button" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"><i class="fa fa-times fa-fw"></i></span>
	</button>
	<p><strong>Error!</strong> Please fix the following to continue:</p>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<article class="card">
	<div class="card-header">
		<div class="row">
			<div class="col main">
				<div class="form-group row">
					<div class="col-md-12">
						<label class="text-muted" for="first"><i class="text-muted fa fa-user fa-fw mr-1"></i>Name</label>
						<input id="name" class="form-control" name="name" type="text" value="{{ $task->name }}" aria-describedby="name">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label class="text-muted" for="first"><i class="text-muted fa fa-user fa-fw mr-1"></i>Person</label>
						<input id="first" class="form-control" name="first" type="text" value="{{ $task->name }}" aria-describedby="first">
					</div>
					<div class="col-md-3">
						<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Priority</label>
						<input id="title" class="form-control" name="title" type="text" value="{{ $task->priority }}" aria-describedby="title" >
					</div>
					<div class="col-md-3">
						<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Due</label>
						<input id="title" class="form-control" name="title" type="text" value="{{ $task->duey }}" aria-describedby="title" >
					</div>

				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="text-muted" for="status"><i class="text-muted fa fa-eye fa-fw mr-1"></i>Status</label>
 					{{ Form::select('status', $task->task_status, $task->status, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					<label for="type"><i class="text-muted fa fa-cubes fa-fw mr-1"></i>Type</label>
 					{{ Form::select('type', $task->task_type, $task->type, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
	</div>
	<div class="card-block">		
		<div class="form-group row">
			<div class="col">
				<label class="text-muted" for="note"><i class="text-muted fa fa-sticky-note fa-fw mr-1"></i>Notes</label>
				<textarea id="note" class="form-control" name="note" rows="3" aria-describedby="note">{{ $task->note }}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col main">
				<label class="text-muted" for="status"><i class="text-muted fa fa-eye fa-fw mr-1"></i>Parent</label>
 				<input id="first" class="form-control" name="first" type="text" value="{{ $task->name }}" aria-describedby="first">
			</div>
			<div class="col-md-6">

			</div>
		</div>

		<div class="form-group row">

		</div>
		<div class="form-group row">
		
			</div>
		</div>
	</div>
	<div class="card-footer text-muted">
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
Edit
@endsection

@section('page')
mx-3 card-open
@endsection

@section('actions')
<li class="nav-item"><button class="nav-link btn-link" type="submit" ><i class="fa fa-save fa-fw"></i></button></li>
<li class="nav-item"><button class="nav-link btn-link" type="button" data-toggle="modal" data-target="#modal"><i class="fa fa-trash fa-fw"></i></button></li>
@endsection

@section('form-open')
{!! Form::model($task, ['method' => 'PATCH', 'files' => true, 'route' => ['tasks.update', $task->id]]) !!}
@endsection

@section('form-close')
{!! Form::close() !!}
@endsection

@section('modal')
<div class="modal-header">
	<h5 id="modal-label" class="modal-title">Delete {{ $task->name }}?</h5>
	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<p>Are you sure you wish to delete? (There is no undo.)</p>
</div>
<div class="modal-footer">
	<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	{!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id],'style'=>'display:inline']) !!}{!! Form::button('OK', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}{!! Form::close() !!}
</div>
@endsection