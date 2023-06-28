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
                                            <h5>Manage Lead</h5>
                                            <span>Manage an existing lead in the CRM</span>
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
                                            <li class="breadcrumb-item active" aria-current="page">Manage Existing lead</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Use the form below to manage an existing lead</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('leads_update', $lead->id) }}" class="forms-sample" method="POST">
                                            @csrf
                                            @method('put')
                                            
                                            <div class="form-group">
                                                <label for="lead-name">Contact</label>
                                                <select name="contact" class="form-control select2">
                                                    @foreach ($contacts as $contact)
                                                    <option {{ ($lead->contact_id == $contact->id) ? 'selected' : ''}} value="{{ $contact->id }}">{{ $contact->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="lead-name">Account</label>
                                                <select name="account" class="form-control select2">
                                                    @foreach ($accounts as $account)
                                                        <option {{ ($lead->account_id == $account->id) ? 'selected' : ''}} value="{{ $account->id }}">{{ $account->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="lead-name">Job Title</label>
                                                <input type="text" class="form-control" id="lead-name" name="job_title" value="{{ $lead->job_title }}" placeholder="Enter your lead's job title">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lead-name">Department</label>
                                                <input type="text" class="form-control" id="lead-name" name="department" value="{{ $lead->department }}" placeholder="Enter your lead's organisational department">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lead-name">Status</label>
                                                <select name="status" class="form-control select2">
                                                    <option {{ ($lead->status == 'New') ? 'selected' : ''}} value="New">New</option>
                                                    <option {{ ($lead->status == 'Assigned') ? 'selected' : ''}} value="Assigned">Assigned</option>
                                                    <option {{ ($lead->status == 'In Progress') ? 'selected' : ''}} value="In Process">In Process</option>
                                                    <option {{ ($lead->status == 'Converted') ? 'selected' : ''}} value="Converted">Converted</option>
                                                    <option {{ ($lead->status == 'Recycled') ? 'selected' : ''}} value="Recycled">Recycled</option>
                                                    <option {{ ($lead->status == 'Deal') ? 'selected' : ''}} value="Deal">Deal</option>
                                                </select>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="lead-name">Source</label>
                                                <select name="source" class="form-control select2">
                                                    <option {{ ($lead->source == 'Cold Call') ? 'selected' : ''}} value="Cold Call">Cold Call</option>
                                                    <option {{ ($lead->source == 'Existing Customer') ? 'selected' : ''}} value="Existing Customer">Existing Customer</option>
                                                    <option {{ ($lead->source == 'Self Generated') ? 'selected' : ''}} value="Self Generated">Self Generated</option>
                                                    <option {{ ($lead->source == 'Employee') ? 'selected' : ''}} value="Employee">Employee</option>
                                                    <option {{ ($lead->source == 'Partner') ? 'selected' : ''}} value="Partner">Partner</option>
                                                    <option {{ ($lead->source == 'Public Relation') ? 'selected' : ''}} value="Public Relation">Public Relation</option>
                                                    <option {{ ($lead->source == 'Mail') ? 'selected' : ''}} value="Mail">Mail</option>
                                                    <option {{ ($lead->source == 'Conference') ? 'selected' : ''}} value="Conference">Conference</option>
                                                    <option {{ ($lead->source == 'Trade Show') ? 'selected' : ''}} value="Trade Show">Trade Show</option>
                                                    <option {{ ($lead->source == 'Website') ? 'selected' : ''}} value="Website">Website</option>
                                                    <option {{ ($lead->source == 'Word of Mouth') ? 'selected' : ''}} value="Word of Mouth">Word of Mouth</option>
                                                    <option {{ ($lead->source == 'Email') ? 'selected' : ''}} value="Email">Email</option>
                                                    <option {{ ($lead->source == 'Campaign') ? 'selected' : ''}} value="Campaign">Campaign</option>
                                                    <option {{ ($lead->source == 'Other') ? 'selected' : ''}} value="Other">Other</option>                                                    
                                                </select>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="lead-name">Source Description</label>
                                                <input type="text" class="form-control" id="lead-name" name="source_description" value="{{ $account->source_description }}" placeholder="Enter your lead's full name">
                                            </div>

                                            <div class="form-group">
                                                <label for="lead-name">Referred By</label>
                                                <input type="text" class="form-control" id="lead-name" name="referred_by" placeholder="Enter your lead's full name">
                                            </div>

                                            <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
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
        
            
        @include("partials.modal")

        @include("partials.foot.index")
    </body>
</html>
