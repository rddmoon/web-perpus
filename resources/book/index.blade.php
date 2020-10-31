@extends('layouts.master')

@section('title')
<title>Books List</title>
@stop

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

@section('search')
<form class="form-header" action="/book" method="GET">
  <input name="find" class="au-input au-input--xl" type="text" name="search" placeholder="Search for title..." />
  <button class="au-btn--submit" type="submit">
      <i class="zmdi zmdi-search"></i>
  </button>
</form>
@stop

@section('content')
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Library Book List</h3>
          <div class="table-data__tool-right">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
              <i class="zmdi zmdi-plus"></i>Add New Book
            </button>
          </div>
          <br />
          <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
              <thead>
                <tr>
                  <th>TITLE</th>
                  <th>AUTHOR</th>
                  <th>CATEGORY</th>
                  <th>ISBN</th>
                  <th>PUBLISHER</th>
                  <th>PUBLICATION YEAR</th>
                  <th>STOCK</th>
                  <th>SHELF</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_book as $book)
                  <tr>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author->name}}</td>
                    <td>{{$book->category->name}}</td>
                    <td>{{$book->ISBN}}</td>
                    <td>{{$book->publisher->name}}</td>
                    <td>{{$book->publicationYear}}</td>
                    <td>{{$book->stock}}</td>
                    <td>{{$book->shelf->name}}</td>
                    <td>
                      <a href="/book/{{$book->id}}/edit" class="btn btn-warning" type="button">Edit</a>
                      <a href="/book/{{$book->id}}/delete" class="btn btn-danger" type="button" onclick="return confirm('Are you sure you want to permanently delete this book details?')">Delete</a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/book/create" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input name="title" type="text" class="form-control" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="author_id">Author</label>
            <select id="author_id" name="author_id" class="form-control select2" value="{{$book->author_id}}">
              <option value="N/A">--SELECT--</option>
              @foreach(\App\Models\Author::get() as $author)
              <option value="{{$author->id}}">{{$author->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-control select2" value="{{$book->category_id}}">
              <option value="N/A">--SELECT--</option>
              @foreach(\App\Models\Category::get() as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">ISBN</label>
            <input name="ISBN" type="text" class="form-control" placeholder="ISBN">
          </div>
          <div class="form-group">
            <label for="publisher_id">Publisher</label>
            <select id="publisher_id" name="publisher_id" class="form-control select2" value="{{$book->publisher_id}}">
              <option value="N/A">--SELECT--</option>
              @foreach(\App\Models\Publisher::get() as $publisher)
              <option value="{{$publisher->id}}">{{$publisher->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Publication Year</label>
            <input name="publicationYear" type="text" class="form-control" placeholder="YYYY-MM-DD">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Stock</label>
            <input name="stock" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label for="shelf_id">Shelf</label>
            <select id="shelf_id" name="shelf_id" class="form-control select2" value="{{$book->shelf_id}}">
              <option value="N/A">--SELECT--</option>
              @foreach(\App\Models\Shelf::get() as $shelf)
              <option value="{{$shelf->id}}">{{$shelf->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
