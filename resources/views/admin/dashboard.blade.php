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
         {{-- regitration --}}
         <div class="container mb-3 mt-4 d-flex justify-content-center">

            <div class="rejestration-div d-flex justify-content-center p-3 flex-column">
                <h1 class="text-center pb-3">Registeration</h1>
          <div class="content pt-3">

                    <div class="d-flex justify-content-around">
                        <h3>Registration status: <span id="opend" @if ($rule->status)
                            style="color: #33BAEA">Open</span></h3>     
                            @else
                            style="color: red">Closed</span></h3>     
                        @endif 
                        <form method="POST" action="{{route('rules.updateState')}}">
                            @csrf
                            <button class="toogle" @if ($rule->status)
                                style="justify-content: flex-end"><span style="background-color: white; color:#33BAEA">|</span></button>
                            @else
                            style="justify-content: flex-start"><span style="background-color: black; color:red;">|</span></button>
                            @endif 
                            <input type="text" name="status" id="inp" class="d-none" value="{{$rule->status}}">
                        </form>

                    </div>
                 <div class=" d-flex justify-content-between">
                    <h3>Automatic close at:</h3>
                    <form action="{{route('rules.updateDate')}}" method="POST" id="updateDateForm">
                        @csrf
                        <input type="date" name="deadline" style="width: 111px;
    height: 20px;
    margin-left: 23px;" value="{{$rule->deadline}}" onchange="document.getElementById('updateDateForm').submit();"> 
                    </form>
                   

                </div>
                <div class="d-flex justify-content-around">
                    <a href="{{route('students.names')}}" class="view-btn">View List</a>

                    <div class="count" @if ($rule->status)
                        style=" border:  1px solid #33BAEA;">{{$num}} </div>
                    @else
                    style=" border:  1px solid red;">{{$num}} </div>
                    @endif 
                </div>
            </div>
            </div>
         </div>
            <!-- dashboard -->
             <div class="container mt-4">
                <div class="text-center">
                <a href="{{route('tests.create')}}" class="btn createBtn ">Create new Test</a>
                </div>

                <h2 class="m-3">Your Quizes</h2>

                <div class="testsContainer d-flex  pb-4 flex-wrap">
                    @foreach ($tests as $test)
                    <div class="test  ">
                        <div class="d-flex " style="gap: 8.1px;">
                            <img src="{{$test->icon}}" alt="">
                            <div class="textContent d-flex flex-column">
                                <h3>{{$test->name}} </h3>
                                <div class="d-flex"><img src="{{asset('./images/dateIcon.png')}}" alt="">
                                  <p>{{$test->date}} , {{date('h:i A', strtotime($test->time))}}</p>
                                </div>

                            </div>

                        </div>
                        <div class="links">
                            <a href="{{route('tests.export',$test->id)}}" class="export">Export data to Excel sheet</a>
                            <a href="{{route('ques.create',$test->id)}}">questions</a>
                            <a href="{{route('tests.view',$test->id)}}">view</a>
                            <button onclick="copyToClipboard('{{route('results.index',$test->id)}}')" id="share">share</button>
                            <a href="{{route('tests.edit',$test->id)}}">Edit</a>
                            <form action="{{route('tests.destroy',$test->id)}}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="del" style="border: 2px solid red;">Delete</button>

                            </form>
                        </div>

                    </div>
                    @endforeach
                   



             </div>



         
        </div>



       
    
    
    
    
    
    
    
    
        <script>
            function copyToClipboard(link) {
                // Create a temporary input element to hold the link
                const tempInput = document.createElement('input');
                tempInput.value = link;
        
                // Append it to the body (it's not visible)
                document.body.appendChild(tempInput);
        
                // Select the text in the input element
                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices
        
                // Copy the text to the clipboard
                document.execCommand('copy');
        
                // Remove the temporary input element
                document.body.removeChild(tempInput);
        
                // Optional: Display an alert or a message to indicate the link has been copied
                alert('Link copied to clipboard!');
            }
        </script>
     <script>function confirmDelete() {
        return confirm('Are you sure you want to delete this Question?');
    }
    </script>
    <script src="{{asset('js/dashboard.js')}}"></script>
        <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <!-- Popper.js -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>