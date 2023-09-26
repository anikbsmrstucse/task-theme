<?php

/** this page displaying all custom post **/

get_header();
?>

<!-- this area using for showing custom post-->
<section class="post-area container my-3">
    <div class="custom-title">
        <h4><?php wp_title() ?></h4>
        <!-- post card details -->
        <div class="row row-cols-1 row-cols-md-4 g-4 my-2">
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
    </div>
</section>

<?php get_footer();
