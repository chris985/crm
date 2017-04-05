@extends('common.app')
@section('content')
<article class="card">
    {{ csrf_field() }}
    <h1>Welcome to Installer <sup>BETA</sup></h1>
    <p>This will install a new instance of the app and create a .env file for you.</p>
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
    <h3>Database Credentials</h3>
    <p>Fill out database credentials.</p>
    <div class="card-block row align-items-center">
        <div class="col-md-6 pb-3">
            <label class="text-muted" for="dbname"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Database Name</label>
            <input id="dbname" class="form-control" name="dbname" type="text" aria-describedby="dbname">
        </div>
        <div class="col-md-6 pb-3">
            <label class="text-muted" for="dbuser"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Database User</label>
            <input id="dbuser" class="form-control" name="dbuser" type="text" aria-describedby="dbuser">
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="dbpass"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Database Password</label>
            <input id="dbpass" class="form-control" name="dbpass" type="text" aria-describedby="dbpass">
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="dbpass">Would you like to fill the database with sample data?</label>
            <input id="seed" name="seed" type="checkbox">
        </div>
    </div>
    <h3>Administrator</h3>
    <p>Create your initial user.</p>
    <div class="card-block row align-items-center">
        <div class="col-md-6">
        <label class="text-muted" for="first"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Email (Username)</label>
            <input id="email" class="form-control" name="user" type="text" aria-describedby="first">
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="first"><i class="text-muted fa fa-key fa-fw mr-1"></i>Account Password</label>
            <input id="pass" class="form-control" name="pass" type="text" aria-describedby="first">
        </div>
    </div>
</article>
@endsection

@section('page')
card-open mx-3 px-3 py-3
@endsection

@section('title')
Installer
@endsection

@section('actions')
<li class="nav-item"><button class="nav-link btn-link" type="submit" ><i class="fa fa-gear fa-fw"></i></button></li>
<li class="nav-item"><button class="nav-link btn-link" type="button" data-toggle="modal" data-target="#modal"><i class="fa fa-close fa-fw"></i></button></li>
@endsection

@section('form-open')
{{ Form::open(array('action' => "InstallerController@install")) }}
@endsection

@section('form-close')
{!! Form::close() !!}
@endsection

@section('modal')
<div class="modal-header">
    <h5 class="modal-title" id="modal-label">Cancel?</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>If you cancel now, the system will not proceed through installation.</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a class="btn btn-warning" href="{{ route('index') }}">Terminate Installation</a>
</div>
@endsection