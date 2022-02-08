
@extends('frontend.master')


@section('title', 'REGISTER')
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
                            
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Registration</h3>										
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="name">Full Name:</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </fieldset>

                                
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input id="frm-login-uname" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback bg-danger" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                   
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="password">Password:</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback bg-danger" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                                
                                <fieldset class="wrap-input">
                                    <label for="password-confirm">Confirm Password:</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Register" name="submit">
                            </form>
                        </div>												
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->




@endsection
