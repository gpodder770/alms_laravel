@extends('employee.layout.app')

@section('title')
    <title>Employee | Change Password</title>
@endsection

@section('body')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password</h4>
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
                        <form action="{{ route('employee.change_password_submit') }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="validationCurrentPassword" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password"
                                        id="validationCurrentPassword" placeholder="Please Enter Current Password"
                                        onkeyup="validateCurrentPassword()" required>
                                    @error('current_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-3 mb-0 d-none alert alert-danger" id="current_password_missing">
                                        <strong>Current Password Missing</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="validationPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="password" id="validationPassword"
                                        placeholder="Please Enter Password" onkeyup="validateNewPassword()" required>
                                    {{-- @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col-md-6">
                                    <label for="validationConfirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="validationConfirmPassword" placeholder="Please Enter Password Again"
                                        onkeyup="validateNewPassword()" required>
                                    {{-- @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                @error('password')
                                    <div class="col-md-12 mt-3 mb-0">
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    </div>
                                @enderror
                                <div class="col-md-12">
                                    <div class="mt-3 mb-0 d-none alert alert-success" id="pass_match">
                                        <strong>Passwords Match</strong>
                                    </div>
                                    <div class="mt-3 mb-0 d-none alert alert-danger" id="pass_not_match">
                                        <strong>Passwords Does Not Match</strong>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-0 col-md-12">
                                <button class="btn btn-primary" id="submit_button" type="submit" disabled>Submit</button>
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
    <script>
        function validateCurrentPassword() {
            const current_pass = document.getElementById("validationCurrentPassword").value;
            const current_password_missing = $('#current_password_missing');

            if (current_pass.length !== 0) {
                current_password_missing.removeClass('d-block');
                current_password_missing.addClass('d-none');
            }
            validateNewPassword();
        }
    </script>

    <script>
        function validateNewPassword() {
            // Get form fields
            const current_pass = document.getElementById("validationCurrentPassword").value;
            const new_pass = document.getElementById("validationPassword").value;
            const confirm_pass = document.getElementById("validationConfirmPassword").value;
            const current_password_missing = $('#current_password_missing');
            const pass_match = $('#pass_match');
            const pass_not_match = $('#pass_not_match');

            if (current_pass.length === 0) {
                pass_not_match.addClass('d-none');
                pass_match.addClass('d-none');
                current_password_missing.removeClass('d-none');
                current_password_missing.addClass('d-block');
                document.getElementById("submit_button").disabled = true;
            } else if (new_pass == confirm_pass && new_pass.length != 0 && confirm_pass.length != 0) {
                current_password_missing.removeClass('d-block');
                current_password_missing.addClass('d-none');
                pass_match.removeClass('d-none');
                pass_match.addClass('d-block');
                pass_not_match.removeClass('d-block');
                pass_not_match.addClass('d-none');
                document.getElementById("submit_button").disabled = false;
            } else if (new_pass != confirm_pass && new_pass.length != 0 && confirm_pass.length != 0) {
                current_password_missing.removeClass('d-block');
                current_password_missing.addClass('d-none');
                pass_not_match.removeClass('d-none');
                pass_not_match.addClass('d-block');
                pass_match.removeClass('d-block');
                pass_match.addClass('d-none');
                document.getElementById("submit_button").disabled = true;
            } else {
                current_password_missing.removeClass('d-block');
                current_password_missing.addClass('d-none');
                pass_not_match.removeClass('d-block');
                pass_not_match.addClass('d-none');
                pass_match.removeClass('d-block');
                pass_match.addClass('d-none');
                document.getElementById("submit_button").disabled = true;
            }
        }
    </script>
@endpush
