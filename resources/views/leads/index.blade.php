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
                                                    <th>Account</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Creator</th>
                                                    <th>Date Created</th>
                                                    <th>Actions</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($leads as $lead)
                                                <tr>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $lead->account->name }}</td>
                                                    <td>{{ $lead->contact->name }}</td>
                                                    <td><label class="badge badge-success">{{ $lead->status }}</label></td>
                                                    <td>{{ $lead->contact->email }}</td>
                                                    <td>{{ $lead->contact->phone }}</td>
                                                    <td>{{ $lead->user->name ?? ''}}</td>
                                                    <td>{{ ($lead->created_at) ? $lead->created_at->format('d M Y') : ''  }}</td>
                                                    <td>
                                                        <a href="{{ url('leads/'.$lead->id.'/edit') }}"><i class="ik ik-edit f-16 mr-12 text-success"></i></a>
                                                        <a href="{{ url('leads/delete/'.$lead->id) }}"><i class="ik ik-trash-2 f-16 text-red"></i></a>
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
        
        
        @include("partials.modal")

        @include("partials.foot.index")
    </body>
</html>
