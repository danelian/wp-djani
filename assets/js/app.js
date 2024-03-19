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
  var currentPage = 1;
  var maxPages = $('#load-more-blog').data('max-pages');
  var postsPerPage = 3;
  $('#load-more-blog').on('click', function() {
    currentPage++;
    if (currentPage <= maxPages) {
      $.ajax({
        url: ajax_params.url,
        type: 'POST',
        data: {
          action: 'load_more_posts',
          page: currentPage,
          posts_per_page: postsPerPage
        },
        success: function(response) {
          $('.blog-block__cards').append(response);
          if (currentPage === maxPages) {
            $('#load-more-blog').hide();
          }
        }
      });
    } else {
      $('#load-more-blog').hide();
    }
  });
});