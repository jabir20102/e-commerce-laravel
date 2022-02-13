@extends('frontend.master')


@section('title', 'LOGIN')
@section('main')

<!--main area-->
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{url('/')}}" class="link">Home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">						
                        <div class="login-form form-item form-stl">
                            
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Log in to your account</h3>										
                                </fieldset>
                                <x-input type="email" name="email" label="Enter Your Email address:"/>
                                <x-input type="password" name="password" label="Enter Your password:"/>
                                
                                
                                <fieldset class="wrap-input">
                                    <label class="remember-field">
                                        <input class="frm-input " name="rememberme" id="rememberme" value="forever" type="checkbox"><span> {{ __('Remember Me') }}</span>
                                    </label>
                                    @if (Route::has('password.request'))
                                    <a class="link-function left-position" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                    </fieldset>
                                <input style="width: 100%" type="submit" class="btn btn-submit" value="Login" name="submit">
                                {{-- Login with Facebook --}}
                                <div class="flex items-center justify-end mt-4">
                                    <a class="btn" href="{{ url('auth/facebook') }}"
                                        style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                                        Login with Facebook
                                    </a>
                                </div>
                                {{-- Login with Google --}}
                                <div class="flex items-center justify-end mt-4">
                                    <a class="btn" href="{{ url('auth/google') }}"
                                        style="background: #f00; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                                        Login with Google
                                    </a>
                                </div>
                            </form>
                        </div>												
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->

@endsection
