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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                <div class="card-header"><h3>Use the form below change your business workhours</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('workhours') }}" method="POST" class="form-horizontal">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group">
                                                <span class="">Monday</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="example-name">Start Time</label>
                                                        <input class="form-control" type="time"  name="monday_start_time" value="{{ $workhours->monday_start_time ?? '' }}"/>
                                                    </div>
                                                    <div class="col">
                                                        <label for="example-name">End Time</label>
                                                        <input class="form-control" type="time" name="monday_end_time" value="{{ $workhours->monday_end_time ?? '' }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <span class="">Tuesday</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="example-name">Start Time</label>
                                                        <input class="form-control" type="time"   name="tuesday_start_time" value="{{ $workhours->tuesday_start_time ?? '' }}"/>
                                                    </div>
                                                    <div class="col">
                                                        <label for="example-name">End Time</label>
                                                        <input class="form-control" type="time"  name="tuesday_end_time"  value="{{ $workhours->tuesday_end_time ?? '' }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>                                                    
                                            <div class="form-group">
                                                <span class="">Wednesday</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="example-name">Start Time</label>
                                                        <input class="form-control" type="time" name="wednesday_start_time" value="{{ $workhours->wednesday_start_time ?? '' }}"/>
                                                    </div>
                                                    <div class="col">
                                                        <label for="example-name">End Time</label>
                                                        <input class="form-control" type="time" name="wednesday_end_time" value="{{ $workhours->wednesday_end_time ?? '' }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>                                                    
                                            <div class="form-group">
                                                <span class="">Thursday</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="example-name">Start Time</label>
                                                        <input class="form-control" type="time" name="thursday_start_time" value="{{ $workhours->thursday_start_time ?? '' }}"/>
                                                    </div>
                                                    <div class="col">
                                                        <label for="example-name">End Time</label>
                                                        <input class="form-control" type="time" name="thursday_end_time" value="{{ $workhours->thursday_end_time ?? '' }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>                                                    
                                            <div class="form-group">
                                                <span class="">Friday</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="example-name">Start Time</label>
                                                        <input class="form-control" type="time" name="friday_start_time" value="{{ $workhours->friday_start_time ?? '' }}"/>
                                                    </div>
                                                    <div class="col">
                                                        <label for="example-name">End Time</label>
                                                        <input class="form-control" type="time" name="friday_end_time" value="{{ $workhours->friday_end_time ?? '' }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>                                                    
                                            <div class="form-group">
                                                <span class="">Saturday</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="example-name">Start Time</label>
                                                        <input class="form-control" type="time" name="saturday_start_time" value="{{ $workhours->saturday_start_time ?? '' }}"/>
                                                    </div>
                                                    <div class="col">
                                                        <label for="example-name">End Time</label>
                                                        <input class="form-control" type="time"  name="saturday_end_time" value="{{ $workhours->saturday_end_time ?? '' }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>                                                    
                                            <div class="form-group">
                                                <span class="">Sunday</span>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="example-name">Start Time</label>
                                                        <input class="form-control" type="time" name="sunday_start_time" value="{{ $workhours->sunday_start_time ?? '' }}"/>
                                                    </div>
                                                    <div class="col">
                                                        <label for="example-name">End Time</label>
                                                        <input class="form-control" type="time" name="sunday_end_time" value="{{ $workhours->sunday_end_time ?? '' }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success" type="submit">Update Settings</button>
                                        </form>
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
