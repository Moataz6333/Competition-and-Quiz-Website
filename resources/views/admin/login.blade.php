<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('./css/admin.css')}}">
</head>
<body>
    <!-- landing div -->
    <div class="landing">
        <!-- logo div -->
          <div class="logo">
          <h1 class="logoText"> ESC. </h1>
         </div>

<!-- heading -->
<div class="heading mt-2">
    <img src="{{asset("./images/h1.png")}}" alt="">
    <h2>2024</h2>
  </div>
         <!-- login -->
          <div class="login">
            <img src="{{asset('./images/h1.png')}}" alt="" class="hidden">
            <div class="loginForm">
                <h1><img src="{{asset('./images/admin2.png')}}" alt="">Login as an Admin</h1>
              <div class="line"></div>
              @if ($errors->has('email'))
              <span class="text-danger p-3">{{ $errors->first('email') }}</span>
          @endif
                <form action="{{route('check')}}" method="POST">
                  @csrf
                    <input type="text" name="name" required placeholder="Username">
                    <input type="password" name="password" required placeholder="Password">

                    <button type="submit">Login</button>
                </form>
                <p>Want to be an admin? / <a href="mailto:muhamedmourad23@gmail.com">Register</a></p>
            </div>
            
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
    <script src="{{asset('./js/create.js')}}"></script>
    </body>
    </html>