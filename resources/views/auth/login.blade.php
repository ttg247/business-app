<!doctype html>
<html class="no-js" lang="en">
    @include('partials.head.auth')

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('{{ asset('/img/auth/login-bg.jpg') }}')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="{{ route('dashboard') }}"><img src="{{ asset('/src/img/brand.svg') }}" alt=""></a>
                            </div>
                            <h3>Sign In to Bookr</h3>
                            <p>Happy to see you again!</p>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your email" required="" name="email" value="{{ __('Email') }}">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Enter your password" required="" name="password" value="{{ __('Password') }}">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="{{ __('Remember me') }}">
                                            <span class="custom-control-label">&nbsp;Remember Me</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('forgot-password') }}">Forgot Password ?</a>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button type="submit" class="btn btn-theme">Sign In</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>Don't have an account? <a href="{{ route('register') }}">Create an account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('partials.foot.auth')
    </body>
</html>
