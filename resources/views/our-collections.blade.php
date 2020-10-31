<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Book Collections List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  </head>
  <body>
    <div class="top" id="top">
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="/our-collections" method="GET" name="search">
          <input class="form-control mr-sm-2" type="text" placeholder="Search for title" name="find" >
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <!-- <div class="col-6">
            <br><a href="/" class="btn btn-danger"><i class="fas fa-arrow-circle-left">&emsp;Home</i></a>
          </div> -->
          <br><h1>Books List</h1><br>
        </div>
        <!-- <div class="col-6">
          <form class="form-header" action="/our-collections" method="GET">
            <input name="find" class="au-input au-input--xl" type="text" name="search" placeholder="Search for title..." />
            <button class="au-btn--submit" type="submit">
                <i class="zmdi zmdi-search"></i>
            </button>
          </form>
        </div> -->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th>TITLE</th>
              <th>AUTHOR</th>
              <th>CATEGORY</th>
              <th>ISBN</th>
              <th>PUBLISHER</th>
              <th>PUBLICATION YEAR</th>
              <th>STOCK</th>
              <th>SHELF</th>
            </tr>
          </thead>
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
            </tr>
          @endforeach
        </table>
        <div class="col-6">
          <br><a href="#top" class="btn btn-secondary"><i class="fas fa-arrow-circle-up">&emsp;Back to top</i></a>
        </div>
      </div>
    </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>
