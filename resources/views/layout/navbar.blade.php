<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="/uploads/site.png" height="50px" width="50px" class="card-image"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a href="{{route('gallery')}}" class="nav-link smoothScroll">Gallery</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('events')}}" class="nav-link smoothScroll">Events</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('artists')}}" class="nav-link smoothScroll">Artists
                        @if (Auth::user()->unreadnotifications()->count() > 0)
                        ({{ Auth::user()->unreadnotifications()->count() }})
                    @endif</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('courses')}}" class="nav-link smoothScroll">Courses</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('blog')}}" class="nav-link smoothScroll">Blog</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('contact')}}" class="nav-link smoothScroll">Contact</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('list')}}" class="nav-link smoothScroll">Users</a>
                </li>
            </ul>

            <li><a class="btn btn-info" href="{{route('logout')}}">Logout</a></li>



        </div>

    </div>
</nav>
