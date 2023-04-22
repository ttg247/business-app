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
                        <div class="lavalite-bg" style="background-image: url('../img/auth/login-bg.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="../index.html"><img src="../src/img/brand.svg" alt=""></a>
                            </div>
                            <h3>Forgot Password</h3>
                            <p>We will send you a link to reset password.</p>
                            <form action="../index.html">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your email address" type="email" name="email" :value="old('email')" required autofocus >
                                    <i class="ik ik-mail"></i>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">Submit</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>Not a member? <a href="register.html">Create an account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('partials.foot.auth')
    </body>
</html>
