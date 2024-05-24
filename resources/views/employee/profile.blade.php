@extends('employee.layout.app')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-5 card-title">My Information</h4>
                    {{-- <p class="card-title-desc">Your Information</p> --}}
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label for="validationFirstName" class="form-label">First name</label>
                            <input type="text" class="form-control" name="first_name" id="validationFirstName" value="{{ $employee_info->first_name }}" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationLastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="last_name" id="validationLastName" value="{{ $employee_info->last_name }}" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationEmail" class="form-label">Personal Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="PersonalEmailGroupPrepend">@</span>
                                <input type="text" class="form-control" name="personal_email" id="validationEmail" aria-describedby="PersonalEmailGroupPrepend" value="{{ $employee_info->personal_email }}" disabled>
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
                                <input type="date" class="form-control" id="validationDOB" name="birthday" value="{{ $employee_info->birthday }}" disabled>
                            </div>
                            <div class="invalid-feedback">
                                Please enter Date of Birth.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationGender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="validationDOB" name="gender" value="{{ $employee_info->gender == 0 ? "Male" : "Female" }}" disabled>
                            <div class="invalid-feedback">
                                Please select a gender.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom05" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="validationDOB" name="personal_phone" value="{{ $employee_info->personal_phone }}" disabled>
                            <div class="invalid-feedback">
                                Please enter Contact Number.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label for="validationNID" class="form-label">NID</label>
                            <input type="text" class="form-control" id="validationDOB" name="nid" value="{{ $employee_info->nid }}" disabled>
                            <div class="invalid-feedback">
                                Please enter NID.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" id="validationDOB" name="department" value="{{ $employee_info->department }}" disabled>
                            <div class="invalid-feedback">
                                Please enter Department.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDegree" class="form-label">Degree</label>
                            <input type="text" class="form-control" id="validationDOB" name="degree" value="{{ $employee_info->degree }}" disabled>
                            <div class="invalid-feedback">
                                Please enter Degree.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <textarea id="textarea" class="form-control" name="address" maxlength="225" rows="3" disabled>{{ $employee_info->address }}</textarea>
                            <div class="invalid-feedback">
                                Please enter Address.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>

@endsection