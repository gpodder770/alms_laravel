@extends('employee.layout.app')

@section('body')
<div class="container-fluid">                        

    <h1 class="dashboard_name_heading">Welcome</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Upcoming Holiday</h4>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">(#) Id</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Occasion</th>
                                    <th scope="col">Upcoming</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#16252</th>
                                    <td>14/10/2018</td>
                                    <td>1</td>
                                    <td>$80</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Leave Status</h4>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">(#) Id</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Days</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Comments</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#16252</th>
                                    <td>14/10/2018</td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                    <td>$80</td>
                                    <td>1</td>
                                    <td>$80</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Attendance</h4>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">(#) Id</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Task</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#16252</th>
                                    <td>14/10/2018</td>
                                    <td>$80</td>
                                    <td>1</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
@endsection