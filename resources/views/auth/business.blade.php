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
                        <div class="lavalite-bg" style="background-image: url('{{ asset('/img/auth/register-bg.jpg') }}')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form py-0 mx-auto">
                            <div class="logo-centered">
                                <a href="{{ route('dashboard') }}"><img class="logo-auth" src="{{ asset('img/black_logo.png') }}" alt=""></a>
                            </div>
                            <h3>Welcome to Terra Sunny</h3>
                            <p>Let's create your new business. It only takes a few steps</p>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your business name" required="" name="name">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your business email" required="" name="email">
                                    <i class="ik ik-mail"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your business phone number" required="" name="phone">
                                    <i class="ik ik-phone"></i>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;I Accept <a href="#">Terms and Conditions</a></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">Create Account</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.foot.auth')
    </body>
</html>