@extends('admin.layout.app')

@section('title')
    <title>Admin | Employee Profile</title>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">

    <style>
        
        .card-body{
            position: relative;
        }
        .profile_image_view{
            position: absolute;
            width: 180px;
            border-radius: 50%;
            right: 20px;
            top: 20px;

        }
    </style>
@endpush

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-5 card-title">Employee Information</h4>
                        <form action="{{ route('admin.edit_employee_submit', $is_there->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="validationCompanyLocation" class="form-label">Company Location</label>
                                    <select class="form-select" name="company_location" id="validationCompanyLocation" aria-label="Default select example">
                                        <option value="0" {{ $is_there->company_location == 0 ? 'selected="selected"' : '' }}>
                                            Bangladesh</option>
                                        <option value="1" {{ $is_there->company_location == 1 ? 'selected="selected"' : '' }}>
                                            India</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a company location.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="validationEmployeeId" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" name="employee_id" value="{{ $is_there->employee_id }}" id="validationEmployeeId" required>
                                    @error('employee_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="validationEmail" class="form-label">Employee Company Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="PersonalEmailGroupPrepend">@</span>
                                        <input type="email" class="form-control" name="email" value="{{ $is_there->email }}"
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
                                    <input type="text" class="form-control" name="first_name" id="validationFirstName"
                                        value="{{ $is_there->first_name }}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationLastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="validationLastName"
                                        value="{{ $is_there->last_name }}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationEmail" class="form-label">Personal Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="PersonalEmailGroupPrepend">@</span>
                                        <input type="text" class="form-control" name="personal_email"
                                            id="validationEmail" aria-describedby="PersonalEmailGroupPrepend"
                                            value="{{ $is_there->personal_email }}">
                                        <div class="invalid-feedback">
                                            Please enter email.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="validationDOB" class="form-label">Date of Birth</label>
                                    <div class="input-group has-validation">
                                        <input type="date" class="form-control" id="validationDOB" name="birthday"
                                            value="{{ $is_there->birthday }}">
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter Date of Birth.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationGender" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" id="validationGender"  aria-label="Default select example">
                                        <option value="0" {{ $is_there->gender == 0 ? 'selected="selected"' : '' }}>
                                            Male</option>
                                        <option value="1" {{ $is_there->gender == 1 ? 'selected="selected"' : '' }}>
                                            Female</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a gender.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationContact" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="validationContact" name="personal_phone"
                                        value="{{ $is_there->personal_phone }}">
                                    <div class="invalid-feedback">
                                        Please enter Contact Number.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="validationNID" class="form-label">NID</label>
                                    <input type="text" class="form-control" id="validationNID" name="nid"
                                        value="{{ $is_there->nid }}">
                                    <div class="invalid-feedback">
                                        Please enter NID.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDepartment" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="validationDepartment" name="department"
                                        value="{{ $is_there->department }}">
                                    <div class="invalid-feedback">
                                        Please enter Department.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDegree" class="form-label">Degree</label>
                                    <input type="text" class="form-control" id="validationDegree" name="degree"
                                        value="{{ $is_there->degree }}">
                                    <div class="invalid-feedback">
                                        Please enter Degree.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <textarea id="textarea" class="form-control" name="address" maxlength="225" rows="3">{{ $is_there->address }}</textarea>
                                    <div class="invalid-feedback">
                                        Please enter Address.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="employee_image" class="form-label">Image</label>
                                    <div class="form-group">
                                        @if($is_there->profile_pic)
                                        <img src="{{ asset('upload/employee_images/'.$is_there->profile_pic) }}" class="profile_image_view" alt="Profile Picture">
                                        @endif
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
