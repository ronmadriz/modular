const navSlide = () => {
  const toggler = document.querySelector('.menus__toggle');
  const nav = document.querySelector('.menus__list');
  const navLinks = document.querySelectorAll('.menus__link');
  
  toggler.addEventListener('click', () => {
    // toggle nav
    nav.classList.toggle('menus__active');
    // animate links
    navLinks.forEach((link, index)=>{
      if(link.style.animation) {
        link.style.animation = '';
      } else {
        link.style.animation = `menuLinkFade 0.5s ease forwards ${index / 7 + .25}s`;
      }
    });
    // toggler animation
    toggler.classList.toggle('toggle');
  });
}
navSlide();
