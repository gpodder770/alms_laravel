@extends('employee.auth.layout.app')

@push('css')
@endpush

@section('body')
    <!-- Loader -->
    {{-- <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div> --}}

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="account-pages mt-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="d-flex p-3">
                                <div>
                                    <a href="index.html" class="">
                                        <img src="{{ asset('vendor/foxia/images/logo_dark.png') }}" alt=""
                                            height="22" class="auth-logo logo-dark">
                                        <img src="{{ asset('vendor/foxia/images/logo.png') }}" alt="" height="22"
                                            class="auth-logo logo-light">
                                    </a>
                                </div>
                                <div class="ms-auto text-end">
                                    <h4 class="font-size-18">Employee Login</h4>
                                    {{-- <p class="text-muted mb-0">Sign in to continue to Foxia.</p> --}}
                                </div>
                            </div>
                            <div class="p-3">
                                <form class="form-horizontal" action="{{ route('employee.login_submit') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="text" class="form-control" id="username" name="email"
                                            placeholder="Enter username">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password"
                                            placeholder="Enter password">
                                    </div>
                                    <div class="row mt-4">
                                        {{-- <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customControlInline">
                                                <label class="form-check-label" for="customControlInline">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Login</button>
                                        </div>
                                    </div>
                                    <div class="mb-0 row">
                                        <div class="col-12 mt-4 text-center">
                                            <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i>
                                                Forgot your password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center position-relative">
                        {{-- <p class="text-white-50">Don't have an account ? <a href="pages-register.html" class="fw-bold text-white"> Signup Now </a> </p> --}}
                        <p class="text-white-50"> ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Foxia. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                            Themesbrand
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
