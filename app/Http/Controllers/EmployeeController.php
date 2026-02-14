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
use App\Models\Holidays;
use App\Models\Holidays_view;
use App\Models\LeavePolicy;
use App\Models\Attendance;

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

        if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password, 'status'=> 1])) {
            Auth::guard('admin')->logout();
            return redirect()->route('employee.dashboard');
        }else{
            // Session::flash('error-message','Invalid Email or Password');
            return back()->with('error', "Invalid Email or Password");
        }
    }

    //todo: admin logout functionality
    public function logout(){
        Auth::guard('employee')->logout();
        return redirect()->route('employee.login');
    }

    public function dashboard()
    {
        $holidays = Holidays_view::whereYear('date',Carbon::now()->format('Y'))->whereDate('date', '>=', Carbon::now())->limit(5)->get();
        $holiday_array_size = $holidays->count();
        $all_attendance_info = Attendance::where('employee_id',Auth::guard('employee')->user()->id)->whereYear('created_at', Carbon::now()->format('Y'))->latest()->limit(5)->get();
        $all_attendance_info_size = $all_attendance_info->count();
        // dd($all_attendance_info);
        $all_leave_info  = EmployeesLeave::whereYear('start_date',Carbon::now()->format('Y'))->latest()->limit(5)->get();
        $all_leave_info_array_size = $all_leave_info->count();
        return view('employee.dashboard',compact('holidays','holiday_array_size','all_attendance_info','all_attendance_info_size','all_leave_info','all_leave_info_array_size'));
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
            'password' =>'required|confirmed|min:6',
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
        $all_attendace_info = Attendance::where('employee_id',Auth::guard('employee')->user()->id)->whereYear('created_at', Carbon::now()->format('Y'))->get();
        return view('employee.attendance',compact('all_attendace_info'));
    }

    public function attendance_leave_submit(Request $request){
        $request->validate([
            'attendace_date' =>'required | date',
            'start_time' =>'required | date_format:H:i',
            'end_time' =>'required | date_format:H:i',
            'reason' =>'required',
        ]);

        $data = [
            'employee_id'=>Auth::guard('employee')->user()->id,
            'attendace_date' =>$request->attendace_date,
            'start_time' =>$request->start_time,
            'end_time' =>$request->end_time,
            'reason' =>$request->reason,
        ];

        $create_attendace = Attendance::create($data);

        if ($create_attendace) {
            return back()->with('success', 'Attendance Added Successfully');
        } else {
            return back()->with('error', 'Something went Wrong!');
        }
    }

    public function apply_leave(){
        // $old_leave_info = EmployeesLeave::where('e_id',Auth::guard('employee')->user()->id)->get();
        $all_leave_info = EmployeesLeave::where('employee_id',Auth::guard('employee')->user()->id)->whereYear('created_at', Carbon::now()->format('Y'))->get();
        if(Auth::guard('employee')->user()->company_location == 0){
            $leave_policy = LeavePolicy::where('company_location',0)->first();
            $sick = $leave_policy->sick;
            $public = $leave_policy->public;
            $casual = $leave_policy->casual;
            $special = $leave_policy->special;
            $earned = $leave_policy->earned;

            foreach($all_leave_info as $each_leave_info){
                if($each_leave_info->leave_type == 0){
                    $sick = $sick - $each_leave_info->number_of_days;
                    if($sick < 0 ){
                        $sick = 0;
                    }
                }elseif($each_leave_info->leave_type == 1){
                    $public = $public - $each_leave_info->number_of_days;
                    if($public < 0 ){
                        $public = 0;
                    }
                }elseif($each_leave_info->leave_type == 2){
                    $casual = $casual - $each_leave_info->number_of_days;
                    if($casual < 0 ){
                        $casual = 0;
                    }
                }elseif($each_leave_info->leave_type == 3){
                    $special = $special - $each_leave_info->number_of_days;
                    if($special < 0 ){
                        $special = 0;
                    }
                }else{
                    $earned = $earned - $each_leave_info->number_of_days;
                    if($earned < 0 ){
                        $earned = 0;
                    }
                }
            }
        }else{
            $leave_policy = LeavePolicy::where('company_location',1)->first();
            $sick = $leave_policy->sick;
            $public = $leave_policy->public;
            $casual = $leave_policy->casual;
            $special = $leave_policy->special;
            $earned = $leave_policy->earned;

            foreach($all_leave_info as $each_leave_info){
                if($each_leave_info->leave_type == 0){
                    $sick = $sick - $each_leave_info->number_of_days;
                    if($sick < 0 ){
                        $sick = 0;
                    }
                }elseif($each_leave_info->leave_type == 1){
                    $public = $public - $each_leave_info->number_of_days;
                    if($public < 0 ){
                        $public = 0;
                    }
                }elseif($each_leave_info->leave_type == 2){
                    $casual = $casual - $each_leave_info->number_of_days;
                    if($casual < 0 ){
                        $casual = 0;
                    }
                }elseif($each_leave_info->leave_type == 3){
                    $special = $special - $each_leave_info->number_of_days;
                    if($special < 0 ){
                        $special = 0;
                    }
                }else{
                    $earned = $earned - $each_leave_info->number_of_days;
                    if($earned < 0 ){
                        $earned = 0;
                    }
                }
            }
        }
        return view('employee.apply_leave',compact('leave_policy','all_leave_info','sick','public','casual','special','earned'));
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
                    'employee_id'=>Auth::guard('employee')->user()->id,
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
                    'employee_id'=>Auth::guard('employee')->user()->id,
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
                    'employee_id'=>Auth::guard('employee')->user()->id,
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
                    'employee_id'=>Auth::guard('employee')->user()->id,
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
