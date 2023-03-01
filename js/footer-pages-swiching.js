
const fhomePage = document.querySelector('.home');
const fproblemPage = document.querySelector('.prob');
const fnewsPage = document.querySelector('.news');
const fgalleryPage = document.querySelector('.gallery');
const fcontactPage = document.querySelector('.contact');
const faboutPage = document.querySelector('.about');

//Web page - event listners for footer
fhomePage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'home.php';
})
fproblemPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'problems.php';
})
fnewsPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'news.php';
})
fgalleryPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'gallery.php';
})
fcontactPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'contact.php';
})
faboutPage.addEventListener('click',()=>{
    console.log("coming");
    window.location.href = 'about.php';
})