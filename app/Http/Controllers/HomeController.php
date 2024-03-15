<?php

namespace App\Http\Controllers;

use Validator,Redirect,Response,File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Superadmin;
use App\Http\Requests;
use App\Models\Attendance;
use App\Models\User;
use Attendances;
use Users;
use Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        if (auth()->user()->role == 1) {
                return redirect('director');
            }elseif (auth()->user()->role == 2) {
                return redirect('admin');
            }elseif (auth()->user()->role == 3) {
                return redirect('vertical');
            }elseif (auth()->user()->role == 4) {
                return redirect('spoc');
            }elseif (auth()->user()->role == 5) {
                return redirect('team');
            }elseif (auth()->user()->role == 6) {
                return redirect('vendor');
            }elseif (auth()->user()->role == 7) {
                return redirect('beneficiary');
            }
            return view('home');
    } 

    public function profileUser () {
        $users = User::get();
        //$bcusers = Bcuser::orderBy('created_at','DESC')->get();
        return view('profileAll', compact('users'));
    }    
}