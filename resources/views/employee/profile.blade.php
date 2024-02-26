@extends('employee.layout.app')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Information</h4>
                    <p class="card-title-desc">Your Information</p>
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label for="validationFirstName" class="form-label">First name</label>
                            <input type="text" class="form-control" name="fname" id="validationFirstName" placeholder="Mark" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationLastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="lname" id="validationLastName" placeholder="Otto" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationEmail" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" name="email" id="validationEmail"
                                    aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter email.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDOB" class="form-label">Date of Birth</label>
                            <div class="input-group has-validation">
                                <input type="date" class="form-control" id="validationDOB" name="dob">
                            </div>
                            <div class="invalid-feedback">
                                Please enter email.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationGender" class="form-label">Gender</label>
                            <select class="form-select" id="validationGender" required>
                                <option selected disabled value="">Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom05" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationNID" class="form-label">NID</label>
                            <input type="text" class="form-control" id="validationNID" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" id="validationDepartment" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDegree" class="form-label">Degree</label>
                            <input type="text" class="form-control" id="validationDegree" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <textarea id="textarea" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
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
    <!-- end row -->

</div>

@endsection