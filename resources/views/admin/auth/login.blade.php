

@extends('employee.auth.layout.app')

@push('css')
@endpush

@section('body')

    <div class="min-vh-100">
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="card">
                            <div class="card-body p-4"> 
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                                <div class="text-center mt-2">
                                    <h4 class="font-size-18">Admin Login</h4>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="form-horizontal" action="{{ route('admin.login_submit') }}" method="post">
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
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
            
                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

@endsection

