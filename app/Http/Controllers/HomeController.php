<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelPoints;
use App\Models\User;
class HomeController extends Controller
{

    public function dashboard(){
        return view('dashboard');
    }
    // public function createUser(Request $request,User $user){
       
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,'.$user->id,
    //         'image' => 'image|mimes:jpg,png,jpeg|max:2048',
    //         'designation' => 'required',
    //     ]);
    //     $result=$this->employeeService->saveEmployee($request);
        
       
    //     return redirect('employee/list-employee')->with('success','Created Successfully');
    // }
}
