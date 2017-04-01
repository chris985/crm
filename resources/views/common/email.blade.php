@extends('common.app')

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<article class="card">
    <div class="card-block row align-items-center">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="col-md-12">
                <label for="email" class=""><i class="fa fa-envelope fa-fw mr-1"></i>E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="col-md-12 py-3">
                <button type="submit" class="btn btn-primary">
                    Send Password Reset Link
                </button>
            </div>
        </form>
    </div>
</article>
@endsection

@section('title')
Reset Password
@endsection

@section('page')
card-centered card-open px-3
@endsection