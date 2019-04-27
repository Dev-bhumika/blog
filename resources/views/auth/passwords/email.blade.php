@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">
                
                <!-- Login form -->
                <form class="login-form" method="POST"  action="{{route('password.email')}}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Reset Password</h5>                                
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>

                               @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
  

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                            </div>
 
                        </div>
                    </div>
                </form>
                <!-- /login form -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
@endsection
