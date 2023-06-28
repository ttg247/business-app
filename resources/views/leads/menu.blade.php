<!doctype html>
<html class="no-js" lang="en">
    @include("partials.head.index")

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            @include("partials.header")

            <div class="page-wrap">
                @include("partials.sidebar")

                <!-- page content -->
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-refresh-cw bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Leads Manager</h5>
                                            <span>Nurture leads and move them through the sales pipeline.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('dashboard' )}}"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Leads Manager</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h6>Capture New Leads</h6>
                                        <p>Make changes to your name, email, phone number, and more </p>
                                        <a href="{{ url('leads/create') }}" class="btn btn-primary text-right mr-2">Capture Lead</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-lg-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h6>Manage Existing Leads</h6>
                                        <p>View and make changes to your name, email, phone number, and more </p>
                                        <a href="{{ url('leads/') }}" class="btn btn-primary text-right mr-2">Manage Leads</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-lg-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h6>Create Email Campaign</h6>
                                        <p>Import leads in bulk.</p>
                                        <a href="{{ url('#') }}" class="btn btn-primary text-right mr-2">Create Campaign</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-lg-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h6>Track Campaign Performance</h6>
                                        <p>Import leads in bulk.</p>
                                        <a href="{{ url('#') }}" class="btn btn-primary text-right mr-2">Track Performance</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                


                @include("partials.chat")
                
                @include("partials.footer")
                
            </div>
        </div>      

        
        

        @include("partials.foot.forms")
    </body>
</html>
