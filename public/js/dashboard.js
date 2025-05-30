let btn = document.querySelector('.rejestration-div .toogle');
let opend =document.getElementById('opend');
let count =document.querySelector('.rejestration-div .count');
let inp = document.getElementById('inp');
btn.addEventListener('click',function(){
    let stat= btn.style.justifyContent;
   if(stat === 'flex-end'){
    btn.style.justifyContent ='flex-start';
   }else{
    btn.style.justifyContent ='flex-end';
   }

    let span =btn.querySelector('span');
   
        if(span.style.backgroundColor ==='white'){
            span.style.backgroundColor='black';
            span.style.color='red';
            opend.style.color='red';
            opend.textContent='Closed';
            count.style.border='1px solid red';
            inp.value='close';
        }else{
            span.style.backgroundColor='white';
            span.style.color='#33BAEA';
            count.style.border='1px solid #33BAEA';
            opend.textContent='Opend';
            opend.style.color='#33BAEA';
            inp.value='open';


        }

});