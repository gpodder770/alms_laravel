@extends('admin.layout.app')

@section('title')
    <title>Admin | New Employee</title>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
@endpush

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-5 card-title">Employee Information</h4>
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
                        <form action="{{ route('admin.new_employee_submit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                
                                <div class="col-md-4">
                                    <label for="validationCompanyLocation" class="form-label">Company Location</label>
                                    <select class="form-select" name="company_location" id="validationCompanyLocation"
                                        aria-label="Default select example" required>
                                        <option value="">
                                            Select Company Location</option>
                                        <option value="0">
                                            Bangladesh</option>
                                        <option value="1">
                                            India</option>
                                    </select>
                                    @error('company_location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="validationEmployeeId" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" name="employee_id" id="validationEmployeeId" required>
                                    @error('employee_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationEmail" class="form-label">Employee Company Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="PersonalEmailGroupPrepend">@</span>
                                        <input type="email" class="form-control" name="email"
                                            id="validationEmail" aria-describedby="PersonalEmailGroupPrepend" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="validationFirstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" name="first_name" id="validationFirstName" required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationLastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="validationLastName" required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationEmail" class="form-label">Personal Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="PersonalEmailGroupPrepend">@</span>
                                        <input type="email" class="form-control" name="personal_email"
                                            id="validationEmail" aria-describedby="PersonalEmailGroupPrepend" required>
                                        @error('personal_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="validationDOB" class="form-label">Date of Birth</label>
                                    <div class="input-group has-validation">
                                        <input type="date" class="form-control" id="validationDOB" name="birthday" required>
                                    </div>
                                    @error('birthday')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationGender" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" id="validationGender"
                                        aria-label="Default select example" required>
                                        <option value="0">
                                            Male</option>
                                        <option value="1">
                                            Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationContact" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="validationContact" name="personal_phone" required>
                                    @error('personal_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="validationNID" class="form-label">NID</label>
                                    <input type="text" class="form-control" id="validationNID" name="nid" required>
                                    @error('nid')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDepartment" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="validationDepartment"
                                        name="department" required>
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDegree" class="form-label">Degree</label>
                                    <input type="text" class="form-control" id="validationDegree" name="degree" required>
                                    @error('degree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <textarea id="textarea" class="form-control" name="address" maxlength="225" rows="3" required></textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="employee_image" class="form-label">Image</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="profile_pic"
                                            id="employee_image" onchange="image_verify(this)" required>
                                        <p id="employee_image-result" class="alert alert-danger d-none my-2"></p>
                                        <p class="help-block text-red">Only jpg/png are allowed.</p>
                                        @error('profile_pic')
                                            <div class="alert alert-danger mt-2"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection

@push('script')
    {{-- Intializing Flatpickr --}}
    <script src="{{ asset('js/flatpickr.min.js') }}"></script>

    <script>
        flatpickr("#validationDOB", {});
    </script>
@endpush
