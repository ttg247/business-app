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
                                        <i class="ik ik-user bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Edit Contact</h5>
                                            <span>Manage an existing contact in the CRM</span>
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
                                                <a href="">Contacts</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Create New contact</li>
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
                                        <form action="{{ route('contacts.update', $contact->id) }}" class="forms-sample" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="contact-name">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $contact->name }}" placeholder="Enter your contact's full name">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact-email">Email address</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $contact->email }}" placeholder="Enter your contact's email address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact-phone">Phone Number</label>
                                                        <input type="tel" class="form-control" id="contact-phone" name="phone" value="{{ $contact->phone }}" placeholder="Enter your contact's phone number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="contact-name">Street</label>
                                                <input type="text" class="form-control" id="contact-name" name="street" value="{{ $contact->address->street ?? '' }}" placeholder="Enter your contact's full name">
                                            </div>
                                            <div class="form-group">
                                                <label for="contact-name">Postal Code</label>
                                                <input type="text" class="form-control" id="contact-name" name="postal_code" value="{{ $contact->address->postal_code ?? '' }}" placeholder="Enter your contact's full name">
                                            </div>
                                            <div class="form-group">
                                                <label for="contact-name">City</label>
                                                <input type="text" class="form-control" id="contact-name" name="city" value="{{ $contact->address->city ?? '' }}" placeholder="Enter your contact's full name">
                                            </div>
                                            <div class="form-group">
                                                <label for="contact-name">State</label>
                                                <input type="text" class="form-control" id="contact-name" name="state" value="{{ $contact->address->state ?? '' }}" placeholder="Enter your contact's full name">
                                            </div>
                                            <div class="form-group">
                                                <label for="contact-name">Country</label>
                                                <input type="text" class="form-control" id="contact-name" name="country" value="{{ $contact->address->country ?? '' }}" placeholder="Enter your contact's full name">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                                            <button class="btn btn-light">Cancel</button>
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
