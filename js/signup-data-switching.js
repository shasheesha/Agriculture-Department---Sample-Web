//signup form buttons
const page1btn = document.querySelector('#page1btn');
const page2btn = document.querySelector('#page2btn');
const page3btn = document.querySelector('#page3btn');
//signup form navigated screens
const page1 = document.querySelector('#page1');
const page2 = document.querySelector('#page2');
const page3 = document.querySelector('#page3');


//signup form - event listner
page1btn.addEventListener('click',()=>{
    page1.classList.add("disable");
    page2.classList.remove("disable");
    page3.classList.add("disable");
})
page2btn.addEventListener('click',() =>{
    page1.classList.add("disable");
    page2.classList.add("disable");
    page3.classList.remove("disable");
})