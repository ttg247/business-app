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
                                    <div class="card-header"><h3>Use the form below to create a new contact</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('accounts.store') }}" class="form-horizontal" method="POST">
                                            @csrf
                                            @method('post')
                                            <div class="form-group">
                                                <label for="example-name">Account Name</label>
                                                <input type="text" placeholder="Enter your business name" class="form-control" name="name" id="business-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-name">Website</label>
                                                <input type="text" placeholder="Enter the business website" class="form-control" name="website" id="business-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-name">Summary</label>
                                                <input type="text" placeholder="Briefly summarize what your business does" class="form-control" name="summary" id="business-summary">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-message">Description</label>
                                                <textarea placeholder="Write the content that defines your about page" name="details" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email">Email</label>
                                                <input type="email" placeholder="Enter the business email address" class="form-control" name="email" id="business-email">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Phone</label>
                                                <input type="text" placeholder="Enter the business phone number" id="example-phone" name="phone" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Street</label>
                                                <input type="text" placeholder="Enter the business street" id="example-address" name="address" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Postal Code</label>
                                                <input type="text" placeholder="Enter the post code" id="example-address" name="postal_code" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">City</label>
                                                <input type="text" placeholder="Enter the city" id="example-address" name="city" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">State</label>
                                                <input type="text" placeholder="Enter the state" id="example-address" name="state" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Country</label>
                                                <input type="text" placeholder="Enter your business address" id="example-address" name="country" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Facebook</label>
                                                <input type="text" placeholder="Enter your facebook page link" id="example-phone" name="facebook" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Twitter</label>
                                                <input type="text" placeholder="Enter your twitter page link" id="example-phone" name="twitter" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-phone">Instagram</label>
                                                <input type="text" placeholder="Enter your instagram page link" id="example-phone" name="instagram" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Type </label>
                                                <select name="type" class="form-control select2">
                                                    <option value="Analyst">Analyst</option>
                                                    <option value="Competitor">Competitor</option>
                                                    <option value="Customer">Customer</option>
                                                    <option value="Integrator">Integrator</option>
                                                    <option value="Investor">Investor</option>
                                                    <option value="Partner">Partner</option>
                                                    <option value="Press">Press</option>
                                                    <option value="Prospect">Prospect</option>
                                                    <option value="Reseller">Reseller</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="example-name">Annual Revenue</label>
                                                <input type="text" placeholder="Enter your Annual Revenue" class="form-control" name="revenue" id="business-name">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="example-name">Industry</label>
                                                <input type="text" placeholder="Enter the industry" class="form-control" name="industry" id="business-name">
                                            </div>

                                            <div class="form-group">
                                                <label for="example-name">Invite Link Code</label>
                                                <input type="text" placeholder="Enter the invite link code" class="form-control" name="invitation" id="business-name">
                                            </div>

                                            <button class="btn btn-success" type="submit">Create Account</button>
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
