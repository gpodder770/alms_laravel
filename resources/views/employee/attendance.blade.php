@extends('employee.layout.app')

@section('title')
    <title>Employee | Attendance</title>
@endsection

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('vendor/foxia/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }} " rel="stylesheet"
        type="text/css">
    <link href="{{ asset('vendor/foxia/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }} " rel="stylesheet"
        type="text/css">
    <link href="{{ asset('vendor/foxia/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{ asset('vendor/foxia/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('vendor/foxia/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('vendor/foxia/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
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
                                    <input type="date" class="form-control" id="date" name="attendace_date" required>
                                </div>
                                <div class="invalid-feedback">
                                    Please enter email.
                                </div>
                            </div>
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Start Time</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" id="time" name="start_time">
                                </div>
                                <div class="invalid-feedback">
                                    Please enter email.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">End Time</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" id="time" name="end_time">
                                </div>
                                <div class="invalid-feedback">
                                    Please enter email.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Reason for Leave</label>
                                <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="reason"
                                    placeholder="This textarea has a limit of 225 chars."></textarea>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
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

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
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
    <!-- Required datatable js -->
    <script src="{{ asset('vendor/foxia/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('vendor/foxia/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('vendor/foxia/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $("#datatable-buttons").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
    </script>

    {{-- Intializing Flatpickr --}}
    <script src="{{ asset('js/flatpickr.min.js') }}"></script>

    {{-- Stopping user from applying leave beyond or before the current year and before currentdate --}}
    <script>
        var year = new Date().getFullYear();
        const today = new Date();
        const earlyThreeDays = new Date(today.setDate(today.getDate() - 3));
        const company_location = {{ Auth::guard('employee')->user()->company_location }};
        // console.log(today);

        if (company_location == 0) {
            flatpickr("#date", {
                minDate: earlyThreeDays,
                maxDate: "today",
                disable: [
                    function(date) {
                        // Fridays
                        return date.getDay() === 5;
                    },
                    function(date) {
                        // Saturdays
                        return date.getDay() === 6;
                    }
                ]
            });
        } else {
            flatpickr("#date", {
                minDate: earlyThreeDays,
                maxDate: "today",
                disable: [
                    function(date) {
                        // Sundays
                        return date.getDay() === 0;
                    },
                    function(date) {
                        // Saturdays
                        return date.getDay() === 6;
                    }
                ]
            });
        }
        flatpickr("#time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
    </script>
@endpush
