const signupPage = document.querySelector('#sign-up');
const signinPage = document.querySelector('#sign-in');

signupPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'sign-up.php';
})
signinPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'sign-in.php';
})


