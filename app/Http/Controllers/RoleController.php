<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Session;
use function Psy\debug;

class RoleController extends Controller
{
    public function create()
    {
        return view('roles.create');
    }
    
    public function index()
    {
        $roles = Role::all(); // got this from database model
        return view('roles.index')->with('roles', $roles); 
    }
    
    public function edit($id)
    {
    	$roles = Role::find($id);
        return view('roles.edit', ['roles' => $roles]);
    }
    
    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->name = $request->get('name');
        $roles->description = $request->get('description');
        $roles->save();

	Session::flash('message', $roles['name'] . ' updated !!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/admin/roles');
    }

    public function store(Request $request)
    {
        $roles = new Role();
        $roles->name = $request->input('name');
        $roles->description = $request->input('description');
        $roles->save();
        Session::flash('message', $roles->name . ' added !!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/admin/roles');
    }
    
    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->destroy($id);

        Session::flash('message', $roles['name'] . ' deleted !!');
        Session::flash('alert-class', 'alert-danger');
        return redirect('/admin/roles');
    }
    
    public function manageRoles()
    {
       $users   = User::all();
       $roles  = Role::all();
       return view('roles.manage-roles', ['users'=>$users,'roles'=>$roles]);
    }
    
    public function assignRoles(Request $request)
    {
       
        $user = User::where('id', $request['id'])->first();
        $user->roles()->detach();
        $roles  = Role::all();
        foreach($roles as $key=>$role){
            $user_role = "role_".str_replace(" ","_",$role->name);
            
            if ($request[$user_role]) {
                $user->roles()->attach(Role::where('name', $role->name)->first());
            }
            
        }
        Session::flash('message', 'Roles assgined to user !!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
