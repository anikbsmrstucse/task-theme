<?php

/**
 * This page display home page dynamically
 * **/
get_header();
?>

<!-- this functionality using for store hero image -->
<?php
$image = esc_url('https://unsplash.com/photos/NhshpPh-gDc/download?ixid=M3wxMjA3fDB8MXx0b3BpY3x8NnNNVmpUTFNrZVF8fHx8fDJ8fDE2OTU1NTM2MjN8&force=true&w=1920');

if (get_theme_mod('anik_hero_image', '') != '') {
    $image1 = wp_get_attachment_url(get_theme_mod('anik_hero_image'));
}

?>
<!-- this is body area for home page -->
<main id="body-area" class="home-page my-4">
    <!-- hero section -->
    <section id="hero-area" class="banner-img">
        <div class="hero-img">
            <div class="owl-carousel owl-theme">
                <div>
                    <img class="img-fluid rounded" src="<?php echo $image1; ?>" alt="">
                    <div class="title">
                        <h1><?php echo get_theme_mod('hero_text'); ?></h1>
                    </div>
                </div>
                <div>
                    <img class="img-fluid rounded" src="<?php echo $image1; ?>" alt="">
                    <div class="title">
                        <h1><?php echo get_theme_mod('hero_text'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- this area using for showing custom post-->
    <section class="post-area container my-5">
        <div class="post-heading">
            <h3><?php echo get_theme_mod('custom_header'); ?></h3>
            <!-- post card details -->
            <div class="row row-cols-1 row-cols-md-3 g-4 my-3">
                <?php query_posts('post_type=custom_post&post_status=publish&post_per_page=6&order=ASC&paged=' . get_query_var('post'));

                if (have_posts()) :
                    while (have_posts()) : the_post();
                ?>
                        <div class="col">
                            <div class="card">
                                <!-- this function use for image error handling and displaying image -->
                                <?php
                                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'custom_post');

                                if ($image_url) {
                                    echo '<img alt="..." class="card-img-top" src="' . esc_url($image_url) . '">';
                                } else {
                                    echo 'Image not found.';
                                }
                                ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <?php //else : 
                    ?>
                    <!-- <p><?php echo esc_html__('No Post Found', 'tasktheme'); ?></p> -->
                <?php
                endif;
                ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-danger" href="<?php print home_url(); ?>/custom_post"><?php echo get_theme_mod('button_text') ?></a>
                </div>
            </div>
        </div>
    </section>
</main>



<?php get_footer();
