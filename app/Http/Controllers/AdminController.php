<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Hash;
use Carbon\Carbon;
use DB;

use App\Models\Employee;

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
            return redirect()->route('admin.dashboard');
        }else{
            Session::flash('error-message','Invalid Email or Password');
            return back();
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $admin_name = Auth::guard('admin')->user()->first_name ." ". Auth::guard('admin')->user()->last_name;
        $employees = Employee::select('employee_id','first_name','last_name','email','profile_pic')->get();
        $employees_array_size = $employees->count();
        return view('admin.dashboard',compact('admin_name','employees','employees_array_size'));
    }
}
