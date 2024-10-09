/*!
 * Start Bootstrap - Personal v1.0.1 (https://startbootstrap.com/template-overviews/personal)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-personal/blob/master/LICENSE)
 */
// This file is intentionally blank
// Use this file to add JavaScript to your project
const scrollContainer = document.getElementById("scrollContainer");

// Duplikasi isi kontainer untuk menciptakan efek infinite
function duplicateContent() {
    const items = scrollContainer.innerHTML;
    scrollContainer.innerHTML += items;
}

// Panggil fungsi untuk menduplikasi konten
duplicateContent();

// Animasi scroll
let position = 0;
function animateScroll() {
    position -= 1; // Kecepatan scroll
    scrollContainer.style.transform = `translateX(${position}px)`;

    // Jika posisi telah mencapai setengah dari lebar konten, reset kembali ke awal
    if (Math.abs(position) >= scrollContainer.scrollWidth / 2) {
        position = 0;
    }

    requestAnimationFrame(animateScroll);
}

// Mulai animasi
animateScroll();
