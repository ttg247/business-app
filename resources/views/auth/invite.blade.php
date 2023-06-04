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
                                <a href="{{ route('dashboard') }}"><img src="{{ asset('img/black_logo.png') }}" alt="" class="logo-auth"></a>
                            </div>
                            <h3>Sign into Terra Sunny</h3>
                            <p>Happy to see you again!</p>
                            <form action="{{ route('invite_check') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your invite code" required="" name="invite_code">    
                                </div>
                                <div class="sign-btn text-center">
                                    <button type="submit" class="btn btn-theme">Use Code</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('partials.foot.auth')
    </body>
</html>
