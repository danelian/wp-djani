$(document).ready(function () {

  // ------------------- BURGER MENU ---------------------
  const body = document.querySelector('body'),
        navMenu = document.querySelector('#nav-menu'),
        navOpen = document.querySelector('#nav-open'),
        navClose = document.querySelector('#nav-close'),
        navLinks = document.querySelectorAll('.nav-list>li>a');
  navOpen.addEventListener('click', () => {
    navMenu.classList.add('show');
    body.classList.add('dis-scroll');
  })
  navClose.addEventListener('click', () => {
    navMenu.classList.remove('show');
    body.classList.remove('dis-scroll');
  })
  navLinks.forEach(n => n.addEventListener('click', () => {
    navMenu.classList.remove('show');
    body.classList.remove('dis-scroll');
  }))

});


jQuery(document).ready(function($) {
  var currentPageNews = 1;
  var maxPagesNews = $('#load-more-news').data('max-pages');
  var postsPerPageNews = 3;
  $('#load-more-news').on('click', function() {
    currentPageNews++;
    if (currentPageNews <= maxPagesNews) {
      $.ajax({
        url: ajax_params.url,
        type: 'POST',
        data: {
          action: 'load_more_posts_news',
          page: currentPageNews,
          posts_per_page: postsPerPageNews
        },
        success: function(response) {
          $('.news-block__container').append(response);
          if (currentPageNews === maxPagesNews) {
            $('#load-more-news').hide();
          }
        }
      });
    } else {
      $('#load-more-news').hide();
    }
  });
});

jQuery(document).ready(function($) {
  var currentPageBlog = 1;
  var maxPagesBlog = $('#load-more-blog').data('max-pages');
  var postsPerPageBlog = 3;
  $('#load-more-blog').on('click', function() {
    currentPageBlog++;
    if (currentPageBlog <= maxPagesBlog) {
      $.ajax({
        url: ajax_params.url,
        type: 'POST',
        data: {
          action: 'load_more_posts_blog',
          page: currentPageBlog,
          posts_per_page: postsPerPageBlog
        },
        success: function(response) {
          $('.blog-block__cards').append(response);
          if (currentPageBlog === maxPagesBlog) {
            $('#load-more-blog').hide();
          }
        }
      });
    } else {
      $('#load-more-blog').hide();
    }
  });
});

jQuery(document).ready(function($) {
  var currentPageArticles = 1;
  var maxPagesArticles = $('#load-more-articles').data('max-pages');
  var postsPerPageArticles = 6;
  $('#load-more-articles').on('click', function() {
    currentPageArticles++;
    if (currentPageArticles <= maxPagesArticles) {
      $.ajax({
        url: ajax_params.url,
        type: 'POST',
        data: {
          action: 'load_more_posts_articles',
          page: currentPageArticles,
          posts_per_page: postsPerPageArticles
        },
        success: function(response) {
          $('.articles-block__cards').append(response);
          if (currentPageArticles === maxPagesArticles) {
            $('#load-more-articles').hide();
          }
        }
      });
    } else {
      $('#load-more-articles').hide();
    }
  });
});