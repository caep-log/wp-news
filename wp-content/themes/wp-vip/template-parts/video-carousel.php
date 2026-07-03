<?php
$video_posts = get_posts([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 5,
    'meta_key'       => '_has_video',
    'meta_value'     => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (!empty($video_posts)) :
?>
<section class="video-carousel-section">
    <h3>Watch Now</h3>

    <div class="reels-carousel">
        <button class="reels-carousel__arrow reels-carousel__arrow--left" type="button" aria-label="Previous videos">&lsaquo;</button>

        <div class="reels-carousel__track">
            <?php foreach ($video_posts as $video_post) : ?>

                <?php
                $video_block_markup = '';
                $video_id = 0;

                $video_blocks = parse_blocks($video_post->post_content);

                foreach ($video_blocks as $video_block) {
                    if (($video_block['blockName'] ?? '') !== 'core/video') {
                        continue;
                    }

                    $video_id = (int) ($video_block['attrs']['id'] ?? 0);

                    $video_block_markup = render_block($video_block);

                    // Eliminar controles
                    $video_block_markup = preg_replace(
                        '/\scontrols(?:="controls")?/i',
                        '',
                        $video_block_markup
                    );

                    // Forzar atributos del video
                    $video_block_markup = preg_replace(
                        '/<video\b([^>]*)>/i',
                        '<video$1 autoplay muted loop playsinline preload="metadata">',
                        $video_block_markup
                    );

                    break;
                }

                $video_meta = $video_id ? wp_get_attachment_metadata($video_id) : [];
                $video_duration = $video_meta['length_formatted'] ?? '';
                ?>

                <article class="reel-card">

                    <?php if ($video_block_markup) : ?>

                        <?php echo $video_block_markup; ?>

                    <?php elseif (has_post_thumbnail($video_post->ID)) : ?>

                        <?php echo get_the_post_thumbnail($video_post->ID, 'large', [
                            'loading' => 'lazy'
                        ]); ?>

                    <?php else : ?>

                        <img
                            src="https://placehold.co/400x700"
                            alt="<?php echo esc_attr(get_the_title($video_post)); ?>">

                    <?php endif; ?>

                    <div class="reel-card__overlay">
                        <a href="<?php echo esc_url(get_permalink($video_post)); ?>">
                            <?php echo esc_html(get_the_title($video_post)); ?>
                        </a>
                    </div>

                </article>

            <?php endforeach; ?>
        </div>

        <button class="reels-carousel__arrow reels-carousel__arrow--right" type="button" aria-label="Next videos">&rsaquo;</button>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.reel-card video').forEach(video => {
        video.autoplay = true;
        video.muted = true;
        video.loop = true;
        video.playsInline = true;
        video.controls = false;

        const playVideo = () => {
            const promise = video.play();

            if (promise !== undefined) {
                promise.catch(() => {});
            }
        };

        playVideo();

        video.addEventListener('ended', () => {
            video.currentTime = 0;
            playVideo();
        });
    });
});
</script>

<?php endif; ?>