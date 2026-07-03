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
        syncHeaderOffset();
    });
}

const syncHeaderOffset = () => {
    if (!headerContainer) {
        return;
    }

    document.documentElement.style.setProperty(
        '--wp-vip-header-offset',
        `${headerContainer.offsetHeight}px`
    );
};

const syncHeaderScrollState = () => {
    if (!headerContainer) {
        return;
    }

    const isScrolled = window.scrollY > 0;

    headerContainer.classList.toggle('scroll', isScrolled);
    syncHeaderOffset();
};

syncHeaderOffset();
syncHeaderScrollState();
window.addEventListener('scroll', syncHeaderScrollState, { passive: true });
window.addEventListener('resize', syncHeaderOffset);
