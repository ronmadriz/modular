var timer;

function openSubmenu() {
  j(".menus__solutions").addClass("show");
}
function closeSubmenu() {
  j(".menus__solutions").removeClass("show");
}

j("#menus__item--1").on("mouseover", function() {
  clearTimeout(timer);
  openSubmenu();
}).on("mouseleave", function() {
  timer = setTimeout(
    closeSubmenu
  , 1000);
});