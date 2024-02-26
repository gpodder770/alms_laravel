@extends('employee.layout.app')

@section('body')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Change Password</h4>
                    <p class="card-title-desc">Your Information</p>
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6">
                            <label for="validationPassword" class="form-label">Password</label>
                            <input type="text" class="form-control" name="fname" id="validationPassword" placeholder="Please Enter Password" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" name="lname" id="validationConfirmPassword" placeholder="Please Enter Password Again" required>
                            <div class="valid-feedback">
                                Looks good!
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