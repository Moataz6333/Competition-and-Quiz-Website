<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('./css/style.css')}}">
</head>
<body>
    <!-- landing div -->
    <div class="landing">
        <!-- logo div -->
        <div class="nav">
          <div class="navText d-flex" >
              <div class="logo">
                  <h1 class="logoText"> ESC. </h1>
                 </div>
          </div>
        
          <div class="adminPage">
              <a href="{{route('login')}}" ><img src="{{asset('./images/admin.png')}}" alt=""><span>Admin Login</span></a>
          </div>

       </div>
         @if ($currentDate > $date)
             
         <h1 class="text-center m-3">
          The Test has closed!
         </h1>
           
       @else
           
    <!-- In your Blade template -->
@if($errors->any())
         <div class="container">
          <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         </div>
@endif
         <div class="container d-flex justify-content-center flex-column">
          <!-- test details -->
          <div class="testDetails d-flex m-4 justify-content-center" >
            <div class="testPost  d-flex" >
              <img src="{{asset('./images/esc.png')}}" alt="" >
              <div>
                <h1>{{$test->name}}</h1>
                <p> {{count($test->questions)}} Questions  |  {{$test->period}} Minutes</p>
              </div>
            </div>
            <div class="points" >
              <p>{{$test->points}}pts</p>
            </div>
          </div>
          <!-- form -->
           <form  method="POST" action="{{route('results.init',$test->id)}}" class="start-form mt-4 mb-4" >
            @csrf
            <div class="row m-3">
                              <input type="text" name="name" placeholder="Name" class="col-8 form-control" required>

            </div>
            <div class="row m-3">
              <input type="text" name="id" placeholder="Student Id" class="col-8 form-control" required> 

            </div>
            <div class="row m-3">
              <input type="email" name="email" placeholder="Email" class="col-8 form-control" required>

            </div>

            <div class="row mt-5">
              <div class="col-6">
                              <p style="color: #d9d9d9;" id="willStart">Will open in <span style="padding-left: 4px">{{$timer}} </span></p>
              </div>
              <div class="col-6">
                <button class="btn  submit" style="width: 100%;" id="start" disabled>Start</button>
              </div>
            </div>



           </form>



         </div>

         @endif

        
          <div class="back-row p-4">
            <button  class=" back">
            <a href="{{route('index')}}" ><img src="{{asset('./images/left-arrow.png')}}" alt=""> Back</a>
            </button>
          </div>

     </div>






<footer>
    <div class="row p-3" style="margin: 0;">
        <div class="col-lg-4 col-md-5 col-sm-11 contactUs ">
            <img src="{{asset('./images/logo.png')}}" alt="">
            <div class="contact">
                <h2>Contact us : 
                  <a href="https://www.linkedin.com/company/ebc-engineering-bridge-competition/" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                 <a href="https://www.facebook.com/cwtebc?mibextid=ZbWKwL" target="_blank">
                <i class=" first fab fa-facebook"></i>
            </a>
            
            <a href="https://youtube.com/@engineeringbridgecompetiti7508?si=XPLHEI0YBz7TFkAk" target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
                
              </h2>
              <p>
                The official website for ESC competition introduced by EBC team from faculty of engineering, Alexandria university.
              </p>
            </div>

        </div>
        <hr>
        <div class="col-lg-4 col-md-5 col-sm-11 contactUs d-flex justify-content-center">
            <div class="contact">
                <h2 class="text-center">Academin supervisors
              </h2>
              <p class="text-center" >
                Eng. Mohamed Saad , Eng. Mohamed Galal
              </p>
            </div>

        </div>
        <hr>

        <div class="col-lg-4 col-md-5 col-sm-11 contactUs d-flex justify-content-center">
          
            <div class="contact">
                <h2 class="text-center">Our Sponsor
              </h2>
              <div class="d-flex justify-content-center" style="gap: 16px; flex-wrap: wrap;">
                <img src="{{asset('./images/s1.png')}}" alt="" style="width: 61.15px; height: 45px;">
                <img src="{{asset('./images/s2.png')}}" alt="" style="width: 61.15px; height: 45px;">
                <img src="{{asset('./images/s3.png')}}" alt="" style="width: 45px; height: 45px;">
              </div>
            </div>

        </div>

    </div>

    
</footer>












<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset("./js/main.js")}}"></script>
</body>
</html>