<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        return view('employee.profile');
    }
    public function change_password(){
        return view('employee.change_password');
    }
    public function attendance(){
        return view('employee.attendance');
    }
    public function apply_leave(){
        return view('employee.apply_leave');
    }
}
