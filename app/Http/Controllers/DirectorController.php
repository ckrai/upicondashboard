<?php

namespace App\Http\Controllers;

use Validator, Redirect, Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Activitylog;
use App\Models\Department;
use App\Models\Attendance;
use App\Models\Holiday;
use App\Models\User;
use App\Models\Project;
use App\Models\Vendor;
use App\Models\Vertical;
use App\Models\Vassociation;
use App\Models\Team;
use App\Models\Role;
use App\Models\Document_type;
use App\Models\Media;
use App\Models\Member;
use App\Models\Status;
use Attendances;
use Departments;
use Activitylogs;
use Holidays;
use Users;
use Auth;
use DB;

class DirectorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $timestamp = time();

        // Calculate timestamp for the first day of the previous month
        $prevMonthTimestamp = strtotime('-1 month', $timestamp);
        $labels = [
            1,
            2,
            5,
            3,
        ];

        $chartData = [];
        foreach ($labels as $label) {
            $chartData[] = Project::where('vertical_id', $label)->count() ?? 0;
        }

        $data = [
            'name' => Auth::user()->name,
            'role' => Role::find(Auth::user()->role)->first()->name ?? "NA",
            'verticals' => [
                ['id' => 1, 'name' => 'Training'],
                ['id' => 2, 'name' => 'Consultancy'],
                ['id' => 3, 'name' => 'Finance'],
                ['id' => 4, 'name' => 'Human Resource'],
                ['id' => 5, 'name' => 'Retail'],
            ],
            'projects' => [
                'Training' => Project::where('vertical_id', 1)->count(),
                'Consultancy' => Project::where('vertical_id', 2)->count(),
                'Retail' => Project::where('vertical_id', 5)->count(),
            ],
            'date' => date('F Y', $prevMonthTimestamp),
            'chartData' => $chartData,

        ];

        return view('director.welcome', compact('data'));
    }

    public function create()
    {
        return view('director.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'project' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'added_by' => 'required'
        ]);

        $data = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'project' => $request->project,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'role' => $request->role,
            'added_by' => $request->added_by
        ]);
        return view('director.create')->with(['success' => 'Thank you for Add user.']);
    }

    public function show(User $user, $id)
    {
        $user  = User::find($id);
        return view('director.view', compact('user'));
    }

    public function changePass()
    {
        $users = User::first();
        return view('director.changePassword', compact('users'));
    }

    public function UpdatePass(Request $request)
    {
        $data = $request->input();
        $request->validate([
            'password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        if (Auth::attempt(['email' => auth()->user()->email, 'password' => $data['password']])) {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        } else {
            return Redirect::back()->withErrors(['Alert-', 'Current password is wrong']);
        }
        return redirect('director/list')->with('success', 'Password change successfully!');
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('director.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $bcuser = User::find($id);
        $bcuser->name =  $request->get('name');
        $bcuser->email = $request->get('email');
        $bcuser->save();

        return redirect('/director/list')->with('success', 'Data updated!');
    }

    public function destroy($id)
    {
        $bcuser = User::find($id);
        $bcuser->delete();
        return redirect('/director/list')->with('success', 'Contact deleted!');
    }

    public function projects()
    {
        // Fetch projects with status equal to 1 directly in the query
        $projects = Project::where('status', 1)->get();
        $projectData = [];

        foreach ($projects as $project) {
            // Use optional() to handle cases where the relationship might not exist
            $user = User::find($project->n_spoc)->name ?? "NA";
            $vertical = Vertical::find($project->vertical_id)->name ?? "NA";
            // Use ternary operator for status
            $stat = $project->status == 1 ? "Active" : "Inactive";
            $temp = [
                'id' => $project->id ?? "NA",
                'name' => $project->p_name,
                'details' => $project->p_details,
                'head' => $user,
                'vertical' => $vertical,
                'status' => Status::find($project->status)->name ?? "NA",
            ];
            $projectData[] = $temp;
        }
        $data = [
            'name' => Auth::user()->name,
            'role' => Role::find(Auth::user()->role)->first()->name ?? "NA",
            'projects' => $projectData,
        ];
        // dd($data);
        return view('director.projects', compact('data'));
    }

    public function getProject(int $id)
    {
        $project = Project::find($id);
        $name = $project->p_name;
        $vertical = Vertical::find($project->vertical_id)->name ?? "NA";
        $head = User::where('id', $project->n_spoc)->get()->first()->name ?? "NA";
        $details = $project->p_details;
        $status = $project->status == 1 ? "Active" : "Inactive";
        $vendors = Vassociation::where('p_id', $project->id)->get();
        // ddd($vendors);  
        $vendorData = [];
        foreach ($vendors as $vendor) {
            $temp = [
                'id' => $vendor->v_id,
                'name' => Vendor::where('id', $vendor->v_id)->get()->first()->name ?? "NA",
                'state' => $vendor->state,
                'district' => $vendor->district,
                'start_date' => $vendor->start_date,
                'end_date' => $vendor->end_date ?? "NA",
                'status' => $vendor->status == 1 ? "Active" : "Inactive"
            ];
            $vendorData[] = $temp;
        }
        $teams = Team::where('pro_id', $id)->get();
        $media = Media::where('project_id', $id)->get();
        $mediaData = [];
        foreach ($media as $m) {
            try {
                //code...
                $vass = Vassociation::where('id', $m->vass_id)->get()->first();
                if ($vass->v_id == 0) {
                    $state = "NA";
                    $district = "NA";
                    $vendor = "NA";
                } else {

                    $state = $vass->state ??  "NA";
                    $district = $vass->district ?? "NA";
                    $vendor = Vendor::where('id', $vass->v_id)->get()->first()->name ?? "NA";
                }
                $type = Document_type::where('id', $m->type)->get()->first()->name ?? "NA";

                $temp = [
                    'id' => $m->id,
                    'name' => $m->name,
                    'original_name' => $m->original_name ?? "NA",
                    'type' => $type,
                    'vendor' => $vendor,
                    'state' => $state,
                    'district' => $district,
                    'upload_date' => $m->created_at ?? "NA",
                ];
                $mediaData[] = $temp;
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        $data = [
            'u_name' => Auth::user()->name,
            'u_role' => Role::find(Auth::user()->role)->first()->name ?? "NA",
            'id' => $project->id,
            'name' => $name,
            'details' => $details,
            'head' => $head,
            'vertical' => $vertical,
            'status' => $status,
            'vendors' => $vendorData,
            'teams' => $teams,
            'media' => $mediaData,
        ];

        return view('director.getProject1', compact('data'));
    }

    public function vendors()
    {

        $vendors = Vendor::where('status', 1)->get();
        $data = [
            'name' => Auth::user()->name,
            'role' => Role::find(Auth::user()->role)->first()->name ?? "NA",
            'vendors' => $vendors,
        ];
        return view('director.vendors', compact('data'));
    }

    public function getVendor(int $id)
    {
        $vendor = Vendor::find($id);
        $name = $vendor->name;
        $state = $vendor->state;
        $district = $vendor->district;
        $address = $vendor->address;
        $email = $vendor->email;
        $mobile = $vendor->mobile;
        $status = $vendor->status == 1 ? "Active" : "Inactive";
        $projects = Vassociation::where('v_id', $vendor->id)->get();
        $projectData = [];
        foreach ($projects as $project) {
            $temp = [
                'id' => $project->id,
                'name' => Project::where('id', $project->p_id)->get()->first()->p_name ?? "NA",
                'state' => $project->state,
                'district' => $project->district,
                'start_date' => $project->start_date,
                'end_date' => $project->end_date ?? "NA",
                'status' => $project->status == 1 ? "Ongoing" : "Completed",
            ];
            $projectData[] = $temp;
        }
        $data = [
            'id' => $vendor->id,
            'u_name' => Auth::user()->name,
            'u_role' => Role::find(Auth::user()->role)->first()->name ?? "NA",
            'name' => $name,
            'state' => $state,
            'district' => $district,
            'address' => $address,
            'email' => $email,
            'mobile' => $mobile,
            'status' => $status,
            'projects' => $projectData,
        ];
        // dd($data);
        return view('director.getVendor', compact('data'));
    }
    public function getVertical(int $id)
    {
        $vertical = Vertical::find($id);
        $name = $vertical->name;
        $head = User::where('id', $vertical->head_id)->get()->first()->name ?? "NA";
        // Fetch projects with status equal to 1 directly in the query
        $projects = Project::where('vertical_id', $id)->get();

        $projectsData = [];

        foreach ($projects as $project) {
            $user = User::find($project->n_spoc)->name ?? "NA";
            $stat = $project->status == 1 ? "Active" : "Inactive";
            $temp = [
                'id' => $project->id ?? "NA",
                'name' => $project->p_name,
                'details' => $project->p_details,
                'head' => $user,
                'status' => $stat,
            ];

            $projectsData[] = $temp;
        }
        $data = [
            'u_name' => Auth::user()->name,
            'u_role' => Role::find(Auth::user()->role)->first()->name ?? "NA",
            'id' => $id,
            'name' => $name,
            'head' => $head,
            'projects' => $projectsData,
        ];

        return  view('director.getVertical', compact('data'));
    }

    public function users()
    {
        $users = User::where('status', 1)->get();
        $userData = [];
        foreach ($users as $user) {
            $temp = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'mobile' => $user->mobile,
                //Role::find($user->role)->name ?? "NA"
                'role' => Role::find($user->role)->name ?? "NA",
                'vertical' => Vertical::find($user->vertical)->name ?? "NA",
                'status' => $user->status == 1 ? "Active" : "Inactive",
            ];
            $userData[] = $temp;
        }
        $data = [
            'name' => Auth::user()->name,
            'role' => Role::find(Auth::user()->role)->first()->name ?? "NA",
            'users' => $userData,
        ];
        return view('director.users', compact('data'));
    }

    public function forms()
    {
        return view('director.forms');
    }

    public function getTeam($id)
    {
        $team = Team::find($id);
        $name = $team->name;
        $project = Project::find($team->pro_id)->get()->first()->p_name ?? "NA";
        $members = Member::where('team_id', $team->id)->get();
        $memberData = [];
        foreach ($members as $member) {
            $u_id = $member->user_id;
            $temp = [
                'name' => User::find('id', $u_id)->get()->first()->name ?? "NA",
                'role' => Role::find($member->role)->name ?? "NA",
            ];
            $memberData[] = $temp;
        }
        $data = [
            'id' => $team->id,
            'u_name' => Auth::user()->name,
            'u_role' => Role::find(Auth::user()->role)->first()->name ?? "NA",
            'name' => $name,
            'project' => $project,
            'members' => $memberData,
        ];
        return view('director.getTeam', compact('data'));
    }
}
