@extends('partials.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Howdy, {{ Auth::user()->name }} </div></br>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset(Auth::user()->events))
                    Events assigned to you are:
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="padding-left: 15px;">#</th>
                        <th>Event Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        @foreach(Auth::user()->events as $key=>$event)
                        <tr><td>{!! $key+1 !!}</td>
                        
                        <td>{!!$event->event_name!!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
