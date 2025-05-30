let date= document.querySelector('#willStart span');

const targetDate = new Date(date.textContent).getTime();
// const targetDate = new Date('September 16, 2024 06:33:00').getTime();

// Update the countdown every 1 second
const countdownInterval = setInterval(() => {
    // Get the current date and time
    const now = new Date().getTime();

    // Find the distance between now and the target date
    const distance = targetDate - now;

    // Time calculations for days, hours, minutes and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="countdown"
    document.querySelector('#willStart span').innerHTML = 
        days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

    // If the countdown is finished, write some text
    if (distance < 0) {
        clearInterval(countdownInterval);
        document.querySelector('#willStart').innerHTML = "Started";
        document.getElementById('start').disabled=false;
    }
}, 1000);