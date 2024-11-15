<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Hash;
use Carbon\Carbon;
use DB;

use App\Models\Employee;
use App\Models\EmployeesLeave;
use App\Models\Holidays;

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
        $old_leave_info = EmployeesLeave::where('e_id',Auth::guard('employee')->user()->id)->get();
        return view('employee.apply_leave',compact('old_leave_info'));
    }

    public function apply_leave_submit(Request $request){
        $request->validate([
            'leave_type'=>'required|numeric',
            'start_date'=>'required|date',
            'leave_reason'=>'required',
        ]);

        if($request->enddate){
            $request->validate([
                'end_date'=>'date'
            ]);
        }
        
        if(Auth::guard('employee')->user()->company_location == 0){
            // Bangladesh Employees
            if(($request->start_date == $request->end_date) || ($request->start_date && is_null($request->end_date))){
                $diffInDays = 1;
                $data = [
                    'e_id'=>Auth::guard('employee')->user()->id,
                    'leave_type'=>$request->leave_type,
                    'start_date'=>$request->start_date,
                    'end_date'=>$request->end_date,
                    'number_of_days'=>$diffInDays,
                    'leave_reason'=>$request->leave_reason,
                    'status'=>0,
                ];
    
                $create_leave = EmployeesLeave::create($data);
                if ($create_leave) {
                    return back()->with('success', 'Leave Applied Successfully');
                } else {
                    return back()->with('error', 'Something went Wrong!');
                }
            }else{
                Carbon::setWeekendDays([
                    Carbon::FRIDAY,
                    Carbon::SATURDAY,
                ]);
                $startDate = Carbon::parse($request->start_date);
                $endDate = Carbon::parse($request->end_date);
                $diffInDays = $startDate->diffInDays($endDate) + 1;
                $num_of_weekend_between_dates = $startDate->diffInDaysFiltered(function (Carbon $date){return !$date->isWeekday();}, $endDate);
                $num_of_govt_holidays = Holidays::where('company_location',0)->whereBetween('date',[$request->start_date,$request->end_date])->get()->count();
                $total_num_of_holidays = $diffInDays - $num_of_weekend_between_dates - $num_of_govt_holidays;
                $data = [
                    'e_id'=>Auth::guard('employee')->user()->id,
                    'leave_type'=>$request->leave_type,
                    'start_date'=>$request->start_date,
                    'end_date'=>$request->end_date,
                    'number_of_days'=>$total_num_of_holidays,
                    'leave_reason'=>$request->leave_reason,
                    'status'=>0,
                ];

                $create_holiday = EmployeesLeave::create($data);

                if ($create_holiday) {
                    return redirect()->route('employee.apply_leave')->with('success', 'Leave Applied Successfully');
                } else {
                    return back()->with('error', 'Something went Wrong!');
                }
            }
        }else{
            // India Employees
            if(($request->start_date == $request->end_date) || ($request->start_date && is_null($request->end_date))){
                $diffInDays = 1;
                $data = [
                    'e_id'=>Auth::guard('employee')->user()->id,
                    'leave_type'=>$request->leave_type,
                    'start_date'=>$request->start_date,
                    'end_date'=>$request->end_date,
                    'number_of_days'=>$diffInDays,
                    'leave_reason'=>$request->leave_reason,
                    'status'=>0,
                ];
    
                $create_leave = EmployeesLeave::create($data);
                if ($create_leave) {
                    return back()->with('success', 'Leave Applied Successfully');
                } else {
                    return back()->with('error', 'Something went Wrong!');
                }
            }else{
                Carbon::setWeekendDays([
                    Carbon::SATURDAY,
                    Carbon::SUNDAY,
                ]);
                $startDate = Carbon::parse($request->start_date);
                $endDate = Carbon::parse($request->end_date);
                $diffInDays = $startDate->diffInDays($endDate) + 1;
                $num_of_weekend_between_dates = $startDate->diffInDaysFiltered(function (Carbon $date){return !$date->isWeekday();}, $endDate);
                $num_of_govt_holidays = Holidays::where('company_location',1)->whereBetween('date',[$request->start_date,$request->end_date])->get()->count();
                $total_num_of_holidays = $diffInDays - $num_of_weekend_between_dates - $num_of_govt_holidays;
                $data = [
                    'e_id'=>Auth::guard('employee')->user()->id,
                    'leave_type'=>$request->leave_type,
                    'start_date'=>$request->start_date,
                    'end_date'=>$request->end_date,
                    'number_of_days'=>$total_num_of_holidays,
                    'leave_reason'=>$request->leave_reason,
                    'status'=>0,
                ];

                $create_holiday = EmployeesLeave::create($data);

                if ($create_holiday) {
                    return redirect()->route('employee.apply_leave')->with('success', 'Leave Applied Successfully');
                } else {
                    return back()->with('error', 'Something went Wrong!');
                }
            }
        }
    }
}
