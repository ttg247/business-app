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
                                            <h5>Tasks</h5>
                                            <span>View your tasks information and make them appear as you want it to.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">tasks Preferences</li>
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
                                            <h4 class="card-title mt-10">{{ $task ->name ?? '' }}</h4>
                                            <p class="card-subtitle">{{ $task ->summary ?? '' }}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-0"> 
                                    <div class="card-body"> 
                                        <small class="text-muted d-block">Email Address </small>
                                        <h6>{{ $task->email ?? '' }}</h6> 
                                        <small class="text-muted d-block pt-10">Phone Number</small>
                                        <h6>{{ $task->phone ?? '' }}</h6> 
                                        <small class="text-muted d-block pt-10">Address</small>
                                        <h6>{{ $task->address ?? '' }}</h6>
                                        
                                        <small class="text-muted d-block pt-30">Social Profile</small>
                                        <br/>
                                        <a href="{{ $task->facebook ?? '' }}" target="_blank" class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ $task->twitter ?? '' }}" target="_blank" class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ $task->instagram ?? '' }}" target="_blank" class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></a>
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
                                                <h5 class="text-center mt-30">About Your task</h5>
                                                <p class="mt-30">{{ $task->details ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about-settings" role="tabpanel" aria-labelledby="pills-about-tab">
                                            <div class="card-body">
                                                <form action="{{ url('tasks.edit'.$task->id) }}" class="form-horizontal" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="form-group">
                                                        <label for="example-name">task Name</label>
                                                        <input type="text" placeholder="Enter your task name" class="form-control" name="name" id="task-name"  value="{{ $task->name ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-name">Summary</label>
                                                        <input type="text" placeholder="Briefly summarize what your task does" class="form-control" name="summary" id="task-summary" value="{{ $task->summary ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-message">Details</label>
                                                        <textarea placeholder="Write the content that defines your about page" name="details" rows="5" class="form-control">{{ $task->details ?? '' }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-email">Email</label>
                                                        <input type="email" placeholder="Enter your task email address" class="form-control" name="email" id="task-email" value="{{ $task->email ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Phone</label>
                                                        <input type="text" placeholder="Enter your task phone number" id="example-phone" name="phone" class="form-control" value="{{ $task->phone ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Address</label>
                                                        <input type="text" placeholder="Enter your task address" id="example-address" name="address" class="form-control" value="{{ $task->address ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Facebook</label>
                                                        <input type="text" placeholder="Enter your facebook page link" id="example-phone" name="facebook" value="{{ $task->facebook ?? '' }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Twitter</label>
                                                        <input type="text" placeholder="Enter your twitter page link" id="example-phone" name="twitter" value="{{ $task->twitter ?? '' }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-phone">Instagram</label>
                                                        <input type="text" placeholder="Enter your instagram page link" id="example-phone" name="instagram" value="{{ $task->instagram ?? '' }}" class="form-control">
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
        
        
        @include("partials.modal")

        @include("partials.foot.index")
    </body>
</html>
