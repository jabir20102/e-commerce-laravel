
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
                                <x-input type="text" name="name" label="Enter Your name:"/>
                                <x-input type="email" name="email" label="Enter Your email:"/>
                                <x-input type="password" name="password" label="Enter Your password:"/>
                                <x-input type="password" name="password_confirmation" label="Confirm password:"/>
                                
                                <input type="submit" class="btn btn-submit" value="Register" name="submit">
                            </form>
                        </div>												
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->




@endsection
