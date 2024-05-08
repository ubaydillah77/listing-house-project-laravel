@extends('frontend.layouts.master')

@section('contents')
    <!--==========================
                                                BREADCRUMB PART START
                                            ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>sign up</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> sign up </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="wsus__login_page">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="wsus__login_area">
                        <h2>Welcome back!</h2>
                        <p>sign up to continue</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="name">name</label>
                                        <input id="name" type="text" placeholder="Name" name="name"
                                            value="{{ old('name') }}" required>
                                        @if ($errors->first('name'))
                                            <code>{{ $errors->first('name') }}</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="email">email</label>
                                        <input type="email" placeholder="Email" id="email" name="email"
                                            value="{{ old('email') }}" required>
                                        @if ($errors->first('email'))
                                            <code>{{ $errors->first('email') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="password">password</label>
                                        <input id="password" type="password" placeholder="Password" name="password"
                                            required>
                                        @if ($errors->first('password'))
                                            <code>{{ $errors->first('password') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="password_confirmation">confirm password</label>
                                        <input type="password" placeholder="Confirm Password" id="password_confirmation"
                                            name="password_confirmation">
                                        @if ($errors->first('password_confirmation'))
                                            <code>{{ $errors->first('password_confirmation') }}</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit" class="common_btn">registration</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="or"><span>or</span></p>
                        {{-- <ul class="d-flex">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul> --}}
                        <p class="create_account">Dont’t have an aceount ? <a href="{{ route('login') }}">login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
                                                SIGN IN END
                                            ==========================-->
@endsection
