@extends('admin.layout.app')

@section('title')
    <title>Admin | Employee Leave</title>
@endsection

@push('css')
    <style>
        ul {
            display: flex;
            list-style: none;
            padding: 0;
        }
    </style>
@endpush

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-5 card-title">Employee Leave</h4>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="table-responsive mt-4">
                            <table class="table table-hover mb-0 table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Days</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($employees_leave_info_array_size == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Records Found</td>
                                        </tr>
                                    @else
                                        @foreach ($employees_leave_info as $each_employee_leave_info)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $each_employee_leave_info->employee_id }}</td>
                                                <td>{{ $each_employee_leave_info->first_name . ' ' . $each_employee_leave_info->last_name }}
                                                </td>
                                                @if ($each_employee_leave_info->leave_type == 0)
                                                    <td>Sick</td>
                                                @elseif ($each_employee_leave_info->leave_type == 1)
                                                    <td>Public</td>
                                                @elseif ($each_employee_leave_info->leave_type == 2)
                                                    <td>Casual</td>
                                                @elseif ($each_employee_leave_info->leave_type == 3)
                                                    <td>Special</td>
                                                @elseif ($each_employee_leave_info->leave_type == 4)
                                                    <td>Earned</td>
                                                @endif
                                                <td>{{ $each_employee_leave_info->start_date }}</td>
                                                <td>{{ $each_employee_leave_info->end_date }}</td>
                                                <td>{{ $each_employee_leave_info->number_of_days }}</td>
                                                <td>{{ $each_employee_leave_info->leave_reason }}</td>
                                                <td>{{ $each_employee_leave_info->comment }}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="btn btn-outline-secondary btn-sm me-2"
                                                                title="Accept Leave"><i class="fas fa-check"></i></a>
                                                        </li>
                                                        <li><a href="#" class="btn btn-outline-secondary btn-sm"
                                                                title="Deactivate User"><i class="fas fa-times"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection

@push('script')
@endpush
