<?php

namespace App\Http\Controllers;

use Validator, Redirect, Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\User;
use App\Models\Project;
use App\Models\Vendor;
use App\Models\Vertical;
use App\Models\Vassociation;
use App\Models\Team;
use App\Models\Member;
use App\Models\Role;
use App\Models\Document_type;
use App\Models\Media;
use App\Models\Passociation;
use Passociations;
use Vassociations;
use verticals;
use Projects;
use Members;
use Teams;
use Users;
use Auth;
use DB;

class VerticalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function showReport()
    {

        $resolve = User::where('role', '3')->get();
        $open = User::where('role', '4')->get();
        $pendingBank = User::where('role', '5')->get();

        $bob = Project::where('vertical_id', '1')->get();
        $uco = Project::where('vertical_id', '2')->get();
        $bupb = Project::where('vertical_id', '3')->get();
        $sbi = Project::where('vertical_id', '4')->get();
        $pnb = Project::where('vertical_id', '5')->get();


        $resolve_count = count($resolve);
        $open_count = count($open);
        $pending_bankcount = count($pendingBank);

        $bob_count = count($bob);
        $uco_count = count($uco);
        $bupb_count = count($bupb);
        $sbi_count = count($sbi);
        $pnb_count = count($pnb);

        return view('vertical.showReport', compact('resolve_count', 'open_count', 'pending_bankcount', 'bob_count', 'uco_count', 'bupb_count', 'sbi_count', 'pnb_count'));
        //return view ('admin.index', compact('bcusers'));
    }

    public function index()
    {
        $authRoleId = Auth::user()->role;
        $authName = Auth::user()->name;
        $role = Role::where('id', $authRoleId)->first()->name ?? "NA";

        $authdata = [
            'name' => $authName,
            'role' => $role
        ];
        $allowedVerticals = ['1', '2', '3', '4', '5'];

        if (in_array(auth()->user()->vertical, $allowedVerticals)) {
            $users = User::whereIn('role', [4, 5])->get();
            $projects = Project::where('added_by', Auth::user()->id)->get();
            $data = [];

            foreach ($projects as $project) {
                // Use optional() to handle cases where the relationship might not exist
                $spocs = Passociation::where('p_id', $project->id)->get();
                $heads = '';
                foreach ($spocs as $spoc) {
                    $user = User::find($spoc->u_id)->name ?? "NA";
                    $heads .= $user . ' ';
                }
                $vertical = Vertical::find($project->vertical_id)->name ?? "NA";
                // Use ternary operator for status
                $stat = $project->status == 1 ? "Active" : "Inactive";
                $temp = [
                    'id' => $project->id ?? "NA",
                    'name' => $project->p_name,
                    'details' => $project->p_details,
                    'head' => $heads,
                    'vertical' => $vertical,
                    'status' => $stat,
                ];
                $data[] = $temp;
            }
            $teams = Team::where('added_by', Auth::user()->id)->get();
            return view('vertical.index', compact('data', 'teams', 'authdata'));
        } elseif (in_array(auth()->user()->vertical, $allowedVerticals)) {
            //$users = User::whereIn('role', [4, 5])->get();
            $projects = Project::where('added_by', Auth::user()->id)->get();
            $data = [];

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
                    'status' => $stat,
                ];
                $data[] = $temp;
            }
            $teams = Team::where('added_by', Auth::user()->id)->get();
            return view('vertical.index', compact('data', 'teams', 'authdata'));
        } elseif (in_array(auth()->user()->vertical, $allowedVerticals)) {
            //$users = User::whereIn('role', [4, 5])->get();
            $projects = Project::where('added_by', Auth::user()->id)->get();
            $data = [];
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
                    'status' => $stat,
                ];
                $data[] = $temp;
            }
            $teams = Team::where('added_by', Auth::user()->id)->get();
            return view('vertical.index', compact('data', 'teams', 'authdata'));
        }
        // dd($data);
        return view('vertical.index');
    }

    public function getProject(int $id)
    {
        $authRoleId = Auth::user()->role;
        $authName = Auth::user()->name;
        $role = Role::where('id', $authRoleId)->first()->name ?? "NA";

        $authdata = [
            'name' => $authName,
            'role' => $role
        ];
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


        return view('vertical.getProject', compact('data', 'authdata'));
    }


    public function getVendor(int $id)
    {
        $authRoleId = Auth::user()->role;
        $authName = Auth::user()->name;
        $role = Role::where('id', $authRoleId)->first()->name ?? "NA";

        $authdata = [
            'name' => $authName,
            'role' => $role
        ];
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
        return view('vertical.getVendor', compact('data', 'authdata'));
    }

    public function show(User $user, $id)
    {
        $user  = User::find($id);
        return view('vertical.view', compact('user'));
    }

    public function createP(User $user)
    {
        $authRoleId = Auth::user()->role;
        $authName = Auth::user()->name;
        $role = Role::where('id', $authRoleId)->first()->name ?? "NA";

        $authdata = [
            'name' => $authName,
            'role' => $role
        ];
        $allowedVerticals = ['1', '2', '3', '4', '5'];

        // Check if the user's vertical is in the allowed verticals
        if (in_array(auth()->user()->vertical, $allowedVerticals)) {
            $users = User::whereIn('role', [4, 5])->get();
            return view('vertical.addProject', compact('users', 'authdata'));
        } elseif (in_array(auth()->user()->vertical, $allowedVerticals)) {
            $users = User::whereIn('role', [4, 5])->get();
            return view('vertical.addProject', compact('users', 'authdata'));
        } elseif (in_array(auth()->user()->vertical, $allowedVerticals)) {
            $users = User::whereIn('role', [4, 5])->get();
            return view('vertical.addProject', compact('users', 'authdata'));
        }
        return view('vertical.addProject', compact('authdata'));
    }

    public function storeP(Request $request)
    {
        $userid = $request->user()->id;
        $ver_id = $request->user()->vertical;
        $request->validate([
            'p_name' => 'required',
            'p_details' => 'required',
            'n_spoc' => 'required',
            'vertical_id' => 'required'
        ]);

        $data = Project::create([
            'p_name' => $request->p_name,
            'p_details' => $request->p_details,
            'added_by' => $userid,
            'vertical_id' => $ver_id,
        ]);
        $p_id = $data->id;
        $spocs = explode(',', $request->n_spoc);
        foreach ($spocs as $spoc) {
            if ($spoc) {
                $newSpoc = Passociation::create([
                    'p_id' => $p_id,
                    'u_id' => $spoc,
                    'added_by' => $userid,
                    'role' => 4
                ]);
            }
        }

        return redirect('vertical')->with('success', 'Project added successfully!');
        //return view ('vertical.index')->with(['success' => 'Thank you for Add user.']);
    }

    public function createT()
    {
        $authRoleId = Auth::user()->role;
        $authName = Auth::user()->name;
        $role = Role::where('id', $authRoleId)->first()->name ?? "NA";

        $authdata = [
            'name' => $authName,
            'role' => $role
        ];
        $users = User::whereIN('role', array(4, 5))->get();
        //$users = User::where('vertical', '=', 3)->where('role', array(4,5))->get();
        $projects = Project::where('added_by', Auth::user()->id)->get();
        return view('vertical.addTeam', compact('users', 'projects', 'authdata'));
    }

    public function storeT(Request $request)
    {
        $userid = $request->user()->id;
        $request->validate([
            'name' => 'required',
            'pro_id' => 'required',
            'description' => 'required',
        ]);
        $data = Team::create([
            'name' => $request->name,
            'pro_id' => $request->pro_id,
            'description' => $request->description,
            'added_by' => $userid
        ]);
        return redirect('vertical')->with('success', 'Add user successfully!');
        //return view ('vertical.index')->with(['success' => 'Thank you for Add user.']);
    }

    public function createM()
    {
        $authRoleId = Auth::user()->role;
        $authName = Auth::user()->name;
        $role = Role::where('id', $authRoleId)->first()->name ?? "NA";

        $authdata = [
            'name' => $authName,
            'role' => $role
        ];
        $users = User::whereIN('role', array(4, 5))->get();
        $teams = Team::where('added_by', Auth::user()->id)->get();
        //$projects = Project::get();
        return view('vertical.addMember', compact('users', 'teams', 'authdata'));
    }

    public function storeM(Request $request)
    {
        $userid = $request->user()->id;
        $roleid = $request->user()->role;
        $request->validate([
            't_id' => 'required',
            'user_id' => 'required',
            'role' => 'required',
        ]);
        $data = Member::create([
            't_id' => $request->t_id,
            'user_id' => $request->user_id,
            'role' => $roleid,
            'added_by' => $userid
        ]);
        return redirect('vertical')->with('success', 'Add user successfully!');
        //return view ('vertical.index')->with(['success' => 'Thank you for Add user.']);
    }

    public function changePass()
    {
        //$user  = User::find($id);
        $users = User::first();
        return view('vertical.changePassword', compact('users'));
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
        //dd('Password change successfully.');
        return redirect('vertical/list')->with('success', 'Password change successfully!');
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('vertical.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->project = $request->get('project');
        $user->email = $request->get('email');
        $user->save();
        return redirect('vertical.index')->with('success', 'Data updated!');
    }

    public function destroy($id)
    {
        $bcuser = User::find($id);
        $bcuser->delete();
        return redirect('vertical.index')->with('success', 'Contact deleted!');
    }
}
