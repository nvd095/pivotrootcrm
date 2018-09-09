<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Session;
use function Psy\debug;

class EventsController extends Controller
{
    public function create()
    {
        return view('events.create');
    }
    
    public function index()
    {
        $events = Events::all(); // got this from database model
        return view('events.index')->with('events', $events); 
    }
    
    public function edit($id)
    {
    	$events = Events::find($id);
        return view('events.edit', ['events' => $events]);
    }
    
    public function update(Request $request, $id)
    {
        $events = Events::find($id);
        $events->event_name = $request->get('name');
        $events->event_description = $request->get('description');
        $events->save();

	Session::flash('message', $events['event_name'] . ' updated!!');
        Session::flash('alert-class', 'alert-success');
        return redirect('events');
    }

    public function store(Request $request)
    {
        $events = new Events();
        $events->event_name = $request->input('name');
        $events->event_description = $request->input('description');
        $events->save();
        Session::flash('message', $events->event_name . ' added!!');
        Session::flash('alert-class', 'alert-success');
        return redirect('events');
    }
    
    public function destroy($id)
    {
        $events = Events::find($id);
        $events->destroy($id);

        Session::flash('message', $events['event_name'] . ' deleted!!');
        Session::flash('alert-class', 'alert-danger');
        return redirect('events');
    }
    
    public function manageEvents()
    {
       $users   = User::all();
       $events  = Events::all();
       return view('events.manage-events', ['events' => $events,'users'=>$users]);
    }
    
    public function assignEvents(Request $request)
    {
       
        $user = User::where('id', $request['id'])->first();
        $user->events()->detach();
        $events  = Events::all();
        foreach($events as $key=>$event){
            $user_event = "event_".str_replace(" ","_",$event->event_name);
            
            if ($request[$user_event]) {
                $user->events()->attach(Events::where('event_name', $event->event_name)->first());
            }
            
        }
        Session::flash('message',' Events assigned to user!!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
