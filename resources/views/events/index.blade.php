@extends('partials.master')
@section('content')
 
 <h2>Events</h2>
    <hr/>
    <a class="btn btn-primary" href="events/create" style="margin-bottom: 15px;">Create New</a>

    @if(Session::has('message'))
    <div class="alert-custom {{ Session::get('alert-class', 'alert-info') }}">
        <p><strong>Success:</strong>{!! Session('message') !!}</p>
    </div>
    @endif()

    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">#</th>
            <th>Name</th>
            <th>Description</th>
            <th width="10px;">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($events as $key=>$event)
            <tr>
                <td style="padding-left: 15px;">{!! $key+1 !!}</td>
                <td>{!! $event->event_name !!}</td>
                <td>{!! $event->event_description !!}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="events/{!! $event->id !!}/edit">Edit</a>

                    {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => 'events/delete/' . $event->id]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
