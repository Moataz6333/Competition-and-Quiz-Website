
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
              <a href="{{route('login')}}" style="text-decoration: none"><img src="{{asset('./images/admin.png')}}" alt=""><span>Admin Login</span></a>
          </div>

       </div>
         
         <!-- heading -->
          <div class="heading mt-2">
            <img src="{{asset('./images/h1.png')}}" alt="">
            <h2>2024</h2>
          </div>


          <!-- features -->
           <div class="container">

            <div class="features row mt-5 mb-4">
                <div class="feat col-lg-4 col-md-6 col-sm-12 mb-3">
                    <img src="{{asset('./images/icon.png')}}" alt="" class="mb-3">
                <p>A competition based on the scientific knowledge of structure analysis courses from FOE AU, civil engineering department.</p>
                
                </div>
                <div class="feat col-lg-4 col-md-6 col-sm-12 mb-3">
                    <img src="{{asset('./images/icon2.png')}}" alt="" class="mb-3">
                    <p>All the questions for the competition were prepared by a specialized committee of professors and teaching assistants from the Faculty of Engineering, AU.</p>
                
                </div>
                <div class="feat col-lg-4 col-md-6 col-sm-12 mb-3">
                    <img src="{{asset('./images/icon3.png')}}" alt="" class="mb-3">
                    <p>The competition is open for all students from Civil, Architecture and Electrical engineering departments form Alexandria university.</p>
                
                </div>
              </div>
    


           </div>
          <hr>
          {{-- register --}}
          @php
    $currentDate = now();
    $deadlineDate = \Carbon\Carbon::parse($rule->deadline);
@endphp

          @if($currentDate > $deadlineDate || !$rule->status )
                @else
         
          <div style="background-color: black" class="p-2">
            <div class="registerNow container mt-3 mb-3 d-flex justify-content-around align-items-self ">
                <div>
                    <p>Don't miss the opportunity to participate in <span style="font-weight: 700"> ESC</span> competition for the current season.</p>
                    <h5>Time left: <span id="countdown"></span></h5>
                    <input type="hidden" id="deadline" value="{{ $rule->deadline }}">
                </div>
                <a href="{{route('students.index')}}" class="btn">Register now</a>
              </div>
          </div>
          @endif
         
           <!-- test -->
            <div class="container ">

                <h1 class="m-3 AvailableH1">Available Tests</h1>

                <div class="testsContainer d-flex  pb-4 flex-wrap">
                    @foreach ($tests as $test)
                    <div class="test  ">
                        <div class="d-flex " style="gap: 8.1px;">
                            <img src="{{$test->icon}}" alt="">
                            <div class="textContent d-flex flex-column">
                                <h3>{{$test->name}}</h3>
                                <div class="d-flex"><img src="{{asset("./images/dateIcon.png")}}" alt="">
                                  <p>{{$test->date}} , {{date('h:i A', strtotime($test->time))}}</p>
                                </div>

                            </div>

                        </div>
                        <a href="{{route('results.index',$test->id)}}" class="btn">Go</a>

                    </div>
                    @endforeach
                    
                   
                </div>

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
  









<script>
    // Get the deadline date from the hidden input field
const deadline = document.getElementById("deadline").value;

// Convert the deadline to a JavaScript Date object
const targetDate = new Date(deadline).getTime();

// Update the countdown every second
const countdown = setInterval(function () {
    // Get current date and time
    const now = new Date().getTime();

    // Calculate the difference between the current time and the target time
    const timeLeft = targetDate - now;

    // Calculate time in days, hours, minutes, and seconds
    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    // Display the countdown in the span element
    document.getElementById("countdown").innerHTML =
        days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

    // When the countdown is finished
    if (timeLeft < 0) {
        clearInterval(countdown);
        document.getElementById("countdown").innerHTML = "Event has started!";
    }
}, 1000);

</script>

    <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>