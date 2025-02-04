@extends('frontend.layouts.master')

@section('contents')
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>sign in</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> sign in </li>
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
                        <p>sign in to continue</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label for="email">email</label>
                                        <input id="email" type="email" placeholder="Email" name="email"
                                            value="{{ old('email') }}" required autofocus>
                                        @if ($errors->first('email'))
                                            {{-- <code>{{ $errors->first('email') }}</code> --}}
                                            <code>Incorrect Email or Password.</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label id="password">password</label>
                                        <input placeholder="Password" type="password" name="password" required
                                            autocomplete="current-password">
                                        @if ($errors->first('password'))
                                            {{-- <code>{{ $errors->first('password') }}</code> --}}
                                            <code>Incorrect Email or Password.</code>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-xl-12">
                                    <div class="wsus__login_imput wsus__login_check_area">
                                        <div class="form-check">
                                            <input id="remember_me" class="form-check-input" type="checkbox" name="remember"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remeber Me
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forget Password ?</a>
                                        @endif

                                    </div>


                                </div>


                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit">login</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <p class="create_account">Dont’t have an aceount ? <a href="{{ route('register') }}">Create
                                Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
