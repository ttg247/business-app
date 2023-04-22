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
                                        <i class="ik ik-edit bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Components</h5>
                                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Components</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header"><h3>Default form</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Username</label>
                                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                                <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input">
                                                    <span class="custom-control-label">&nbsp;Remember me</span>
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                          </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card" style="min-height: 484px;">
                                    <div class="card-header"><h3>Horizontal Form</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample">
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input">
                                                    <span class="custom-control-label">&nbsp;Remember me</span>
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header"><h3>Basic form elements</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Name</label>
                                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail3">Email address</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Gender</label>
                                                        <select class="form-control" id="exampleSelectGender">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword4">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="time">Time</label>
                                                <input type="text" class="form-control datetimepicker-input" id="timepicker" data-toggle="datetimepicker" data-target="#timepicker">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>File upload</label>
                                                <input type="file" name="img[]" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                    <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Textarea</label>
                                                <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header"><h3>Input Sizes</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control form-control-lg" placeholder=".form-control-lg">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder=".form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" placeholder=".form-control-sm">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header"><h3>Text-color</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-txt-primary" placeholder=".form-txt-primary">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-txt-warning" placeholder=".form-txt-warning">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-txt-default" placeholder=".form-txt-default">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-txt-danger" placeholder=".form-txt-danger">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-txt-success" placeholder=".form-txt-success">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-txt-inverse" placeholder=".form-txt-inverse">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-txt-info" placeholder=".form-txt-info">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header"><h3>Color Inputs</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-primary" placeholder=".form-control-primary">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-warning" placeholder=".form-control-warning">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-default" placeholder=".form-control-default">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-danger" placeholder=".form-control-danger">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-success" placeholder=".form-control-success">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-inverse" placeholder=".form-control-inverse">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-info" placeholder=".form-control-info">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header"><h3>Background-color</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-bg-primary" placeholder=".form-bg-primary">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-bg-warning" placeholder=".form-bg-warning">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-bg-default" placeholder=".form-bg-default">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-bg-danger" placeholder=".form-bg-danger">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-bg-success" placeholder=".form-bg-success">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-bg-inverse" placeholder=".form-bg-inverse">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-bg-info" placeholder=".form-bg-info">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card" style="min-height: 180px;">
                                    <div class="card-header"><h3>Inline forms</h3></div>
                                    <div class="card-body">
                                        <form class="form-inline">
                                            <label class="sr-only" for="inlineFormInputName2">Name</label>
                                            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Shanker Raj">
                                          
                                            <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                                            </div>
                                            <div class="form-check mx-sm-2">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <span class="custom-control-label">&nbsp; Remember Me</span>
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header"><h3>Validation States</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Name</label>
                                                        <input type="text" class="form-control is-valid" id="exampleInputName1" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail3">Email address</label>
                                                        <input type="email" class="form-control is-invalid" id="exampleInputEmail3" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Input Grid</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="text" class="form-control" placeholder="col-sm-1">
                                                </div>
                                                <div class="col-sm-11">
                                                    <input type="text" class="form-control" placeholder="col-sm-11">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="col-sm-2">
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="col-sm-10">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" placeholder="col-sm-3">
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="col-sm-9">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="col-sm-4">
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="col-sm-8">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" placeholder="col-sm-5">
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="col-sm-7">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="col-sm-6">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="col-sm-6">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" placeholder="col-sm-12">
                                                </div>
                                            </div>
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

        @include("partials.foot.forms")
    </body>
</html>
