<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>ART stairs</title>

<link rel="stylesheet" href="/css/website/bootstrap.min.css">
<link rel="stylesheet" href="/css/website/font-awesome.min.css">

<!-- Main css -->
<link rel="stylesheet" href="/css/website/style.css">
<link rel="stylesheet" href="/css/website/onlinelink.css" >

</head>
<body>

<!-- PRE LOADER -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-wordpress">
          <span class="sk-inner-circle"></span>
     </div>
</div>

<!-- Navigation section  -->

@include('layout.wnavbar')

<!-- Home Section -->


     

       @yield('content')

     

<!-- Footer Section -->

<footer>
     <div class="container">
          <div class="row">

               <div class="col-md-5 col-md-offset-1 col-sm-6">
                    <h3>ART stairs</h3>
                    <p>This is an online art gallery which will provide you so many features.</p>
                    <div class="footer-copyright">
                         <p>Copyright &copy; 2021</p>
                    </div>
               </div>

               <div class="col-md-4 col-md-offset-1 col-sm-6">
                    <h3>Talk to us</h3>
                    <p><i class="fa fa-globe"></i> Dhaka, Bangladesh</p>
                    <p><i class="fa fa-phone"></i> +8801625478936</p>
                    <p><i class="fa fa-save"></i> sahariarahmed@gmail.com </p>
               </div>

               <div class="clearfix col-md-12 col-sm-12">
                    <hr>
               </div>

               <div class="col-md-12 col-sm-12">
                    <ul class="social-icon ml-lg-3">
                         <li><a href="https://fb.com/" class="fa fa-facebook"></a></li>
                         <li><a href="https://twitter.com/" class="fa fa-twitter"></a></li>
                         <li><a href="https://instagram.com/" class="fa fa-instagram"></a></li>
                    </ul>
               </div>
               
          </div>
     </div>
</footer>

<!-- Back to top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- SCRIPTS -->

<script src="/js/w.js/jquery.js"></script>
<script src="/js/w.js/bootstrap.min.js"></script>
<script src="/js/w.js/particles.min.js"></script>
<script src="/js/w.js/app.js"></script>
<script src="/js/w.js/jquery.parallax.js"></script>
<script src="/js/w.js/smoothscroll.js"></script>
<script src="/js/w.js/custom.js"></script>

</body>
</html>