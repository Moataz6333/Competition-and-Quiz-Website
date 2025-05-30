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

<div class="back-row p-3">
    <button  class=" back">
    <a href="{{route('ques.create',$ques->test_id)}}" ><img src="{{asset('./images/left-arrow.png')}}" alt=""> Back</a>
    </button>
  </div>
         
                       
          <!-- create div -->
          <div class="questions pb-4" >
                <form action="{{route('ques.update',$ques->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ques">
                        <div class="ques-row" style="width: 100%">
                           
                           
                            <input type="text" name="head" placeholder="Question Head" value="{{$ques->head}}" class="head" style="width: 100%">
                            <input type="file" name="headPhoto" style="margin-bottom: 15px;">
                        </div>
                        <div class="options">
                            <div class="ques-row">
                                <div class="smallOP">
                                    <input type="text" name="op1" placeholder="Option1" value="{{$ques->op1}}" @if ($ques->correct == 1) style="border: 2px solid #33BAEA"
                                        
                                    @endif>
                                    <input type="radio" name="ques1" value="1" >
                                </div>
                               
                                <input type="file" name="op1_photo">
            
                            </div>
                            <div class="ques-row">
                                <div class="smallOP">
                                    <input type="text" name="op2" placeholder="Option2" value="{{$ques->op2}}" @if ($ques->correct == 2) style="border: 2px solid #33BAEA"
                                        
                                    @endif>
                                    <input type="radio" name="ques1" value="2" >
            
                                </div>
                               
                                <input type="file" name="op2_photo">
            
                            </div>
                            <div class="ques-row">
                                <div class="smallOP">
                                    <input type="text" name="op3" placeholder="Option3" value="{{$ques->op3}}" @if ($ques->correct == 3) style="border: 2px solid #33BAEA"
                                        
                                    @endif>
                                    <input type="radio" name="ques1" value="3" >
            
                                </div>
                               
                                <input type="file" name="op3_photo" style="justify-self: center;">
            
                            </div>
                            <div class="ques-row">
                                <div class="smallOP">
                                    <input type="text" name="op4" placeholder="Option4" value="{{$ques->op4}}" @if ($ques->correct == 4) style="border: 2px solid #33BAEA"
                                        
                                    @endif>
                                    <input type="radio" name="ques1" value="4" {{ $ques->correct == 4 ? 'checked' : '' }}>
            
                                </div>
                               
                                <input type="file" name="op4_photo">
            
                            </div>
                        </div>
                      
                        <div class="ques-row">
                            <input type="text" name="points" placeholder="Question points" value="{{$ques->points}}">
        
                        </div>
                    </div>
                    <div class="p-3  d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit" style="width: 200px;;">Update</button>
                            
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
<script src="{{asset('./js/create.js')}}"></script>


</body>
</html>