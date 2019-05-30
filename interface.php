<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Smartbridge</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
      .navbar{
        margin-bottom: 0;
        border-radius:0;
        background-color:#5E4485;
        color:#FFF;
        padding:1% 0;
        font-size:1.2em;
        border:0;
      }
      .navbar-brand{
        float:left;
        max-width: 100px;
        min-height: 55px;
        padding:0 20px 5px;
      }
      .navbar-inverse .navbar-nav .active a, .navbar-inverse .navbar-nav .active a:focus,
      .navbar-inverse .navbar-nav .active a:hover{
      color:#FFF;
      background-color:#5E4485;
    }
      .navbar-inverse .navbar-nav li a{
        color:#D5D5D5;
      }
      .carousel-caption{
        top:50%;
        transform translateY(-50%);
        text-transform: uppercase;
      }
      .btn{
        font-size:18px;
        color:#FFF;
        padding:12px 22px;
        background:#5E4485;
        border:2px solid #FFF;
      }
      footer{
        width:100%;
        background-color: #5E4485;
        padding: 5%;
        color: #FFF;
      }
      .fa{
        padding: 15px;
        font-size: 30px;
        color: #FFF;
      }
      .fa:hover{
        color: #D5D5D5;
        text-decoration: none;
      }

      @media (max-width: 600px){
        .carousel-caption{
          display: none;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target ="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="http://www.thesmartbridge.com/images/logo.png">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">HOME</a></li>
            <li><a href="form.php">LOGIN/REGISTRATION</a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">SERVICES</a></li>
            <li><a href="#">CONTACT</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="https://www.webfarmer.com.au/wp-content/uploads/2016/09/domestic-water-pumps-1024x712.png">
          <div class="carousel-caption">
            <h1>data visualization</h1>
            <br>
            <button onclick="location.href = 'user.php'" type="button" class="btn btn-default">Get Started</button>
          </div>
        </div> <!--End Active--->
        <div class="item">
          <img src="http://img.directindustry.com/images_di/photo-g/121937-7143987.jpg" alt="#" width="706px">
        </div>
      </div>
      <!---Start slider controls--->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span></a>
    </div>

    <footer class="container-fluid text-center">
      <div class="row">
        <div class="col-sm-4">
          <h3>Contact Us</h3>
          <br>
          <h4>Our Contact info here.</h4>
        </div>
        <div class="col-sm-4">
          <h3>Connect</h3>
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-google"></a>
          <a href="#" class="fa fa-linkedin"></a>
          <a href="#" class="fa fa-youtube"></a>
        </div>
      </div>
    </footer>
  </body>
</html>
