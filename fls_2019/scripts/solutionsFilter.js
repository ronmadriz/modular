// Solutions Filter
var $btns = j('.btn_filter').click(function() {
  if (this.id == 'all') {
    j('#solutions_results > .item').fadeIn(450);
  } else {
    var $el = j('.' + this.id).fadeIn(450);
    j('#solutions_results > .item').not($el).hide();
  }
  $btns.removeClass('active');
  j(this).addClass('active');
})
j(document).scroll(function() {
  if (screen.width > 786) {
    j('.navbar-brand img').css({width: j(this).scrollTop() > 100? "280px":"457.5px"});  
  }
});