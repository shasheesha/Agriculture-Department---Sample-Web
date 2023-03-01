
const profileProblem = document.querySelector('#prob-dis');
const profileComplain = document.querySelector('#complain-dis');
const profileBenifit = document.querySelector('#ben-offers-dis');

const problemCard = document.querySelector('#problem');
const complainCard = document.querySelector('#complain');
const benifitCard = document.querySelector('#benifit');

//Farmer profile - event listners
profileProblem.addEventListener('click',()=>{
    if(problemCard.classList.contains('disable')){
        problemCard.classList.remove('disable');
        console.log("disable card is visible");
        complainCard.classList.add('disable');
        benifitCard.classList.add('disable');
        console.log("other cards disabled");

        profileProblem.classList.add('select');
        profileComplain.classList.remove('select');
        profileBenifit.classList.remove('select');
        console.log("list changed processed");
    }
})

profileComplain.addEventListener('click',()=>{
    if(complainCard.classList.contains('disable')){
        complainCard.classList.remove('disable');
        console.log("disable card is visible");
        problemCard.classList.add('disable');
        benifitCard.classList.add('disable');
        console.log("other cards disabled");

        profileComplain.classList.add('select');
        profileProblem.classList.remove('select');
        profileBenifit.classList.remove('select');
        console.log("list changed processed");
    }
})

profileBenifit.addEventListener('click',()=>{
    if(benifitCard.classList.contains('disable')){
        benifitCard.classList.remove('disable');
        console.log("disable card is visible");
        complainCard.classList.add('disable');
        problemCard.classList.add('disable');
        console.log("other cards disabled");

        profileBenifit.classList.add('select');
        profileComplain.classList.remove('select');
        profileProblem.classList.remove('select');
        console.log("list changed processed");
    }
})