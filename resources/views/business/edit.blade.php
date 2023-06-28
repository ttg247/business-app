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
                                        <i class="ik ik-folder bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Create New Accounts</h5>
                                            <span>Capture account details for the CRM</span>
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
                                                <a href="">Accounts Manager</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Use the form below to edit an existing account</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('accounts.update', $account->id) }}" class="form-horizontal" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="example-name">Account Name</label>
                                                <input type="text" placeholder="Enter your business name" class="form-control" name="name" value="{{ $account->name ?? ''}}" id="business-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-name">Website</label>
                                                <input type="text" placeholder="Enter the business website" class="form-control" name="website" value="{{ $account->website ?? ''}}" id="business-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-name">Summary</label>
                                                <input type="text" placeholder="Briefly summarize what your business does" class="form-control" name="summary" value="{{ $account->summary ?? ''}}" id="business-summary">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-message">Description</label>
                                                <textarea placeholder="Write the content that defines your about page" name="details" rows="5" class="form-control">{{ $account->details ?? ''}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">Email</label>
                                                <input type="email" placeholder="Enter the business email address" class="form-control" name="email" value="{{ $account->email ?? ''}}" id="business-email">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Phone</label>
                                                <input type="text" placeholder="Enter the business phone number"  name="phone" value="{{ $account->phone ?? ''}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Street</label>
                                                <input type="text" placeholder="Enter the business street" name="street" value="{{ $account->address->street ?? ''}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Postal Code</label>
                                                <input type="text" placeholder="Enter the post code" name="post_code" value="{{ $account->address->postal_code ?? ''}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">City</label>
                                                <input type="text" placeholder="Enter the city" name="city" value="{{ $account->address->city ?? ''}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">State</label>
                                                <input type="text" placeholder="Enter the state" name="state" value="{{ $account->address->state ?? ''}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Country</label>
                                                <input type="text" placeholder="Enter your business address" name="country" value="{{ $account->address->country ?? ''}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Facebook</label>
                                                <input type="text" placeholder="Enter your facebook page link" name="facebook" value="{{ $account->facebook ?? ''}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Twitter</label>
                                                <input type="text" placeholder="Enter your twitter page link" name="twitter" value="{{ $account->twitter ?? ''}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Instagram</label>
                                                <input type="text" placeholder="Enter your instagram page link" name="instagram" value="{{ $account->instagram ?? ''}}" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="type">Type </label>
                                                <select name="type" class="form-control select2">
                                                    <option {{ $account->type == 'Analyst' ? 'selected' : ''}} value="Analyst">Analyst</option>
                                                    <option {{ $account->type == 'Competitor' ? 'selected' : ''}} value="Competitor">Competitor</option>
                                                    <option {{ $account->type == 'Customer' ? 'selected' : ''}} value="Customer">Customer</option>
                                                    <option {{ $account->type == 'Integrator' ? 'selected' : ''}} value="Integrator">Integrator</option>
                                                    <option {{ $account->type == 'Investor' ? 'selected' : ''}} value="Investor">Investor</option>
                                                    <option {{ $account->type == 'Partner' ? 'selected' : ''}} value="Partner">Partner</option>
                                                    <option {{ $account->type == 'Press' ? 'selected' : ''}} value="Press">Press</option>
                                                    <option {{ $account->type == 'Prospect' ? 'selected' : ''}} value="Prospect">Prospect</option>
                                                    <option {{ $account->type == 'Reseller' ? 'selected' : ''}} value="Reseller">Reseller</option>
                                                    <option {{ $account->type == 'Other' ? 'selected' : ''}} value="Other">Other</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="example-name">Annual Revenue</label>
                                                <input type="text" placeholder="Enter your Annual Revenue" class="form-control" name="revenue" value="{{ $account->revenue ?? ''}}" id="account-revenue">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="example-name">Industry</label>
                                                <input type="text" placeholder="Enter the industry" class="form-control" name="industry" value="{{ $account->industry ?? ''}}" id="account-industry">
                                            </div>

                                            <div class="form-group">
                                                <label for="example-name">Invite Link Code</label>
                                                <input type="text" placeholder="Enter the invite link code" class="form-control" name="invitation" value="{{ $account->invite_link ?? ''}}" id="invitation">
                                            </div>

                                            <button class="btn btn-success" type="submit">Update Account Info</button>
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
        
        
       
        @include("partials.modal");

        @include("partials.foot.index")
    </body>
</html>
