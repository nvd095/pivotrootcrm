<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
@if(Request::path() == 'admin/roles')
<title>Roles List -Pivotroots CRM</title>
@elseif(Request::path() == 'events')
<title>Events List -Pivotroots CRM</title>
@elseif(Request::path() == 'events/manage-events')
<title>Manage Events -Pivotroots CRM</title>
@elseif(Request::path() == 'admin/users')
<title>Users List -Pivotroots CRM</title>
@elseif(Request::path() == 'admin/users')
<title>User List -Pivotroots CRM</title>
@elseif(Request::path() == 'admin/manage-roles')
<title>Manage Roles -Pivotroots CRM</title>
@else(Request::path() == 'home')
<title>Home -Pivotroots CRM</title>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
.logo-class{
    background-color: lightgrey;
}
.logo-class img{
    width: 120px;
}
.active{
    color: white !important;
}
</style>
</head>
<body>

<div class="sidenav">
    <a href="/" class="logo-class"><img max-width="50px" src="{{ asset('images/PivotRoots_logo.png') }}" title="PivotRoots CRM "></a>
    <a href="/home" class="{{ Request::path() == 'home' ? 'active' : '' }}" title="Home">Home</a> 
    <?php
        $any_role   = Auth::user()->hasAnyRole(["Admin","Event Manager"]);
        $role_admin = Auth::user()->hasRole("Admin");
        if($any_role){?>
              <a href="/events" class="{{ Request::path() == 'events' ? 'active' : '' }}" title="Events">Events</a>
              <a href="/events/manage-events" class="{{ Request::path() == 'events/manage-events' ? 'active' : '' }}" title="Manage Events">Manage Events</a>
    <?php }
        if($role_admin){ ?>
                <a href="/admin/roles" class="{{ Request::path() == 'admin/roles' ? 'active' : '' }}" title="Roles">Roles</a>
                <a href="/admin/manage-roles" class="{{ Request::path() == 'admin/manage-roles' ? 'active' : '' }}" title="Manage Roles">Manage Roles</a>
                <a href="/admin/users" class="{{ Request::path() == 'admin/users' ? 'active' : '' }}" title="Users">Users</a>
    <?php }?>
    <a href="{{ route('logout') }}" title="Logout"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<div class="main">
