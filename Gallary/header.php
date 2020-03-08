<?php include_once("connection.php");

?>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">

  <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style type="text/css">
  body {
  margin: 0;
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #f7f7f7;
  height: 51px;
}
.navbar {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 5px;
}

/*
headeer top
*/
.topbar{
background-color: #212529;
padding: 0;
}

.topbar .container .row {
margin:-7px;
padding:0;
}

.topbar .container .row .col-md-12 { 
padding:0;
}

.topbar p{
margin:0;
display:inline-block;
font-size: 13px;
color: #f1f6ff;
}

.topbar p > i{
margin-right:5px;
}
.topbar p:last-child{
text-align:right;
} 

header .navbar {
  margin-bottom: 0;
}

.topbar li.topbar {
  display: inline;
  padding-right: 18px;
  line-height: 52px;
  transition: all .3s linear;
}

.topbar li.topbar:hover {
  color: #1bbde8;
}

.topbar ul.info i {
  color: #131313;
  font-style: normal;
  margin-right: 8px;
  display: inline-block;
  position: relative;
  top: 4px;
}

.topbar ul.info li {
  float: right;
  padding-left: 30px;
  color: #ffffff;
  font-size: 13px;
  line-height: 44px;
}

.topbar ul.info i span {
  color: #aaa;
  font-size: 13px;
  font-weight: 400;
  line-height: 50px;
  padding-left: 18px;
}

ul.social-network {
border:none;
margin:0;
padding:0;
}

ul.social-network li {
border:none;  
margin:0;
}

ul.social-network li i {
margin:0;
}

ul.social-network li {
  display:inline;
  margin: 0 5px;
  border: 0px solid #2D2D2D;
  padding: 5px 0 0;
  width: 32px;
  display: inline-block;
  text-align: center;
  height: 32px;
  vertical-align: baseline;
  color: #000;
}

ul.social-network {
list-style: none;
margin: 5px 0 10px -25px;
float: right;
}

.waves-effect {
  position: relative;
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  vertical-align: middle;
  z-index: 1;
  will-change: opacity, transform;
  transition: .3s ease-out;
  color: #fff;
}
a {
color: #0a0a0a;
text-decoration: none;
}

li {
  list-style-type: none;
}
.bg-image-full {
  background-position: center center;
  background-repeat: no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}
.bg-dark {
  background-color: #222!important;
}

.mx-background-top-linear {
  background: -webkit-linear-gradient(45deg, #54d400 48%, #1b1e21 48%);
  background: -webkit-linear-gradient(left, #54d400 48%, #1b1e21 48%);
  background: linear-gradient(45deg, #54d400 48%, #1b1e21 48%);
}
  </style>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
      window.alert = function(){};
      var defaultCSS = document.getElementById('bootstrap-css');
      function changeCSS(css){
          if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
          else $('head > link').filter(':first').replaceWith(defaultCSS); 
      }
      $( document ).ready(function() {
        var iframe_height = parseInt($('html').height()); 
        window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
      });
  </script>
</head>
<body>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Navigation -->
<div class="fixed-top">
<header class="topbar">
<nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
  <div class="container">
    <a class="navbar-brand" href="https://nusasatu.com" style="text-transform: uppercase;"> Gallery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
          <a class="nav-link" href="">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>

       <li class="nav-item">
          <a class="nav-link" id="descovery" href="display.php">discovery</a>
        </li>

        <li class="nav-item">
          <a class="nav-link search" href="search.php">Search</a>
        </li>

        <li class="nav-item">
          <a class="nav-link upload" href="upload.php">Upload</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="favdisplay.php">My Fav</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
</header>	<script type="text/javascript">
  </script>


</body></html>