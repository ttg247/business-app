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
                                            <h5>Accounts</h5>
                                            <span>All accounts in the CRM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">All Accounts</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="advanced_table" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="nosort" width="10">
                                                        <label class="custom-control custom-checkbox m-0">
                                                            <input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </th>
                                                    <th class="nosort">#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Website</th>
                                                    <th>City</th>
                                                    <th>Invitation</th>
                                                    <th>Actions</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($businesses as $business)
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $business->name ?? '' }}</td>
                                                    <td>{{ $business->email }}</td>
                                                    <td>{{ $business->website }}</td>
                                                    <td>{{ $business->address->city ?? '' }}</td>
                                                    <td>{{ $business->invite_link ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ url('accounts/'.$business->id.'/edit') }}"><i class="ik ik-edit f-16 mr-12 text-success"></i></a>
                                                        <a href="{{ url('accounts/delete/'.$business->id) }}"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
