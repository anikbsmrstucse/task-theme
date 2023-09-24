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
    $image = wp_get_attachment_url(get_theme_mod('anik_hero_image'));
}

?>
<!-- this is body area for home page -->
<main id="body-area" class="home-page my-4">
    <!-- hero section -->
    <section id="hero-area" class="banner-img container">
        <div class="hero-img">
            <img class="img-fluid rounded" src="<?php echo $image; ?>" alt="">
            <div class="title">
                <h1><?php echo get_theme_mod('hero_text'); ?></h1>
            </div>
        </div>
    </section>
    <section></section>
</main>

<?php get_footer();
