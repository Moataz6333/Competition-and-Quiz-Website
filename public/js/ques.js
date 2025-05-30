// radio btns
let answers = document.querySelectorAll('.ans');
for(let i=0;i<answers.length;i++){
    answers[i].addEventListener('click',function(){
        let radio = answers[i].querySelector('input[type="radio"]');

        
        if (radio) {
            radio.checked = true;
        }
        unckeck();
        answers[i].style.border='3px solid #33BAEA';
    });
}

function unckeck(){
    for(let i=0;i<answers.length;i++){
        answers[i].style.border='none';

    }
}

// Questions

//hide all
let questions=document.querySelectorAll('.ques');

function hideQuestions(){
    for(let i=0;i<questions.length;i++){
        questions[i].style.display='none';
    }
}
hideQuestions();
let i=1;
let current =document.querySelector(`.ques.ques-${i}`);
current.style.display='block';

//current ques
let quesNumber =document.querySelector('.current');

let next =document.getElementById('next');
let total = document.querySelector('.total');

next.addEventListener('click', function(event) {
    if (i < Number(total.textContent)) {
        // Prevent the form from submitting while navigating questions
        event.preventDefault();
        
        quesNumber.textContent = Number(quesNumber.textContent) + 1;
        load();
        hideQuestions();
        current = document.querySelector(`.ques.ques-${++i}`);
        current.style.display = 'block';
        
        // Check if it's the last question
        if (i == Number(total.textContent)) {
            next.textContent = 'Submit';
        }
    } else {
        next.type='submit';
    }
});
let prev =document.getElementById('prev');
prev.addEventListener('click',function(){
    quesNumber.textContent=Number( quesNumber.textContent)-1;
    load();
    hideQuestions();
     current =document.querySelector(`.ques.ques-${--i}`);
     current.style.display='block';

});

// loading

// console.log(Number(total.textContent) ,currentQues.textContent);
function load(){
    let total =document.querySelector('.total');
    let currentQues =document.querySelector('.current');
    let box =document.getElementById('load');

    let percentage = 100- Number(currentQues.textContent)/Number(total.textContent)*100;
    box.style.right=`${percentage}%`;
}

// time
let time=document.getElementById('time');

 
 let timerInterval;
let timeTaken =document.getElementById('timeTaken');
 // Function to start the timer
 // Get the end time from the hidden input
let endTime = document.getElementById('endTime').value;

// Convert endTime string to a Date object
let endDateTime = new Date(endTime).getTime();

 function startTimer() {
     if (!timerInterval) {
         timerInterval = setInterval(function() {
             // Set the countdown time (in milliseconds) - 30 minutes = 30 * 60 * 1000
                 let t = Number(time.textContent) * 60 * 1000;
            let currentTime = new Date().getTime();

            // Calculate the remaining time in milliseconds
            let countdownTime = endDateTime - currentTime;

             // Convert countdownTime to minutes and seconds
             let minutes = Math.floor((countdownTime % (1000 * 60 * 60)) / (1000 * 60));
             let seconds = Math.floor((countdownTime % (1000 * 60)) / 1000);
             let min = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
             let sec = Math.floor((t % (1000 * 60)) / 1000);

             // Display the result in the element with id="timer"
             document.querySelector('.TimeLeft').innerHTML = minutes + "m " + seconds + "s ";
                timeTaken.value=min + "m " + sec + "s ";
             // If the countdown is over, stop the timer
             if (countdownTime <= 0) {
               
                
                 clearInterval(timerInterval);
                 document.querySelector('.TimeLeft').innerHTML = "Time's up!";
                 next.type = 'submit';
                next.textContent = 'Submit';

                // Submit the form automatically
                next.closest('form').submit();
                 
                 timerInterval = null;
             }

             // Decrease countdownTime by 1 second (1000 milliseconds)
             t -= 1000;
         }, 1000);

     
     }
 }
startTimer();


// submit 
const startTime = new Date().getTime();

// When the form is submitted
document.getElementById('testForm').addEventListener('submit', function() {
    // Calculate the time taken
    const endTime = new Date().getTime();
    const timeTakenInSeconds = Math.floor((endTime - startTime) / 1000);

    // Set the value of the hidden input field
    document.getElementById('timeTaken').value = timeTakenInSeconds;
});


 