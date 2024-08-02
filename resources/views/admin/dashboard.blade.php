@extends('admin.layout.app')

@push('css')
<style>
    .delete_btn {
  display: inline;
}
</style>
@endpush

@section('title')
    <title>Admin | Dashboard</title>
@endsection

@section('body')
    <div class="container-fluid">
        <h1 class="dashboard_name_heading">Welcome, <span>{{ $admin_name }}</span></h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Employees</h4>
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
                        <div class="table-responsive mt-4">
                            <table class="table table-hover mb-0 table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Employee ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Profile Pic</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($employees_array_size == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Records Found</td>
                                        </tr>
                                    @else
                                        @foreach ($employees as $each_employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $each_employee->employee_id }}</td>
                                                <td>{{ $each_employee->first_name . ' ' . $each_employee->last_name }}</td>
                                                <td>{{ $each_employee->email }}</td>
                                                <td>{{ $each_employee->profile_pic }}</td>
                                                <td>
                                                    @if ($each_employee->status == 1)
                                                        <a href="{{ route('admin.edit_employee',$each_employee->id) }}" class="btn btn-outline-secondary btn-sm"
                                                            title="Edit">
                                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                                        </a>
                                                        {{-- <a class="btn btn-outline-secondary btn-sm" title="Delete">
                                                            <i class="fas fa-trash-alt" title="Delete"></i>
                                                        </a> --}}
                                                        <form class="delete_btn" action="{{ route('admin.delete_employee',$each_employee->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline-secondary btn-sm" title="Delete" type="submit" onclick="return confirm('Are you sure? This will remove EVERY information of this user.')"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    @else
                                                        <a class="btn btn-outline-danger btn-sm" title="Deactivated">
                                                            Deactivated
                                                        </a>
                                                        <form class="delete_btn" action="{{ route('admin.delete_employee',$each_employee->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline-secondary btn-sm" title="Delete" type="submit" onclick="return confirm('Are you sure? This will remove EVERY information of this user.')"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    
@endpush
