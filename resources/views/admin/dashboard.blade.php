@extends('admin.layout.app')

@section('title')
    <title>Admin | Dashboard</title>
@endsection

@section('body')
    <div class="container-fluid">
        <h1 class="dashboard_name_heading">Welcome, <span>{{$admin_name}}</span></h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Employees</h4>
                        <div class="table-responsive mt-4">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Employee ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Profile Pic</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($employees_array_size == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Records Found</td>
                                        </tr>
                                    @else
                                        @foreach ($employees as $each_employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $each_employee->employee_id }}</td>
                                                <td>{{ $each_employee->first_name ." ". $each_employee->last_name }}</td>
                                                <td>{{ $each_employee->email }}</td>
                                                <td>{{ $each_employee->profile_pic }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
