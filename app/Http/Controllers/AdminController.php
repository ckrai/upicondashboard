<?php

namespace App\Http\Controllers;

use Validator, Redirect,Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use Projects;
use Teams;
use Users;
use Auth;
use DB;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
   
    public function index() {
        $users = User::whereIN('role', array(3,4))->get();
        $projects = Project::get();
        $teams = Team::get();
        return view('admin.index', compact('users', 'projects', 'teams'));
    }

    public function show (User $user, $id) {
        $user  = User::find($id);
        return view('admin.view', compact('user'));   
    }

    public function createP(User $user) {
        $users = User::get();
        return view('admin.addProject', compact('users'));
    }

    public function storeP(Request $request) {
        $userid = $request->user()->id;
        $request->validate([
            'p_name'=>'required',
            'p_details'=>'required',
            'n_spoc'=>'required',              
        ]);
        $data = Project::create([
            'p_name' => $request->p_name,
            'p_details' => $request->p_details,
            'n_spoc' => $request->n_spoc,
            'added_by' => $userid
        ]);
        return redirect('admin')->with('success', 'Add user successfully!');
        //return view ('admin.index')->with(['success' => 'Thank you for Add user.']);
    }

    public function createT() {
        $users = User::get();
        $projects = Project::get();
        return view('admin.addTeam', compact('users', 'projects'));
    }

    public function storeT(Request $request) {
        $userid = $request->user()->id;
        $request->validate([
            'name'=>'required',
            'pro_id'=>'required',
            'description'=>'required',
        ]);
        $data = Team::create([
            'name' => $request->name,
            'pro_id' => $request->pro_id,
            'description' => $request->description,
            'added_by' => $userid        
        ]);
        return redirect('admin')->with('success', 'Add user successfully!');
        //return view ('admin.index')->with(['success' => 'Thank you for Add user.']);
    }

    public function create() {
        return view('admin.add');
    }

    public function store(Request $request) {
        $userid = $request->user()->id;
        
        $request->validate([
            'name'=>'required',
            'vertical'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);
        $data = User::create([
            'name' => $request->name,
            'vertical' => $request->vertical,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request['password']),
            'role' => $request->role,
            'added_by' => $userid
        ]);
        return redirect('admin')->with('success', 'Add user successfully!');
        //return view ('admin.index')->with(['success' => 'Thank you for Add user.']);
    }

    public function changePass() {
        //$user  = User::find($id);
        $users = User::first();
        return view('admin.changePassword', compact('users'));
    } 

    public function UpdatePass(Request $request) {
        $data= $request->input();
        $request->validate([
            'password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
       if (Auth::attempt(['email' => auth()->user()->email, 'password' => $data['password']])) {
           User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        }else{
            return Redirect::back()->withErrors(['Alert-', 'Current password is wrong']);
        }
            //dd('Password change successfully.');
            return redirect('admin/list')->with('success', 'Password change successfully!');
    }

    public function edit(User $user, $id) {  
        $user = User::find($id);
        return view('admin.edit', compact('user')); 
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->project = $request->get('project');
        $user->email = $request->get('email');
        $user->save();
        return redirect('admin.index')->with('success', 'Data updated!');
    }

    public function destroy($id) {
        $bcuser = User::find($id);
        $bcuser->delete();
        return redirect('admin.index')->with('success', 'Contact deleted!');
    }
}