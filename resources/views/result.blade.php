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
          <div class="logo">
          <h1 class="logoText"> ESC. </h1>
         </div>

            <h2 class="h2Rescult text-center m-3">
                {{$test->name}}
            </h2>

            <!-- baord -->
             <div class="board">
                <div class="board-row ">
                    <p>Name: {{$res->name}}</p>
                    <p>Score: {{$res->score}}pts</p>

                </div>
                <div class="board-row  ">
                    <p>Student ID: {{$res->stu_id}}</p>
                    <p>Time: {{$res->timeTaken}}</p>

                </div>
                <div class="board-row  ">
                   <p>Correct answers: {{$res->correct}} </p>
                   <p>Incorrect answers: {{$res->wrong}}</p>

                </div>
                <div class="board-row ">
                    <p>Email: {{$res->email}}</p>

                </div>
             </div>
             <div class="goodluck">
                <p class="text-center ">Good luck, don’t forget to check the competition leaderboard on the page</p>
                <a href="https://www.facebook.com/cwtebc?mibextid=ZbWKwL" class=" goToPage btn">EBC Page <img src="{{asset('./images/goto.png')}}" alt=""></a>

             </div>
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
                        <a href="#" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                         <a href="#" target="_blank">
                        <i class=" first fab fa-facebook"></i>
                    </a>
                    
                    <a href="#" target="_blank">
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
</body>
</html>