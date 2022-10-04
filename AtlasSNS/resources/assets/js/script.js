$(function () {
  $('.nav-open').click(function () {
    $(this).toggleClass('active');
    $(this).next('nav').slideToggle();
  })
})
