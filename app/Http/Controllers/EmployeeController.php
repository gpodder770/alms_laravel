<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Hash;

use App\Models\Employee;

class EmployeeController extends Controller
{
    //todo: admin login form
    public function login()
    {
        if(!empty(Auth::guard('employee')->user()->id)){

            return redirect()->route('employee.dashboard');
        }else{
            return view('employee.auth.login');
        }
    }

    //todo: admin login functionality
    public function login_submit(Request $request){
        // dd($request);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('employee.dashboard');
        }else{
            Session::flash('error-message','Invalid Email or Password');
            return back();
        }
    }

    //todo: admin logout functionality
    public function logout(){
        Auth::guard('employee')->logout();
        return redirect()->route('employee.login');
    }

    public function dashboard()
    {
        return view('employee.dashboard');
    }

    public function profile(){
        $employee_info = Auth::guard('employee')->user();
        // dd($employee_info);
        return view('employee.profile',compact('employee_info'));
    }
    public function change_password(){
        return view('employee.change_password');
    }
    public function change_password_submit(Request $request){
        // dd($request);
        $request->validate([
            'current_password' =>'required',
            'password' =>'required',
            'confirm_password' =>'required',
        ]);
        
        if($request->password != $request->confirm_password){
            return back()->with('error', "New Password Doesn't Match");
        }else{
            $db_password = Auth::guard('employee')->user()->password;
            // checking if current password given and database password is same
            $check = Hash::check($request->current_password,$db_password);

            if($check){
                $find_employee = Employee::find(Auth::guard('employee')->user()->id);
                $new_pass = Hash::make($request->password);
                $update_pass = $find_employee->update(['password'=>$new_pass]);

                if ($update_pass) {
                    return redirect()->route('employee.logout');
                } else {
                    return back()->with('error', 'Something went Wrong!');
                }
            }else{
                return back()->with('error', "Current Password Doesn't Match");
            }
        }
        return view('employee.change_password');
    }
    public function attendance(){
        return view('employee.attendance');
    }
    public function apply_leave(){
        return view('employee.apply_leave');
    }

    public function apply_leave_submit(Request $request){
        
    }
}
