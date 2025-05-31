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
         @if (false)
             
         <h1 class="text-center m-3">
          The rejistration has closed!
         </h1>
           
       @else
           
    
         <div class="container d-flex justify-content-center flex-column">
          <!-- test details -->
          <div class="testDetails d-flex m-4 justify-content-center" >
            <div class="testPost  d-flex" >
              <img src="{{asset('./images/esc.png')}}" alt="" >
              <div style="width:170px; height:90px;">
                <img src="{{asset('./images/eng.png')}}" alt="" class="w-100">
              </div>
            </div>
           
          </div>
          {{-- done --}}
          @if(session('success'))

         <h3 class="text-center m-3">{{ session('success') }}</h3>
         
         
         @else
          {{-- alert --}}
          @if ($errors->any())
               <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
          </div>
          @endif
         
          <!-- form -->
           <form  method="POST" action="{{route('students.store')}}" class="start-form mt-4 mb-4 w-100 p-3" style="background-color:#0A0A0ACC; border-radius:18px; border:3px solid #252525;" >
            @csrf
            <h1 class="text-center pb-3" style="font-weight: 900;
    font-size: 25px;
    color: #D9D9D9;
    border-bottom: 1px solid #252525;">Competition Registration</h1>
            <div class="row m-3">
                              <input type="text" name="name" placeholder="Name" class="col form-control" required>

            </div>
            <div class="row m-3">
              <input type="text" name="id" placeholder="Student Id" class="col form-control" required> 

            </div>
            <div class="row m-3">
              <input type="email" name="email" placeholder="Email" class="col form-control" required>

            </div>
            <div class="row m-3">
              <input type="text" name="whatsapp" placeholder="Whatsapp " class="col form-control" required>

            </div>

            <div class="row pt-3">
              <div class="col d-flex justify-content-center">
                <button class="btn  submit" style="width: 60%; background-color:white; color:black;" id="start" >Submit</button>
              </div>
            </div>



           </form>
            <p class="text-center pt-4 pb-4 " style="font-size: 12px; color:#D9D9D9;">
              تنويه: احفظ هذه البيانات جيدا، ولا تقم بتغيرها خلال المسابقة
              <br>
              Note: remember these data well, and don’t change it during the competition.
            </p>
            @endif

         </div>

        
         @endif
        
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
<script src="{{asset("./js/main.js")}}"></script>
</body>
</html>