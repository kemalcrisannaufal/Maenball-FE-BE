document.addEventListener('DOMContentLoaded', function () {
    let currentNewsIndex = 0;
    const newsItems = document.querySelectorAll('.news-homepage');
    const nextButton = document.querySelector('.next');
    const prevButton = document.querySelector('.prev');

    function showNews(index) {
      newsItems.forEach(news => news.style.display = 'none'); // Menyembunyikan semua berita
      newsItems[index].style.display = 'block'; // Menampilkan berita yang aktif
    }

    nextButton.addEventListener('click', function() {
      currentNewsIndex = (currentNewsIndex + 1) % newsItems.length; // Menghitung indeks berita berikutnya secara circular
      showNews(currentNewsIndex);
    });

    prevButton.addEventListener('click', function() {
      currentNewsIndex = (currentNewsIndex - 1 + newsItems.length) % newsItems.length; // Menghitung indeks berita sebelumnya secara circular
      showNews(currentNewsIndex);
    });

    showNews(currentNewsIndex); // Menampilkan berita pertama saat halaman dimuat
});
