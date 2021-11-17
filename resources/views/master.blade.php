<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-comm Project</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
    <!--header -->
    <?php
    use App\Http\Controllers\ProductController;
    $total=0;
    if (Session::has('user')) 
    {
      $total= ProductController::cartItem();  
    }
    ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">E-Comm</a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li class=""><a href="#">Orders</a></li>
            </ul>
            <form action="/search" class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" name="query" class="form-control search-box" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Cart({{ $total }})</a></li>
              @if(Session::has('user')) 
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Session::get('user')['nama'] }}
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/logout">Logout</a></li>
                </ul>
              </li>
              @else
              <li><a href="/login">Login</a></li>
              @endif
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    @yield('content')
    <!-- footer -->
    <div style="clear:both" class="panel panel-default">
      <div class="panel-body">
        Panel content
      </div>
      <div class="panel-footer">Panel footer</div>
    </div>
</body>
<style>
    .custom-login{
        height: 500px;
        padding-top: 100px;
    }
    img.slider-img{
      height: 400px !important;
    }
    .custom-product{
      height: 600px;
    }
    .slider-text{
      background-color: #35443585 !important;
    }
    .trending-image{
      height: 100px;
    }
    .trending-item{
      float: left;
      width: 20%;
    }
    .trending-wrapper{
      margin: 30px;
    }
    .detail-img{
      height: 200px;
    }
    .search-box{
      width: 500px !important;
    }
</style>
</html>