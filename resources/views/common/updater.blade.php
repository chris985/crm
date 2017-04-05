@extends('common.app')
@section('content')
<article class="card">
    <div class="card-block row align-items-center">
            {{ csrf_field() }}
            <h1>Welcome to Updater<sup>BETA</sup></h1>
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
            <p>PLEASE note this is a TEST version of the app but this updater especially. If using for production be sure to realiably backup your databases FIRST.</p>
            <p>Fill out database credentials.</p>
            <label class="text-muted" for="first"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Database Name</label>
            <input id="db" class="form-control" name="db" type="text" aria-describedby="first">

            <label class="text-muted" for="first"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Database User</label>
            <input id="user" class="form-control" name="user" type="text" aria-describedby="first">

            <label class="text-muted" for="first"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Database Password</label>
            <input id="pass" class="form-control" name="pass" type="text" aria-describedby="first">
            <hr />

            <p>Create your initial user.</p>
            <label class="text-muted" for="first"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Database User</label>
            <input id="user" class="form-control" name="user" type="text" aria-describedby="first">

            <label class="text-muted" for="first"><i class="text-muted fa fa-user-circle fa-fw mr-1"></i>Database Password</label>
            <input id="pass" class="form-control" name="pass" type="text" aria-describedby="first">
    </div>
</article>
@endsection

@section('page')
card-open mx-3 px-3
@endsection

@section('title')
Installer
@endsection

@section('form-open')
{{ Form::open(array('action' => "InstallerController@update")) }}
@endsection

@section('form-close')
{!! Form::close() !!}
@endsection