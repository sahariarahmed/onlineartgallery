<link rel="stylesheet" href="/css/bootstrap.min.css">
<style>
  #particles-js{
      width: 100%;
      height: 100%;
      background-color: #ffffff;
      background-image: url('');
      background-size: cover;
      background-position: 50% 50%;
      background-repeat: no-repeat;
  }
  .particles-js-canvas-el{
    position: absolute;
    width: 100%;
    height: 100vh;
    top: 0;
  }
  .special-p{
    font-size: 20px;
    margin-bottom: 20px !important;
    margin-top: -30px !important
  }
  .abc{
    overflow: hidden;
    z-index: 1;
    width: 780px;
    height: 430px;
    margin: 0;
    border: 2px solid black;
    margin-left: 11%;
    box-shadow: 4px 5px 30px blueviolet;
  }
  </style>

<section class="vh-100">
  <div id="particles-js">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black abc" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" id="particles-js">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 special-p">Register Here</p>

                  <form action="{{route('store.regForm')}}" method="POST" enctype="multipart/form-data" class="mx-1 mx-md-4">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"> Your Name</label>
                        <input name="name" placeholder="Enter your name" type="text" id="form3Example1c" class="form-control" required />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Your Email</label>

                        <input name="email" placeholder="Enter your email" type="email" id="form3Example3c" class="form-control" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>

                        <input name="password" placeholder="Enter password" type="password" id="form3Example4c" class="form-control" minlength="6" required />
                      </div>
                    </div>

                    {{-- <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4cd" class="form-control" />
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div> --}}

                    <button type="submit" class="btn btn-primary btn-lg">Register</button>


                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="/uploads/bg/reg.webp" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>



<script type="text/javascript" src="https://www.kodeeo.com/js/particles.min.js"></script>
<script type="text/javascript" src="https://www.kodeeo.com/js/particles.stats.min.js"></script>
<script type="text/javascript" src="https://www.kodeeo.com/js/particles.active.js"></script>
