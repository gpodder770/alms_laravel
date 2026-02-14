@extends('employee.layout.app')

@section('title')
    <title>Employee | Apply Leave</title>
@endsection

@push('css')

@endpush

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-xl">
                <div class="p-3 card mini-stats">
                    <div class=" mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 >Sick Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">{{ $sick }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="p-3 card mini-stats">
                    <div class=" mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 >Public Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">{{ $public }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="p-3 card mini-stats">
                    <div class=" mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 >Casual Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">{{ $casual }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="p-3 card mini-stats">
                    <div class=" mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 >Special Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">{{ $special }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="p-3 card mini-stats">
                    <div class=" mini-stats-content">
                        <div class="mb-4 text-center">
                            <h5 >Earned Leave</h5>
                        </div>
                    </div>
                    <div class="mx-3">
                        <div class="card mb-0 border p-3 mini-stats-desc">
                            <div class="text-center">
                                <h5 class="">{{ $earned }}</h5>
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
                        <form class="row g-3" action="{{ route('employee.apply_leave_submit') }}" method="post">
                            @csrf
                            <div class="col-md-4">
                                <label for="leave_type" class="form-label">Leave Type<span
                                        style="color:red">*</span></label>
                                <select class="form-select" id="leave_type" name="leave_type" required>
                                    <option value="">Choose Leave Type</option>
                                    <option value="0">Sick</option>
                                    <option value="1">Public</option>
                                    <option value="2">Casual</option>
                                    <option value="3">Special</option>
                                    <option value="4">Earned</option>
                                    <option value="5">Halfday</option>
                                </select>
                                @error('leave_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">Start Date<span
                                        style="color:red">*</span></label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" name="start_date"
                                        required>
                                </div>
                                @error('start_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">End Date</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control" name="end_date"
                                        maxDate="new Date(lastDateOfYear)">
                                </div>
                                @error('end_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Reason for Leave<span style="color:red">*</span></label>
                                <textarea id="textarea" class="form-control" maxlength="225" name="leave_reason" rows="3"
                                    placeholder="Reson for Leave" required></textarea>
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
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Leave Applied</h4>
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Number of Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Manager Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_leave_info as $each_all_leave_info)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- type --}}
                                        @if ($each_all_leave_info->leave_type == 0 )
                                            <td>Sick</td>
                                        @elseif ($each_all_leave_info->leave_type == 1 )
                                            <td>Public</td>
                                        @elseif ($each_all_leave_info->leave_type == 2 )
                                            <td>Casual</td>
                                        @elseif ($each_all_leave_info->leave_type == 3 )
                                            <td>Special</td>
                                        @elseif ($each_all_leave_info->leave_type == 4 )
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
