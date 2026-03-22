function scrollCarousel(direction) {
    // Mengambil elemen yang memiliki scrollbar horizontal
    const container = document.getElementById('ekskul-scroll-element');
    
    if (container) {
        const cardWidth = 345; // Lebar kartu 325px + gap 20px
        container.scrollBy({
            left: direction * cardWidth,
            behavior: 'smooth'
        });
    } else {
        console.error("Elemen scroll tidak ditemukan! Pastikan ID sudah benar.");
    }
}