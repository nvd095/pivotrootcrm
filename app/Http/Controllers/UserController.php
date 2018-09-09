<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use function Psy\debug;

class UserController extends Controller
{
     public function create()
    {
        return view('users.create');
    }
    
    public function index()
    {
        $users = User::all(); // got this from database model
        return view('users.index')->with('users', $users); 
    }
    
    public function edit($id)
    {
    	$users = User::find($id);
        return view('users.edit', ['users' => $users]);
    }
    
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->save();

	Session::flash('message', $users['name'] . ' updated!!');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/users');
    }

    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
        
        $users->save();
        Session::flash('message', $users->name . ' added!!');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/users');
    }
    
    public function destroy($id)
    {
        $users = User::find($id);        
        if($users->hasRole('Admin')){
            Session::flash('message', 'Cannot delete System Admin!!');
            Session::flash('alert-class', 'alert-danger');
        }
        else{
            $users->destroy($id);
            Session::flash('message', $users['name'] . ' deleted!!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('admin/users');
    }
    
}
