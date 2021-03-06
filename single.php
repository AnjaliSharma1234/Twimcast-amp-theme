<?php get_header();
$dir_path = get_template_directory_uri();
$featured_image = get_the_post_thumbnail_url();
// print_r($featured_image);
$image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
$width = $image_array[1];
$height = $image_array[2];
if ((empty($featured_image))) {
    $featured_image = getRandomImageForPost();
    $width = 1;
    $height = 1;
}
?>

<style scoped>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 600;
        font-family: 'Open sans', sans-serif !important;
        line-height: 1.5;
        margin: 10px 0
    }

    h1 {
        font-weight: 700;
        font-size: 32px;
    }

    h2 {
        font-size: 30px;
    }

    h3 {
        font-weight: 500;
        font-size: 27px;
        margin-top: 16px
    }

    h4 {
        font-size: 24px;
        font-weight: 400;
    }

    h5 {
        font-size: 20px;
        font-weight: 400;
        color: #7f7f7f;
    }

    h6 {
        font-size: 18px;
        font-weight: 400;
        color: #7f7f7f;
    }

    .podcast-player-cover {
        margin-top: 20px;
    }

    .podcast-player-cover amp-audio {
        width: 100%;
    }
</style>

<main id="site-content" role="main">
    <section id="twimcast-sidebar">
        <div class="twimcast-sidebar-container">
            <?php get_template_part('templates/twimcast', 'sidebar'); ?>
        </div>
    </section>
    <section class="postArea" id="postTest">
        <div class="postArea-container">
            <div id="main-post-area" class="post-div">
                <div class="post-container">
                    <!--                    <div class="post-image">-->
                    <!--                        <amp-img src='--><?php //echo $featured_image; 
                                                                    ?>
                    <!--' height="--><?php //echo $height; 
                                        ?>
                    <!--" width="--><?php //echo $width; 
                                    ?>
                    <!--" layout="responsive" alt="a sample image"></amp-img>-->
                    <!--                    </div>-->
                    <?php if (is_single()) {
                                                                        $audio_url = get_field('audio_upload')['url'];
                                                                        if (!(empty($audio_url))) {
                    ?>
                            <div class="podcast-player-cover show-mobile">
                                <amp-audio width="auto" height="40" src="<?php echo $audio_url; ?>" controlslist="nodownload">
                                    <div fallback>Your browser doesn’t support HTML5 audio</div>
                                </amp-audio>
                            </div>
                    <?php }
                                                                    } ?>

                    <div class="post-title">
                        <h3>
                            <!-- post content -->
                            <?php the_title(); ?>
                        </h3>
                    </div>
                    <div class="post-excerpt" hidden>
                        <p><?php echo the_excerpt(); ?></p>
                    </div>
                    <div class="entry-content">
                        <?php
                                                                    echo get_post_field('post_content', get_the_ID());
                        ?>
                    </div>
                </div>
            </div>
            <?php get_template_part('templates/twimcast', 'right') ?>
        </div>
    </section>
</main><!-- #site-content -->

<?php
                                                                    get_footer();
