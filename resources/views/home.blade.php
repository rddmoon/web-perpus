<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
  </head>
  <!-- Fontfaces CSS-->
  <link href="{{asset('tmp/css/font-face.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="{{asset('tmp/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="{{asset('tmp/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('tmp/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="{{asset('tmp/css/theme.css')}}" rel="stylesheet" media="all">
  <style>
  *
{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
}
  section{
    padding: 100px;
  }
  .home{
    position: relative;
    min-height: 100vh;
    background: url({{asset('tmp/images/bg.jpg')}});
    background-size: cover;
    background-position: right;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .home h3{
    font-size: 1.5em;
    color: #FFFFFF;
    font-weight: 500;
    font-feature-settings: "liga" 0;
  }
  .home h2{
    font-size: 3em;
    color: #FFFFFF;
    font-weight: 500;
    line-height: 1.5em;
  }
  .home h1{
    font-size: 5em;
    color: #FFFFFF;
    font-weight: 700;
    line-height: 1.5em;
  }
  .home h2 span{
    font-size: 1.5em;
    font-weight: 700;
  }
  .choice{
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    padding: auto;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
  }
  </style>
  <body>
    <section class="home" id="home">
      <div class="texthome">
        <h3>Welcome to</h3>
        <h1>Area 51<span> LIBRARY</span></h1>
        <h2>Enjoy your stay.</h2>
        <br />
        <div class="choice">
          <a href="/our-collections" class="btn btn-primary">Explore Books</a>
          <h3>&emsp; or &emsp;</h3>
          <a href="/login" class="btn btn-success">LOGIN</a>
        </div>
      </div>
    </section>

    <!-- Jquery JS-->
    <script src="{{asset('tmp/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('tmp/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('tmp/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('tmp/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('tmp/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('tmp/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('tmp/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('tmp/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('tmp/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('tmp/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('tmp/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('tmp/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('tmp/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('tmp/js/main.js')}}"></script>
  </body>
</html>
