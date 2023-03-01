const profileBtn = document.querySelector('.profile-btn');

profileBtn.addEventListener('click',()=>{
    console.log("opening Profile.");
    window.location.href = 'sign-in.php';
})