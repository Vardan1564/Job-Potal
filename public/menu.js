// JavaScript for responsive menu toggle

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const nav = document.querySelector('.nav');

    if (!menuToggle || !nav) {
        console.warn('Menu toggle or nav element not found');
        return;
    }

    menuToggle.addEventListener('click', function() {
        nav.classList.toggle('nav-open');
    });
});
