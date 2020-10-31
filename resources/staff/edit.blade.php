@extends('layouts.master')

@section('title')
<title>Edit Staff</title>
@endsection

@section('bar')
<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="/">
                    <h2>LIBRARY</h2>
                </a>

                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="/staff">
                      <i class="fas fa-group"></i>Staff List</a>
                </li>
                <li>
                    <a href="/admin-profile/{{auth()->user()->id}}">
                      <i class="fas fa-user"></i>My Profile</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="/">
            <h1>LIBRARY</h1>
        </a>
        <p><br />Area 51</p>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
              <li>
                  <a href="/staff">
                    <i class="fas fa-group"></i>Staff List</a>
              </li>
              <li>
                  <a href="/admin-profile/{{auth()->user()->id}}">
                    <i class="fas fa-user"></i>My Profile</a>
              </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
@stop

@section('content')

<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <h1>Edit Staff Details</h1>
      @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
      @endif
      <div class="row">
        <div class="col-lg-12">
          <form action="/staff/{{$staff->id}}/update" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <label for="exampleInputPassword1">Name</label>
              <input name="name" type="text" class="form-control" placeholder="Name" value="{{$staff->name}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email address</label>
              <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$staff->email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone</label>
              <input name="phone"type="text" class="form-control" placeholder="08xxxxxxxxxx" value="{{$staff->phone}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Address</label>
              <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$staff->address}}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Date of Birth</label>
              <input name="birth" type="text" class="form-control" placeholder="YYYY-MM-DD" value="{{$staff->birth}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Identity Number</label>
              <input name="idNumber" type="text" class="form-control" value="{{$staff->idNumber}}">
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Edit</button>
          <a href="/staff" class="btn btn-secondary">Cancel</a>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
