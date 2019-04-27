@extends('layouts.app')

@section('content')
<!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form" method="POST"  action="{{route('login')}}">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Enter your credentials below</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">                                
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" placeholder="Password">


                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </div>

                            @if (Route::has('password.request'))
                            <div class="text-left">
                                <a href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                            @endif 
                                
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
