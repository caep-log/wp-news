// more links menu
const moreMenuButton = document.querySelector('.dropdown button');
const moreMenuContainer = document.querySelector('.wp-vip-header-menu-links__links__more');

if (moreMenuButton && moreMenuContainer) {
    moreMenuButton.addEventListener('click', () => {
        moreMenuContainer.classList.toggle('show');
    });
}

// mobile menu toogle
const menuMobileButton = document.querySelector('.wp-vip-header-menu-toggle');
const menuMobileContainer = document.querySelector('.wp-vip-header-menu-links');
const headerContainer = document.querySelector('.wp-vip-header');

if (menuMobileButton && menuMobileContainer) {
    menuMobileButton.addEventListener('click', () => {
        menuMobileContainer.classList.toggle('show');
    });
}

const smallLogoSiteTitle = document.querySelector('.small-logo-site-title');

const syncHeaderScrollState = () => {
    if (!headerContainer) {
        return;
    }

    const isScrolled = window.scrollY > 0;

    headerContainer.classList.toggle('scroll', isScrolled);

    if (smallLogoSiteTitle) {
        smallLogoSiteTitle.classList.toggle('scroll', isScrolled);
    }
};

syncHeaderScrollState();
window.addEventListener('scroll', syncHeaderScrollState, { passive: true });
