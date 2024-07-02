@extends('employee.layout.app')

@section('title')
    <title>Employee | Dashboard</title>
@endsection

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
                                        {{-- <th scope="col">(#) Id</th> --}}
                                        <th scope="col">Date</th>
                                        <th scope="col">Name of Day</th>
                                        <th scope="col">Occasion</th>
                                        <th scope="col">Days Left</th>
                                        {{-- <th scope="col">Upcoming</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($holiday_array_size == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Records Found</td>
                                        </tr>
                                    @else
                                        @foreach ($holidays as $each_holiday)
                                            <tr>
                                                {{-- <th scope="row">#16252</th> --}}
                                                <td>{{ $each_holiday->date }}</td>
                                                <td>{{ $each_holiday->name_of_day }}</td>
                                                <td>{{ $each_holiday->occasion }}</td>
                                                <td>{{ $each_holiday->days_left > 0 ? $each_holiday->days_left . ' ' . 'days' : 'Today' }}
                                                </td>
                                                {{-- <td>$80</td> --}}
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Leave Status</h4>
                        <div class="table-responsive mt-4">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Number of Days</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($all_leave_info_array_size == 0)
                                        <tr>
                                            <td colspan="7" class="text-center">No Records Found</td>
                                        </tr>
                                    @else
                                        @foreach ($all_leave_info as $each_all_leave_info)
                                            <tr>
                                                {{-- type --}}
                                                @if ($each_all_leave_info->leave_type == 0)
                                                    <td>Sick</td>
                                                @elseif ($each_all_leave_info->leave_type == 1)
                                                    <td>Public</td>
                                                @elseif ($each_all_leave_info->leave_type == 2)
                                                    <td>Casual</td>
                                                @elseif ($each_all_leave_info->leave_type == 3)
                                                    <td>Special</td>
                                                @elseif ($each_all_leave_info->leave_type == 4)
                                                    <td>Earned</td>
                                                @endif
                                                {{-- type --}}
                                                <td>{{ $each_all_leave_info->start_date }}</td>
                                                <td>{{ $each_all_leave_info->end_date }}</td>
                                                <td>{{ $each_all_leave_info->number_of_days }}</td>
                                                <td>{{ $each_all_leave_info->leave_reason }}</td>
                                                {{-- status --}}
                                                @if ($each_all_leave_info->status == 0 )
                                            <td><h5><span class="badge bg-warning">Pending</span></h5></td>
                                        @elseif ($each_all_leave_info->status == 1 )
                                            <td><h5><span class="badge bg-success">Approved</span></h5></td>
                                        @else
                                            <td><h5><span class="badge bg-danger">Cancelled</span></h5></td>
                                        @endif
                                                {{-- status --}}
                                                <td>{{ $each_all_leave_info->comment }}</td>
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
        <!-- end row -->
    </div>
@endsection
