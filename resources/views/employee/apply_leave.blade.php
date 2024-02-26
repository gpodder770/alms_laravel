@extends('employee.layout.app')

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
@endpush


@section('body')
    <div class="container">

        <div class="row">
            <div class="col-xl">
                <div class="card mini-stats">
                    <div class="p-3 mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 style="color: white;">Sick Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">48259</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="card mini-stats">
                    <div class="p-3 mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 style="color: white;">Halfday Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">48259</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="card mini-stats">
                    <div class="p-3 mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 style="color: white;">Casual Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">48259</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="card mini-stats">
                    <div class="p-3 mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 style="color: white;">Special Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">48259</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="card mini-stats">
                    <div class="p-3 mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 style="color: white;">Earned Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">48259</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Apply Leave Form</h4>
                        {{-- <p class="card-title-desc">Your Information</p> --}}
                        <form class="row g-3 needs-validation" action="" method="post">
                            @csrf
                            <div class="col-md-4">
                                <label for="leavetype" class="form-label">Leave Type</label>
                                <select class="form-select" id="leavetype" name="leavetype" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option value="1">Sick</option>
                                    <option value="2">Halfday</option>
                                    <option value="3">Public</option>
                                    <option value="4">Casual</option>
                                    <option value="5">Special</option>
                                    <option value="6">Earned</option>
                                </select>
                                @error('leavetype')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            

                            <div class="col-md-4">
                                <label for="startdate" class="form-label">Start Date</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" id="startdate" name="startdate">
                                </div>
                                @error('startdate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="enddate" class="form-label">End Date</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" id="enddate" name="enddate">
                                </div>
                                @error('enddate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Reason for Leave</label>
                                <textarea id="textarea" class="form-control" maxlength="225" name="leavereason" rows="3"
                                    placeholder="This textarea has a limit of 225 chars."></textarea>
                                    @error('leavereason')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Leave Applied</h4>
                        {{-- <p class="card-title-desc">The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built.
                        </p> --}}

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>$320,800</td>
                                    <td>$320,800</td>
                                    <td>$320,800</td>
                                </tr>

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
@endpush
