@extends ( 'front.layouts.home' )

@section ( 'title' , 'Login and Reg' )

@section ( 'content' )

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset ( 'front/img/bg/breadcrumb_bg.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>Login-Register</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login-Register</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- login-register-area -->
    <section class="login-register-area gray-lite pb-120">
        <div class="container">
            <div class="login-reg-wrap">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="login-wrap">
                            <h3 class="widget-title">Log in your <span>account</span></h3>
                            <form method="POST" action="{{ route('login') }}" class="login-form">
                                    @csrf
                                <div class="form-grp">
                                    <label for="username">{{ __('E-Mail Address') }} <span>*</span></label>
                                    <input type="email"
                                           placeholder="Email"
                                           id="email"
                                           class="@error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="password">{{ __('Password') }} <span>*</span></label>
                                    <input type="password"
                                           id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           placeholder="*****">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button class="btn">Login</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-wrap reg-wrap">
                            <h3 class="widget-title">Register</h3>
                            <form method="POST" action="{{ route('register') }}" class="login-form">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <label for="userName">{{ __('Name') }} <span>*</span></label>
                                            <input id="userName"
                                                   type="text"
                                                   class="@error('name') is-invalid @enderror"
                                                   name="name"
                                                   value="{{ old('name') }}">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <label for="password2">{{ __('E-Mail Address') }} <span>*</span></label>
                                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <label for="email">{{ __('Password') }} <span>*</span></label>
                                            <input id="password"
                                                   type="password"
                                                   class="@error('password') is-invalid @enderror"
                                                   name="password"
                                                   autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <label for="phone">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login-register-area-end -->

    <!-- footer-brand-area -->
    <div class="footer-brand-area white-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 order-2 order-md-0">
                    <div class="footer-logo">
                        <a href="index.html"><img src="img/logo/w_logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row footer-brand-active">
                        <div class="col">
                            <div class="footer-brand-item">
                                <a href="#"><img src="img/brand/footer_brand01.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-brand-item">
                                <a href="#"><img src="img/brand/footer_brand02.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-brand-item">
                                <a href="#"><img src="img/brand/footer_brand03.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-brand-item">
                                <a href="#"><img src="img/brand/footer_brand04.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-brand-item">
                                <a href="#"><img src="img/brand/footer_brand05.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-brand-item">
                                <a href="#"><img src="img/brand/footer_brand03.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-brand-area-end -->

@endsection
