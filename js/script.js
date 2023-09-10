// hamburger menu start
const menu = document.getElementById('menu');
const navigasi = document.querySelector('.navigasi-navbar');

menu.addEventListener('click', function(){
    navigasi.classList.toggle('active');
})
// hamburger menu end