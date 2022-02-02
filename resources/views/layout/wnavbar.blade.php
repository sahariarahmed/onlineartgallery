<style>
.dropdown-content {
    display: none;
    position: absolute;
    background-color: whitesmoke;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}
.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
.dropdown-content a:hover {
    background-color: #1a586b;
}
.nav__item:hover .dropdown-content {
    display: block;
}
</style>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
              <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                   <span class="icon icon-bar"></span>
                   <span class="icon icon-bar"></span>
                   <span class="icon icon-bar"></span>
              </button>
              <a href="{{url('/')}}" class="navbar-brand">ART STAIRS</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

            @auth
            @if(Auth::user()->role=='admin')
            <li><a class="btn btn-warning" href="/admin">ADMIN</a></li>
                @endif
            @endauth

            <li><div class="nav__item" style="margin-top: 12px; color: #777; letter-spacing: 0.2px;
                font-family: 'Lora', serif; font-size: 18px;"><a href="{{route('show.cats')}}">Arts</a>
                   <div class="dropdown-content">
               @if (Auth::check())

                   @if(Auth::user()->role == 'artist')
                       <a href="{{route('create.artist.cat')}}">Create Category</a>
                       <a href="{{route('view.artist.cat')}}">View Arts</a>
                   @endif
                   @endif
                   </div>
                       </div>
               </li>

            <li><div class="nav__item" style="margin-top: 12px; color: #777; letter-spacing: 0.2px;
                font-family: 'Lora', serif; font-size: 18px;"><a href="{{route('showevents')}}">Events</a>
                   <div class="dropdown-content">
                    <a href="{{route('current.showevents')}}">Current</a>
                    <a href="{{route('upcoming.showevents')}}">Upcoming</a>
                    <a href="{{route('past.showevents')}}">Past</a>
                   </div>
                   </div>
            </li>

            <li><div class="nav__item" style="margin-top: 12px; color: #777; letter-spacing: 0.2px;
             font-family: 'Lora', serif; font-size: 18px;"><a href="{{route('showcourses')}}">Courses</a>
                <div class="dropdown-content">
                @if (Auth::check())
                @if(Auth::user()->role == 'artist')
                    <a href="{{route('course.artist.create')}}">Create Course</a>
                    <a href="{{route('view.artist.course')}}">View Course</a>
                @endif
                @endif
                </div>
                    </div>
            </li>
            <li><a href="{{route('showartists')}}">Artists</a></li>
            <li><div class="nav__item" style="margin-top: 12px; color: #777; letter-spacing: 0.2px;
            font-family: 'Lora', serif; font-size: 18px;"><a href="{{route('showblog')}}">Blog</a>
                <div class="dropdown-content">
                @if (Auth::check())
                    @if(Auth::user()->role == 'artist')
                    <a href="{{route('artistblog.create')}}">Create Blog</a>
                    <a href="{{route('artist.blog.list')}}">Blog List</a>
                    @endif
                @endif
                </div>
            </li>

            @if (Auth::check())
            @if (Auth::user()->role == 'user')
            <li><div class="nav__item" style="margin-top: 12px; color: #777; letter-spacing: 1px; padding-right: 20px;
            padding-left: 20px; font-family: 'Lora', serif;font-size: 18px;">Support
            <div class="dropdown-content">
                <a href="{{route('apply.artist')}}">Apply For Artist</a>
                <a href="{{route('upload.cat')}}">Upload Category</a>
            </div>
            </div></li>
            @endif
            @endif
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

