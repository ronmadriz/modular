const navSlide = () => {
	const toggler = document.querySelector('.menu__toggle');
	const nav = document.querySelector('.menu__list');
	const navLinks = document.querySelectorAll('.menu__link');
	
	toggler.addEventListener('click', () => {
		// toggle nav
		nav.classList.toggle('menu__active');
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