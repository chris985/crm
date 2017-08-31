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

@if(!$tasks->isEmpty())
<div class="card-list">
@foreach ($tasks as $key => $task)
<article class="card my-3 p-1">
	<div class="card-block row align-items-center">
		<header class="col-md-9">
			@if(empty($task->status))
			<img class="float-left rounded-circle mr-3" width="80" height="80" src="http://placehold.it/80/000000/ffffff?text={{ $task->real_status }}" alt="" />
			@else
			<img class="float-left rounded-circle mr-3" width="80" height="80" src="http://placehold.it/80/000000/ffffff?text={{ $task->real_status }}" alt="" />
			@endif
			<h1 class="card-title h4 pt-3"><a class="btn-text" href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></h1>
			<p class="card-subtitle text-muted">
				@if (!empty($task->note))
				<i class="fa fa-tag mr-1"></i>{{ str_limit($task->note, $limit = 100, $end = '...') }}
				@endif
			</p>
		</header>
		<div class="col-md-3">
			<p><i class="text-muted fa fa-phone fa-2x fa-fw mr-1 float-left"></i>{{ $task->due }}</p>
		</div>
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
	{!! $tasks->links() !!}
</div>
@endsection

@section('title')
Tasks
@endsection

@section('actions')
<li class="nav-item"><a class="nav-link" href="{{ route('tasks.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>
@endsection

@section('page')
mx-3 card-list
@endsection
