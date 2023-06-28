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
                                            <h5>Create Lead</h5>
                                            <span>Create a new lead for your business</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="">Leads</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Create New lead</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Use the form below to create a new lead</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('storeLeads') }}" class="forms-sample" method="POST">
                                            @csrf
                                            @method('post')
                                            
                                            <div class="form-group">
                                                <label for="lead-name">Contact</label>
                                                <select name="contact" class="form-control select2">
                                                    @foreach ($contacts as $contact)
                                                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="lead-name">Account</label>
                                                <select name="account" class="form-control select2">
                                                    @foreach ($accounts as $account)
                                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="lead-name">Job Title</label>
                                                <input type="text" class="form-control" id="lead-name" name="job_title" placeholder="Enter your lead's job title">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lead-name">Department</label>
                                                <input type="text" class="form-control" id="lead-name" name="department" placeholder="Enter your lead's organisational department">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lead-name">Status</label>
                                                <select name="status" class="form-control select2">
                                                    <option value="New">New</option>
                                                    <option value="Assigned">Assigned</option>
                                                    <option value="In Process">In Process</option>
                                                    <option value="Converted">Converted</option>
                                                    <option value="Recycled">Recycled</option>
                                                    <option value="Deal">Deal</option>
                                                </select>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="lead-name">Source</label>
                                                <select name="source" class="form-control select2">
                                                    <option value="Cold Call">Cold Call</option>
                                                    <option value="Existing Customer">Existing Customer</option>
                                                    <option value="Self Generated">Self Generated</option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="Partner">Partner</option>
                                                    <option value="Public Relation">Public Relation</option>
                                                    <option value="Mail">Mail</option>
                                                    <option value="Conference">Conference</option>
                                                    <option value="Trade Show">Trade Show</option>
                                                    <option value="Website">Website</option>
                                                    <option value="Word of Mouth">Word of Mouth</option>
                                                    <option value="Email">Email</option>
                                                    <option value="Campaign">Campaign</option>
                                                    <option value="Other">Other</option>                                                    
                                                </select>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="lead-name">Source Description</label>
                                                <input type="text" class="form-control" id="lead-name" name="source_description" placeholder="Enter your lead's full name">
                                            </div>

                                            <div class="form-group">
                                                <label for="lead-name">Referred By</label>
                                                <input type="text" class="form-control" id="lead-name" name="referred_by" placeholder="Enter your lead's full name">
                                            </div>

                                            <button type="submit" class="btn btn-primary mr-2">Capture Lead</button>
                                            <button class="btn btn-light"><a href="{{ url('leads-manager')}}">Cancel</a></button>
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
        
        
       

        @include("partials.foot.index")
    </body>
</html>
