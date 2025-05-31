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
                <a href="#" class=" goToPage btn">EBC Page <img src="{{asset('./images/goto.png')}}" alt=""></a>

             </div>
             <div class="back-row p-4">
                <button  class=" back">
                <a href="{{route('index')}}" ><img src="{{asset('./images/left-arrow.png')}}" alt=""> Back</a>
                </button>
              </div>
         
    </div>

 
  











    <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>