<?php
$wp_vip_category_url = static function ($slug) {
    $category = get_category_by_slug(sanitize_title($slug));

    if ($category instanceof WP_Term) {
        return get_category_link($category);
    }

    return home_url('/category/' . sanitize_title($slug) . '/');
};
?>

<footer class="wp-vip-footer">
    <div class="footer-social">
        <a href="/telegram" class="footer-social-link">
            <i class="bi bi-wordpress"></i>
        </a>
        <a href="/facebook" class="footer-social-link">
            <i class="bi bi-facebook"></i>
        </a>
        <a href="/x" class="footer-social-link">
            <i class="bi bi-twitter-x"></i>
        </a>
        <a href="/instagram" class="footer-social-link">
            <i class="bi bi-instagram"></i>
        </a>
        <a href="/linkedin" class="footer-social-link">
            <i class="bi bi-linkedin"></i>
        </a>
        <a href="/youtube" class="footer-social-link">
            <i class="bi bi-youtube"></i>
        </a>
        <a href="/telegram" class="footer-social-link">
            <i class="bi bi-telegram"></i>
        </a>
        <a href="/whatsapp" class="footer-social-link">
            <i class="bi bi-whatsapp"></i>
        </a>
    </div>
    <div class="footer-menu">
        <div>
            <div class="footer-site">
                <h1>
                    <?php bloginfo('name'); ?>
                </h1>
            </div>
            <div class="footer-menu-links">
                <a href="<?php echo esc_url($wp_vip_category_url('world')); ?>" class="footer-menu-link">World</a>
                <a href="<?php echo esc_url($wp_vip_category_url('sports')); ?>" class="footer-menu-link">Sports</a>
                <a href="<?php echo esc_url($wp_vip_category_url('economy')); ?>" class="footer-menu-link">Economy</a>
                <a href="<?php echo esc_url($wp_vip_category_url('technology')); ?>" class="footer-menu-link">Technology</a>
                <a href="<?php echo esc_url($wp_vip_category_url('science')); ?>" class="footer-menu-link">Science</a>
            </div>
            <div class="footer-menu-links">
                <a href="/" class="footer-menu-link">Cookies</a>
                <a href="/" class="footer-menu-link">Terms & Conditions</a>
                <a href="/" class="footer-menu-link">Privacy</a>
                <a href="/" class="footer-menu-link">Copyright</a>
                <a href="/" class="footer-menu-link">Digital Accesibility</a>
                <a href="/" class="footer-menu-link">Site Feedback</a>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p><?php bloginfo('name'); ?></p>
        <p>&copy; All Rights reserved. <?php echo date('Y'); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>