@extends('partials.master')
@section('content')
 
 <h2>Manage Events</h2>
    <hr/>
    <a class="btn btn-primary" href="/events/create" style="margin-bottom: 15px;">Create New</a>

    @if(Session::has('message'))
    <div class="alert-custom {{ Session::get('alert-class', 'alert-info') }}">
        <p><strong>Success:</strong>{!! Session('message') !!}</p>
    </div>
    @endif()

    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">#</th>
            <th>User Name</th>
            <th>Events</th>
            <th width="10px;">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $key=>$user)
        
            <tr>
                <form action="/events/assign-events" method="post">
                <td style="padding-left: 15px;">{!! $key+1 !!}</td>
                <td>{!! $user->name !!}</td>
                {{ Form::hidden('id', $user->id) }}
                <td>
                @foreach($events as $key=>$event)
                <input type="checkbox" {{ $user->hasEvent($event->event_name) ? 'checked' : '' }} name="event_{!! $event->event_name !!}">{!! $event->event_name !!}</br>
                @endforeach
                </td>
                <td>
                      {{ csrf_field() }}
                    <button type="submit" class = 'btn btn-primary pull-right'>Assign Events</button></td>
                
                </form>
            </tr>
         
        @endforeach

        </tbody>
    </table>
@endsection
