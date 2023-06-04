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
                                        <i class="ik ik-settings bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Business Preferences</h5>
                                            <span>Change your business information and make them appear as you want it to.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Business Preferences</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center"> 
                                            <h4 class="card-title mt-10">{{ $business ->name ?? '' }}</h4>
                                            <p class="card-subtitle">{{ $business ->summary ?? '' }}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-0"> 
                                    <div class="card-body"> 
                                        <small class="text-muted d-block">Email Address </small>
                                        <h6>{{ $business->email ?? '' }}</h6> 
                                        <small class="text-muted d-block pt-10">Phone Number</small>
                                        <h6>{{ $business->phone ?? '' }}</h6> 
                                        <small class="text-muted d-block pt-10">Address</small>
                                        <h6>{{ $business->address ?? '' }}</h6>
                                        
                                        <small class="text-muted d-block pt-30">Social Profile</small>
                                        <br/>
                                        <a href="{{ $business->facebook ?? '' }}" target="_blank" class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ $business->twitter ?? '' }}" target="_blank" class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ $business->instagram ?? '' }}" target="_blank" class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="card">
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#overview-settings" role="tab" aria-controls="pills-overview" aria-selected="false">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#about-settings" role="tab" aria-controls="pills-setting" aria-selected="false">About</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="overview-settings" role="tabpanel" aria-labelledby="pills-overview-tab">
                                            <div class="card-body">
                                                <h5 class="text-center mt-30">About Your Business</h5>
                                                <p class="mt-30">{{ $business->details ?? '' }}</p>
                                                <hr>
                                                <h5 class="text-center mt-30">Service Listings</h5>
                                                @foreach($services as $service)
                                                <h6 class="mt-30"><span class="pull-left">{{$loop->iteration}}. </span> {{$service->title}} </h6>
                                                <div>
                                                    <p> {{$service->description}} </p>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about-settings" role="tabpanel" aria-labelledby="pills-about-tab">
                                            <div class="card-body">
                                                <form action="{{ route('update_business_settings') }}" class="form-horizontal" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="form-group">
                                                        <label for="example-name">Business Name</label>
                                                        <input type="text" placeholder="Enter your business name" class="form-control" name="name" id="business-name"  value="{{ $business->name ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-name">Summary</label>
                                                        <input type="text" placeholder="Briefly summarize what your business does" class="form-control" name="summary" id="business-summary" value="{{ $business->summary ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-message">Details</label>
                                                        <textarea placeholder="Write the content that defines your about page" name="details" rows="5" class="form-control">{{ $business->details ?? '' }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-email">Email</label>
                                                        <input type="email" placeholder="Enter your business email address" class="form-control" name="email" id="business-email" value="{{ $business->email ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Phone</label>
                                                        <input type="text" placeholder="Enter your business phone number" id="example-phone" name="phone" class="form-control" value="{{ $business->phone ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Address</label>
                                                        <input type="text" placeholder="Enter your business address" id="example-address" name="address" class="form-control" value="{{ $business->address ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Facebook</label>
                                                        <input type="text" placeholder="Enter your facebook page link" id="example-phone" name="facebook" value="{{ $business->facebook ?? '' }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Twitter</label>
                                                        <input type="text" placeholder="Enter your twitter page link" id="example-phone" name="twitter" value="{{ $business->twitter ?? '' }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Instagram</label>
                                                        <input type="text" placeholder="Enter your instagram page link" id="example-phone" name="instagram" value="{{ $business->instagram ?? '' }}" class="form-control">
                                                    </div>
                                                    <button class="btn btn-success" type="submit">Update Settings</button>
                                                </form>
                                            </div>
                                        </div>
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
        
        
        

        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="app-item dropdown">
                                    <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include("partials.foot.index")
    </body>
</html>
