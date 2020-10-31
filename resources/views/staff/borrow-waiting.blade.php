@extends('layouts.master')

@section('title')
<title>Request Waiting List</title>
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
                    <a href="/book">
                      <i class="fas fa-group"></i>Books List</a>
                </li>
                <li>
                    <a href="#">
                      <i class="fas fa-group"></i>Borrow Request</a>
                </li>
                <li>
                    <a href="/member">
                      <i class="fas fa-group"></i>Members List</a>
                </li>
                <li>
                    <a href="/staff-profile/{{auth()->user()->id}}">
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
                  <a href="/book">
                    <i class="fas fa-book"></i>Books List</a>
              </li>
              <li>
                  <a href="/borrow">
                    <i class="fas fa-tasks"></i>Borrows List</a>
              </li>
              <!-- <li>
                  <a href="#">
                    <i class="fas fa-exclamation-circle"></i>Borrows Overdue</a>
              </li> -->
              <li>
                  <a href="/borrow/waiting">
                    <i class="fas fa-comment"></i>Borrow Request</a>
              </li>
              <!-- <li>
                  <a href="#">
                    <i class="fas fa-check-square"></i>Returned Today</a>
              </li> -->
              <li>
                  <a href="/member">
                    <i class="fas fa-group"></i>Members List</a>
              </li>
              <li>
                  <a href="/staff-profile/{{auth()->user()->id}}">
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
      <!-- @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
      @endif -->
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Borrow Request Waiting List</h3>
          <br />
          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>DATE REQUESTED</th>
                  <th>BOOK</th>
                  <th>STATUS</th>
                  <th>BORROWER NAME</th>
                  <th>BORROWER EMAIL</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_borrow as $borrow)
                  <tr>
                    <td>{{$borrow->borrowDate}}</td>
                    <td>{{$borrow->book->title}}</td>
                    <td>{{$borrow->status}}</td>
                    <td>{{$borrow->user->name}}</td>
                    <td>{{$borrow->user->email}}</td>
                    <td>
                      <form method="POST" action="/borrow/{{$borrow->id}}/acc">
                        {{csrf_field()}}
                      <button class="btn btn-success" type="submit" onclick="return confirm('Are you sure you want to accept this borrow request?')">Accept</button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
