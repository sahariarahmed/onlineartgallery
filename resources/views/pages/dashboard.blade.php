<link rel="stylesheet" href="'https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap">
<style>
.card-container {
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    grid-gap: 10px;
    margin-left: 25px;
    margin-top: 40px;
    margin-right: 25px;
}
.card-container2{
    display: grid;
    grid-template-columns: 50% 50%;
    grid-gap: 10px;
    margin-left: 25px;
    margin-top: 60px;
    margin-right: 25px;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(153, 153, 153, 0.2);
    transition: 0.3s;
    width: 90%;
    border-radius: 10px;
    height: 200px;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
}


.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
.card .fas {
    border-radius: 5px 5px 0 0;
    font-size: 50px;
    position: absolute;
    left: 30px;
    top: 37px;
}
.description h3{

    text-align: center;
    font-size: 76px;
    /*! color: green; */
    margin-left: 60px;
}

.description p{

    font-size: 16px;
    margin-bottom: 20px;
    font-family: 'Exo 2', sans-serif;
}
</style>






@extends('welcome')
@section('content')

<div class="card-container">




    <div class="card m-3" style="text-align:center;">
        <a>
            <div class="card-body" style="background-color:rgba(36, 1, 192, 0.589);">

                <h4 class="text fw-normal mt-0" title="Number of Employees"><b>User</b></h4>
                <h5 class="mt-3 mb-3">{{$users}}</h5>

            </div>
        </a>
        </div>


        <div class="card m-3" style="text-align:center;">
            <a>
            <div class="card-body" style="background-color:rgba(255, 109, 218, 0.795); width:100%; height:100%;">

                <h4 class="text fw-normal mt-0" title="Number of Employees"><b>Artist</b></h4>
                <h5 class="mt-3 mb-3">{{$artists}}</h5>

            </div>
            </a>
            </div>

    <div class="card m-3" style="text-align:center;">
        <a>
        <div class="card-body" style="background-color:rgba(35, 184, 172, 0.705);">

            <h4 class="text fw-normal mt-0" title="Number of Employees"><b>Gallery</b></h4>
            <h5 class="mt-3 mb-3"> Category: {{$gallery}}</h5>
            <p class="mt-3 mb-3"> Images: {{$images}}</p>

        </div>
    </a>
    </div>




            <div class="card m-3" style="text-align:center;">
                <a>
                    <div class="card-body" style="background-color:rgba(58, 235, 35, 0.815);">

                        <h4 class="text fw-normal mt-0" title="Number of Employees"><b>Courses</b></h4>
                        <h5 class="mt-3 mb-3">Courses exits: {{$courses}}</h5>

                    </div>
                </a>
            </div>

            <div class="card m-3" style="text-align:center;">
                <a>
                <div class="card-body" style="background-color:rgba(253, 255, 109, 0.795);">

                    <h4 class="text fw-normal mt-0" title="Number of Employees"><b>Blogs</b></h4>
                    <h5 class="mt-3 mb-3">Total Blogs: {{$blogs}}</h5>

                </div>
            </a>
            </div>

            <div class="card m-3" style="text-align:center;">
                <a>
                <div class="card-body" style="background-color:rgba(201, 105, 27, 0.795);">

                    <h4 class="text fw-normal mt-0" title="Number of Employees"><b>Events</b></h4>
                    <p class="mt-3 mb-3"> current: {{$cEvents}}</p>
                    <p class="mt-3 mb-3"> upcoming: {{$uEvents}}</p>

                </div>
            </a>
            </div>





</div>
<br><br>

<a class="btn btn-outline-success" href="{{route('report.all')}}">Report </a>

@endsection
