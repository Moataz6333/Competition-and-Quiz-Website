/*

let addBtn =document.getElementById('addQues');
let questions=document.querySelector('.questions');
let i=3;
addBtn.addEventListener('click',function(){
    let htmlString = `
         
                            <div class="ques-row">
                                <span >${i}.</span>
                                <input type="text" name="number" value="${i}" style="display: none">

                                <input type="text" name="ques${i}_head" placeholder="Question Head" required class="head">
                                <input type="file" name="ques${i}_headPhoto" style="margin-bottom: 15px;">
                            </div>
                            <div class="ques-row">
                                <div>
                                    <input type="text" name="ques${i}-op1 option" placeholder="Option1">
                                    <input type="radio" name="ques${i}" value="1" >
                                </div>
                               
                                <input type="file" name="ques${i}-photo1">

                            </div>
                            <div class="ques-row">
                                <div>
                                    <input type="text" name="ques${i}-op2 option" placeholder="Option2">
                                    <input type="radio" name="ques${i}" value="2" >

                                </div>
                               
                                <input type="file" name="ques${i}-photo2">

                            </div>
                            <div class="ques-row">
                                <div>
                                    <input type="text" name="ques${i}-op3 option" placeholder="Option3">
                                    <input type="radio" name="ques${i}" value="3" >

                                </div>
                               
                                <input type="file" name="ques${i}-photo3" style="justify-self: center;">

                            </div>
                            <div class="ques-row">
                                <div>
                                    <input type="text" name="ques${i}-op4 option" placeholder="Option4">
                                    <input type="radio" name="ques${i}" value="4" >

                                </div>
                               
                                <input type="file" name="ques${i}-photo4">

                            </div>
                            <div class="ques-row">
                                <input type="text" name="ques${i++}-points" placeholder="Question points" required>

                            </div>
                       
    
    ` ;
    let newDiv = document.createElement('div');
    newDiv.classList.add('ques');
    newDiv.innerHTML = htmlString;
    // console.log(newDiv);
    questions.appendChild(newDiv);
    border();
});

*/
// radio
function border(){
    const radioButtons = document.querySelectorAll('input[type="radio"]');

    radioButtons.forEach(radio => {
        
        radio.addEventListener('click', () => {
            // console.log(radio.parentElement.parentElement.parentElement);
            let parentQues=radio.parentElement.parentElement.parentElement;
            let textInputs = parentQues.querySelectorAll('input[type="text"]');
    
            // Remove blue border from all text inputs
            textInputs.forEach(input => {
                input.style.border = ''; // Reset border
            });
    
            // Add blue border to the corresponding text input
            const textInput = radio.parentElement.querySelector('input[type="text"]');
            if (textInput) {
                textInput.style.border = '2px solid #33BAEA';
            }
        });
    });
    
}
border();
