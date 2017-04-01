@extends('common')

@section('form-open')
{!! Form::model($money, array('route' => 'money.store', 'method' => 'POST', 'files' => true)) !!}
@endsection

@section('title')
New
@endsection

@section('back')
<a class="nav-link" href="{{ route('people.index') }}"><i class="fa fa-arrow-left fa-fw"></i></a>
@endsection

@section('actions')
<li class="nav-item"><button class="nav-link btn btn-primary rounded-circle" type="submit"><i class="fa fa-save fa-fw"></i></button></li>
@endsection

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

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label class="text-muted" for="name"><i class="text-muted fa fa-building fa-fw mr-1"></i>Name</label>
							<input id="name" class="form-control" name="name" type="text" aria-describedby="name">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="text-muted" for="people"><i class="text-muted fa fa-building-o fa-fw mr-1"></i>Invoice Number</label>
							<input id="people" class="form-control" name="people" type="text" aria-describedby="people">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label class="text-muted" for="people"><i class="text-muted fa fa-building-o fa-fw mr-1"></i>Person</label>
							<input id="people" class="form-control" name="people" type="text" aria-describedby="people">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="text-muted" for="people"><i class="text-muted fa fa-building-o fa-fw mr-1"></i>Place</label>
							<input id="people" class="form-control" name="people" type="text" aria-describedby="people">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="text-muted" for="people"><i class="text-muted fa fa-building-o fa-fw mr-1"></i>Task</label>
							<input id="people" class="form-control" name="people" type="text" aria-describedby="people">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label class="text-muted" for="type"><i class="text-muted fa fa-sitemap fa-fw mr-1"></i>Type</label>
					<select class="form-control" name="type" aria-describedby="type">
						<option value="0">Expense</option>
						<option value="1" selected>Unspecified</option>
						<option value="2">Quote</option>
						<option value="3">Invoice</option>
					</select>
				</div>
				<div class="form-group">
					<label class="text-muted" for="status"><i class="text-muted fa fa-eye fa-fw mr-1"></i>Status</label>
					<select id="status" class="form-control" name="status" aria-describedby="company">
						<option value="0">Closed</option>
						<option value="1" selected>Draft</option>
						<option value="3">Sent</option>
						<option value="2">Accepted</option>
						<option value="4">Refunded</option>
						<option value="5">Written-Off</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="card-block">
		<div class="row">
			<div class="col">
				<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Line Item</label>
				<input id="title" class="form-control" name="title" type="text" aria-describedby="title">
			</div>
			<div class="col-md-1">
				<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Qty</label>
				<input id="title" class="form-control" name="title" type="text" aria-describedby="title">
			</div>
			<div class="col-md-2">
				<label class="text-muted" for="title"><i class="text-muted fa fa-tag fa-fw mr-1"></i>Price</label>
				<input id="title" class="form-control" name="title" type="text" aria-describedby="title">
			</div>
		</div>
	</div>
	<div class="card-footer text-muted">
		<div class="form-group row">
			<div class="col">
				<label for="note"><i class="text-muted fa fa-sticky-note fa-fw mr-1"></i>Notes</label>
				<textarea id="note" class="form-control" name="note" rows="3"></textarea>
			</div>
		</div>
	</div>
</div>
@endsection

@section('form-close')
{!! Form::close() !!}
@endsection
