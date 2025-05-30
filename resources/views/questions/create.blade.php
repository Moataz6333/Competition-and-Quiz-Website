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
<div class="back-row p-3">
    <button  class=" back">
    <a href="{{route('tests.index')}}" ><img src="{{asset('./images/left-arrow.png')}}" alt=""> Back</a>
    </button>
  </div>
                        <div class="p-3 pr-5 d-flex justify-content-end">
              <p>Questions : <span style="color:#33BAEA ; ">{{count($questions)}}</span></p>

                        </div>
          <!-- create div -->
          <div class="questions pb-4" >
                <form action="{{route('ques.store',$test->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ques">
                        <div class="ques-row" style="width: 100%">
                            <span >Question for <span style="color:#33BAEA ; ">{{$test->name}}</span>  </span>
                           
                            <input type="text" name="head" placeholder="Question Head" required class="head" style="width: 100%">
                            <input type="file" name="headPhoto" style="margin-bottom: 15px;">
                        </div>
                        <div class="options">
                            <div class="ques-row">
                                <div class="smallOP">
                                    <input type="text" name="op1" placeholder="Option1">
                                    <input type="radio" name="correct_answear" value="1" >
                                </div>
                               
                                <input type="file" name="op1_photo">
            
                            </div>
                            <div class="ques-row">
                                <div class="smallOP">
                                    <input type="text" name="op2" placeholder="Option2">
                                    <input type="radio" name="correct_answear" value="2" >
            
                                </div>
                               
                                <input type="file" name="op2_photo">
            
                            </div>
                            <div class="ques-row">
                                <div class="smallOP">
                                    <input type="text" name="op3" placeholder="Option3">
                                    <input type="radio" name="correct_answear" value="3" >
            
                                </div>
                               
                                <input type="file" name="op3_photo" style="justify-self: center;">
            
                            </div>
                            <div class="ques-row">
                                <div class="smallOP">
                                    <input type="text" name="op4" placeholder="Option4">
                                    <input type="radio" name="correct_answear" value="4" >
            
                                </div>
                               
                                <input type="file" name="op4_photo">
            
                            </div>
                        </div>
                      
                        <div class="ques-row">
                            <input type="text" name="points" placeholder="Question points" required>
        
                        </div>
                    </div>
                    <div class="p-3  d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit" style="width: 200px;;">Next</button>

                    </div>

                    </form>
          
           
           

            

        </div>
        {{-- question contianer --}}
        <div class="questionContainer p-4 container">

            @foreach ($questions as $ques)
            <hr style="background-color: white">
            <div class="question pt-3 pb-3">
                <div class="d-flex p-3 justify-content-between">
                    <p>{{$i--}}. </p>
                    <p>{{$ques->points}} pts </p>
                </div>
                <div class="row">
                    <div class="col-7">
                                    <h2 class="title ">{{$ques->head}} </h2>
        
                    </div>

                    <div class="QuesImage col-5">
                        <img src="{{$ques->headPhoto}}" alt="">
                    </div>
                    
                </div>

                <!-- answaers -->
               <div class="answers d-flex justify-content-space-between mt-5">
                <!-- ans -->
                <div class="ans d-flex  flex-column" @if ($ques->correct ==1)
                    style="border: 3px solid #33BAEA;"
                    
                @endif>
                    <div class="ans-image">
                        <img src="{{$ques->op1_photo}}" alt="">

                    </div>

                    <div>
                      
                        <label class="form-check-label radioLable" for="ansForQues-1" > {{$ques->op1}} </label>
                          
                    </div>
                  
                             
                    
                </div>
                <!-- ans -->
                <div class="ans d-flex  flex-column" @if ($ques->correct ==2)
                    style="border: 3px solid #33BAEA;"
                    
                @endif>
                    <div class="ans-image">
                        <img src="{{$ques->op2_photo}}" alt="">

                    </div>
                    <div>
                        
                        <label class="form-check-label radioLable" for="ansForQues-1" > {{$ques->op2}} </label>
                          
                    </div>
                  
                             
                    
                </div>
                <!-- ans -->
                <div class="ans d-flex  flex-column" @if ($ques->correct ==3)
                    style="border: 3px solid #33BAEA;"
                    
                @endif>
                    <div class="ans-image">
                        <img src="{{$ques->op3_photo}}" alt="">

                    </div>
                    <div>
                      
                        <label class="form-check-label radioLable" for="ansForQues-1" > {{$ques->op3}} </label>
                          
                    </div>
                  
                             
                    
                </div>
                <!-- ans -->
                <div class="ans d-flex  flex-column" @if ($ques->correct ==4)
                    style="border: 3px solid #33BAEA;"
                    
                @endif>
                    <div class="ans-image">
                        <img src="{{$ques->op4_photo}}" alt="">

                    </div>
                    <div>
                       
                        <label class="form-check-label radioLable" for="ansForQues-1" > {{$ques->op4}} </label>
                          
                    </div>
                  
                             
                    
                </div>

             </div>
                  
                        <div class="d-flex justify-content-between pt-3">
                            <a href="{{route('ques.edit',$ques->id)}}" class="btn btn-primary">Update</a>
                            <form action="{{route('ques.destroy',$ques->id)}}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                </div>

       
                
            @endforeach
           </div>




         </div>

                <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <!-- Popper.js -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('./js/create.js')}}"></script>
    <script>function confirmDelete() {
        return confirm('Are you sure you want to delete this Question?');
    }
    </script>
    </body>
    </html>