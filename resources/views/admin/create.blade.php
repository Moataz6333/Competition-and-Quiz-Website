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
         <div class="nav">
            <div class="navText d-flex" >
                <div class="logo">
                    <h1 class="logoText"> ESC. </h1>
                   </div>
                   <h2 class="adminName">{{auth()->user()->name}}</h2>
            </div>
          
            <div class="adminPage">
                <a href="{{route('logout')}}" ><img src="{{asset('./images/logout.png')}}" alt=""><span>Logout</span></a>
            </div>

         </div>

         @if(session('success'))

         <h3 class="text-center m-3">{{ session('success') }}</h3>
         
         
         @endif
          <!-- create div -->
          <div class="back-row p-4">
            <button  class=" back">
            <a href="{{route('tests.index')}}" ><img src="{{asset('./images/left-arrow.png')}}" alt=""> Back</a>
            </button>
          </div>
          <div class="create container p-3">
                <form action="{{route('tests.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- test -->
                    <div class="testContent">
                        <input type="text" name="name" placeholder="Test Name" required>
                        <div class="input-group">
                            <label for="testIcon">Test Icon</label>
                            <input type="file" name="testIcon" >
                        </div>
                       
                        
                        <input type="text" name="points" placeholder="Test Points" required >
                        <input type="text" name="time" placeholder="Test Time (min)" required >
                        <div class="input-group">
                            <label for="date">Test Date</label>
                            <input type="date" name="date"  required >
                        </div>
                       <div class="input-group">
                        <label for="start">Start At : </label>
                        <input type="time" name="start" required >
                       </div>
                       
                        <button class="btn btn-primary" type="submit" style="width: 200px;;">Submit</button>




                    </div>
                  
                </form>

          </div>

         
         


        </div>



       
    
    
    
    
    
    
    
    
    
    
        <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <!-- Popper.js -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <script src="{{asset('./js/create.js')}}"></script> --}}
    </body>
    </html>