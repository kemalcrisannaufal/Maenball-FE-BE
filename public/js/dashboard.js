document.addEventListener('DOMContentLoaded', function () {
    let currentNewsIndex = 0;
    const newsItems = document.querySelectorAll('.news-homepage');
    const nextButton = document.querySelector('.next');
    const prevButton = document.querySelector('.prev');

    function showNews(index) {
      newsItems.forEach(news => news.style.display = 'none');
      newsItems[index].style.display = 'block';
    }

    nextButton.addEventListener('click', function() {
      currentNewsIndex = (currentNewsIndex + 1) % newsItems.length;
      showNews(currentNewsIndex);
    });

    prevButton.addEventListener('click', function() {
      currentNewsIndex = (currentNewsIndex - 1 + newsItems.length) % newsItems.length;
      showNews(currentNewsIndex);
    });

    showNews(currentNewsIndex); 
});
