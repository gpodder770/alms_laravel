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
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Auth::guard('employee')->logout();
            return redirect()->route('admin.dashboard');
        }else{
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

    public function edit_employee($id){
        $is_there = Employee::find($id);
        if (is_null($is_there)) {
            return back()->with('error', "Something Went Wrong");
        }else{
            return view('admin.employee_profile',compact('is_there'));
        }
    }

    public function edit_employee_submit(Request $request,$id){
        $is_there = Employee::find($id);
        if (is_null($is_there)) {
            return back()->with('error', "Something Went Wrong");
        }else{
            $data = [
                'company_location'=>$request->company_location,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'personal_email'=>$request->personal_email,
                'birthday'=>$request->birthday,
                'gender'=>$request->gender,
                'personal_phone'=>$request->personal_phone,
                'nid'=>$request->nid,
                'department'=>$request->department,
                'degree'=>$request->degree,
                'address'=>$request->address,
            ];
            $is_there->update($data);
            return redirect()->route('admin.dashboard')->with('success', "Employee Information Updated Successfully");
        }
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
            return back()->with('success', "$employee_name Has Been Deleted Successfully");
        }
    }

    public function change_employee_password($id){
        return view('admin.employee_change_password',compact('id'));
    }

    public function change_employee_password_submit(Request $request,$id){
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);
        $is_there = Employee::find($id);
        if (is_null($is_there)) {
            return back()->with('error', "Something Went Wrong");
        }else{
            $encrypt = Hash::make($request->password);
            $is_there->update(['password'=>$encrypt]);
            return redirect()->route('admin.dashboard')->with('success', "Employee Information Updated Successfully");
        }
    }

    public function change_employee_status($id){
        $is_there = Employee::find($id);
        if (is_null($is_there)) {
            return back()->with('error', "Something Went Wrong");
        }else{
            if($is_there->status == 0){
                $is_there->update(['status'=> 1]);
                return back()->with('success', "Employee Activated Successfully");
            }else{
                $is_there->update(['status'=> 0]);
                return back()->with('error', "Employee Deactivated Successfully");
            }
        }
    }

    public function new_employee(){
        return view('admin.new_employee');
    }

    public function new_employee_submit(Request $request){
        // dd($request);

        $request->validate([
            'company_location'=>'required',
            'employee_id'=>'required',
            'email'=>'required|email',
            'first_name'=>'required',
            'last_name'=>'required',
            'personal_email'=>'required|email',
            'birthday'=>'required',
            'gender'=>'required',
            'personal_phone'=>'required',
            'department'=>'required',
            'degree'=>'required',
            'address'=>'required',
            'profile_pic'=>'required|mimes:jpeg,png,jpg|max:2048',
        ]);
        // dd($request);
        $data = [
            'company_location'=>$request->company_location,
            'employee_id'=>$request->employee_id,
            'email'=>$request->email,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'personal_email'=>$request->personal_email,
            'password'=>Hash::make('admin12345'),
            'birthday'=>$request->birthday,
            'gender'=>$request->gender,
            'personal_phone'=>$request->personal_phone,
            'nid'=>$request->nid,
            'department'=>$request->department,
            'degree'=>$request->degree,
            'address'=>$request->address,
            'profile_pic'=>$request->profile_pic,
        ];
        // dd($data);

        $profile_pic_name = $request->first_name."".$request->last_name."_".date('YmdHis').".".$request->profile_pic->getClientOriginalExtension();
        $request->profile_pic->move(public_path('upload/employee_images'),$profile_pic_name);
        $data['profile_pic'] = $profile_pic_name;

        Employee::create($data);
        return back()->with('success', "Employee Created Successfully");

    }
}
