@extends('layouts.app')

@section('content')


<center>
<div class="kotaklogin">
    
<!-- </div> -->
<!--     <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-header"> -->
                <!-- <div class="card-header">
                        
                </div> -->
    <div class="card-body">
        <center><img src="{{ asset('assets/images/1.png') }}" style="max-width: 110px; border: 0; margin: auto;" class="img-center"></center>
    </br>
            <form id="login-form" method="post" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        {{ csrf_field() }}
                        <!-- @csrf -->

                <div class="login2">
                            <!-- <label for="username" class="col-sm-4 col-form-label text-md-right">{{ __('Username') }}</label> -->

                            <!-- <div class="col-md-6"> -->
                            <div>
                                <input id="username" placeholder="Username" type="text-md-right" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('text-md-right') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!-- </div> -->
<br>
                        <!-- <div class="login2"> -->
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <!-- <div class="col-md-6"> -->
                                <div>
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row"> 
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>-->
                        </br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                
                                <button type="submit" class="btn btn-login" >
                                    {{ __('Login') }}
                                </button>


                                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> -->
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br> -->
</center>

@endsection
