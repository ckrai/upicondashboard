<?php

namespace App\Http\Controllers;

use Validator, Redirect, Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Document_type;
use App\Models\Member;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Carbon\Carbon;
use App\Models\Media;
use App\Models\Project;
use App\Models\Vertical;
use App\Models\Team;
use App\Models\Vassociation;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Role;
use Projects;
use Medias;
use Document_types;
use Teams;
use Users;
use Roles;
use Verticals;

use DB;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authRoleId = Auth::user()->role;
        $authName = Auth::user()->name;
        $role = Role::where('id', $authRoleId)->first()->name ?? "NA";
        
        $data = [
            'name' => $authName,
            'role' => $role
        ];
        $projects = Project::where('vertical_id', 1)->get();
        return view('team.index', compact('projects', 'role','data'));
    }
    

    public function create()
    {
        //$attendances = Attendance::get();
        return view('team.create');
    }

    public function createUpload(Request $request)
    {

        $projects = Project::where('vertical_id', '=',  1)->get();
        $authId = Auth::user()->id;
        $doc_types = Document_type::all();
        return view('team.upload', compact('projects', 'doc_types', 'authId'));
    }
    public function storeUpload(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'type' => 'required',
            'remark' => 'nullable|string',
            'image_files' => 'required|array', // Make sure it's an array
            'image_files.*' => 'max:2048|file', // Validate each file
        ]);

        if ($validator->fails()) {
            return redirect()->route('team.saveUpload')->withErrors($validator)->withInput();
        }
        $addedBy = $request->input('added_by');
        $filetype = $request->input('type');
        $remark = $request->input('remark');
        $projectId = $request->input('project_id');
        $vendorId = $projectId == 1 ? 0 : $request->input('vass_id');
        $baseFolderPath = "document/";
        $folderPath = $baseFolderPath;
        foreach ($request->file('image_files') as $file) {
            $originalFilename = $file->getClientOriginalName();
            $filename = hash('md5', time() . $originalFilename) . '.' . $file->getClientOriginalExtension();
            $file->storeAs($folderPath, $filename);

            // Store the file details in the database
            Media::create([
                'added_by' => $addedBy,
                'vass_id' => $vendorId,
                'type' => $filetype,
                'name' => $filename,
                'original_name' => $originalFilename,
                'remark' => $remark,
                'project_id' => $projectId,
            ]);
        }

        return redirect()->route('team.saveUpload')->with(['success' => 'Files uploaded successfully.']);
    }

    public function getProject(int $id)
    {

        $mediaData = [];
        $media = Media::where('project_id', $id)->orderBy('created_at', 'desc')->get(); // Fetch media related to the specified project ID and order by created_at
        foreach ($media as $m) {
            $mediaData[] = [
                'id' => $m->id,
                'original_name' => $m->original_name,
                'name' => $m->name,
                'created_at' => date('M j, Y g:i A', strtotime($m->created_at)) // Format date and time
            ];
        }

        return view('team.getProject', compact('mediaData'));
    }

    public function storefsdfsaf(Request $request)
    {
        $userid = $request->user()->id;
        $deptid = $request->user()->dept_id;
        $uname = $request->user()->name;

        $save = new Attendance;
        $save->u_id = $userid;
        $save->dept_id = $deptid;
        $save->u_name = $uname;
        $save->checkin_date = $request->checkin_date;
        $save->checkin_time = $request->checkin_time;
        $save->checkout_time = $request->checkout_time;
        $save->status = '1';
        $save->save();
        return view('team.create')->with(['success' => 'Thank you for Add user.']);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        return redirect()->back()->with('error', 'You have already checked out for today.');
    }

    public function show(User $user, $id)
    {
        $user  = User::find($id);

        return view('team.view', compact('user'));
    }

    public function changePass()
    {
        $users = User::first();
        return view('team.changePassword', compact('users'));
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
        return redirect('team')->with('success', 'Password change successfully!');
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('team.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->mobile = $request->get('mobile');
        $user->email = $request->get('email');
        $user->save();
        return redirect('team.index')->with('success', 'Data updated!');
    }

    public function destroy($id)
    {
        $bcuser = User::find($id);
        $bcuser->delete();
        return redirect('team.index')->with('success', 'Contact deleted!');
    }
}
