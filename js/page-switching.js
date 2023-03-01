const navLogo = document.querySelector('#nav-logo');
const homePage = document.querySelector('#home');
const problemPage = document.querySelector('#prob');
const newsPage = document.querySelector('#news');
const galleryPage = document.querySelector('#gallery');
const contactPage = document.querySelector('#contact');
const aboutPage = document.querySelector('#about');


//Web page - event listners for nav-bar
navLogo.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'home.php';
})
homePage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'home.php';
})
problemPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'problems.php';
})
newsPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'news.php';
})
galleryPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'gallery.php';
})
contactPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'contact.php';
})
aboutPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'about.php';
})


