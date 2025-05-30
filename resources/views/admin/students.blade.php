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
         <div class="container">
            <h1 class="text-center m-4" style="font-size: 1.5rem;">ESC - Participants list</h1>
            <table class="table table-bordered table-dark">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $stu)
                        
                    <tr>
                      <th scope="row">{{$stu->stu_id}}</th>
                      <td>{{$stu->name}} </td>
                      <td>{{$stu->email}} </td>
                      <td>{{$stu->whatsapp}} </td>
                    </tr>
                    @endforeach
                 
                 
                </tbody>
              </table>


              <div class="text-center">
                <a href="{{route('export_students')}}" class="btn createBtn ">Export Excel Sheet</a>
                </div>


         </div>
          
         <div class="back-row p-4">
            <button  class=" back">
            <a href="{{route('tests.index')}}" ><img src="{{asset('./images/left-arrow.png')}}" alt=""> Back</a>
            </button>
          </div>

     </div>
     







         </div>
         <script src="{{asset('js/dashboard.js')}}"></script>
         <!-- jQuery -->
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <!-- Popper.js -->
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
       <!-- Bootstrap JS -->
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     </body>
     </html>