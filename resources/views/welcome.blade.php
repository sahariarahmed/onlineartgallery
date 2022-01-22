<!DOCTYPE html>
<html lang="en">
<head>

     <title>ART stairs</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="/css/bootstrap.min.css">
     <link rel="stylesheet" href="/css/font-awesome.min.css">
     <link rel="stylesheet" href="/css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="/css/tooplate-gymso-style.css">
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    @include('layout.navbar')



    
    <!-- BODY -->
     <section class="about section" id="about">
          <div class="container">

     @if(session()->has('admin'))
     <p class="alert alert-success">
     {{session()->get('admin')}}
     </p>
     @endif    

            @yield('content')

          </div>
     </section>

    

    <!-- FOOTER -->
     <footer class="site-footer">
          <div class="container">
               <div class="row">

                    <div class="ml-auto col-lg-4 col-md-5">
                        <p class="copyright-text">Copyright &copy; 2021
                        
                        <br>Design: <a href="https://github.com/sahariarahmed">Tonmoy</a></p>
                    </div>

                    <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                        <p class="mr-4">
                            <i class="fa fa-envelope-o mr-1"></i>
                            <a href="#">sahariarahmed11@gmail.com</a>
                        </p>

                        <p><i class="fa fa-phone mr-1"></i> 01625478936</p>
                    </div>
                    
               </div>
          </div>
     </footer>

    

     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>