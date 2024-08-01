<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
use Hash;
use Carbon\Carbon;
use DB;

use App\Models\Employee;
use App\Models\EmployeesLeave;
use App\Models\Attendance;

class AdminController extends Controller
{
    public function login()
    {
        if(!empty(Auth::guard('admin')->user()->id)){
            return redirect()->route('admin.dashboard');
        }else{
            return view('admin.auth.login');
        }
    }

    public function login_submit(Request $request){
        // dd($request);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Auth::guard('employee')->logout();
            return redirect()->route('admin.dashboard');
        }else{
            // Session::flash('error-message','Invalid Email or Password');
            return back()->with('error', "Invalid Email or Password");
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $admin_name = Auth::guard('admin')->user()->first_name ." ". Auth::guard('admin')->user()->last_name;
        $employees = Employee::select('id','employee_id','first_name','last_name','email','profile_pic','status')->get();
        $employees_array_size = $employees->count();
        return view('admin.dashboard',compact('admin_name','employees','employees_array_size'));
    }

    public function delete_employee($id){
        $is_there = Employee::find($id);
        if (is_null($is_there)) {
            return back()->with('error', "Something Went Wrong");
        }else{
            $employee_name = $is_there->first_name . ' ' . $is_there->last_name;
            $is_there->delete();
            $attendance_info = Attendance::where('employee_id',$id)->delete();
            $leave_info = EmployeesLeave::where('employee_id',$id)->delete();
            // Session::flash('error-message','Invalid Email or Password');
            return back()->with('success', "$employee_name Has Been Deleted Successfully");
        }
        dd($is_there);
    }
}
