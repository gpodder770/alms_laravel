@extends('employee.layout.app')

@section('title')
    <title>Employee | Attendance</title>
@endsection

@push('css')
    
@endpush

@section('body')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Attendance</h4>
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
                        <form action="{{ route('employee.attendance_leave_submit') }}" method="post" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-4">
                                <label class="form-label">Attendance Date</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" name="attendace_date" required>
                                </div>
                                <div class="invalid-feedback">
                                    Please select date.
                                </div>
                            </div>
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Start Time</label>
                                <div class="input-group has-validation">
                                    <input type="time" class="form-control" name="start_time">
                                </div>
                                <div class="invalid-feedback">
                                    Please enter start time.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">End Time</label>
                                <div class="input-group has-validation">
                                    <input type="time" class="form-control" name="end_time">
                                </div>
                                <div class="invalid-feedback">
                                    Please enter end time.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Tasks Done</label>
                                <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="reason"
                                    placeholder="Please provide what you did."></textarea>
                                <div class="invalid-feedback">
                                    Please provide what you did.
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Attendance Applied</h4>

                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Attendance Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_attendace_info as $each_attendace_info)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$each_attendace_info->attendace_date}}</td>
                                        <td>{{$each_attendace_info->start_time}}</td>
                                        <td>{{$each_attendace_info->end_time}}</td>
                                        <td>{{$each_attendace_info->reason}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    <!-- Required datatable js -->
@endsection

@push('script')

@endpush
