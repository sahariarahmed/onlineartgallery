<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

         <div class="navbar-header">
              <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                   <span class="icon icon-bar"></span>
                   <span class="icon icon-bar"></span>
                   <span class="icon icon-bar"></span>
              </button>
              <a href="{{url('/')}}" class="navbar-brand">ART stairs</a>
         </div>
         <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">

                    @auth
                    @if(Auth::user()->role=='admin')
                    <li><a class="btn btn-warning" href="/admin">ADMIN</a></li>
                     @endif
                    @endauth

                   {{-- <li class="active"><a href="#">Gallery</a></li> --}}
                   <li><a href="{{route('showevents')}}">Events</a></li>
                   <li><a href="{{route('showcourses')}}">Courses</a></li>
                   <li><a href="{{route('showartists')}}">Artists</a></li>
                   <li><a href="{{route('showblog')}}">Blog</a></li>
                   <li><a href="{{route('showcontact')}}">Contact</a></li>
                    @if (Auth::check())
                    <li><a class="btn btn-info" href="{{route('logout')}}">Logout</a></li>

                    @else
                    <li><a class="btn btn-info" href="{{route('login')}}">Login</a></li>
                    @endif

              </ul>
         </div>

 </div>
</div>

