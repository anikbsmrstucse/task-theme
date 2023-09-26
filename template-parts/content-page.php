<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themetask
 */

?>
 <!-- this is using for displaying single post details only -->
 <div id="post-<?php the_ID(); ?>" class="blog-details-full">
        <h4 class="mt-3"><?php wp_title() ?></h4>
        <article class="single-blog-details my-5">
            <div class="card shadow border-danger">
                <!-- blog Content -->
                <div class="blog-content mt-3">

                    <!-- blog thumb -->
                    <div class="blog-thumb px-3">
                        <?php the_post_thumbnail('post-thumbnails'); ?>
                    </div>
                    <!-- Blog details -->
                    <div class="blog-details card-body">
                        <div>
                            <h3 class="text-decoration-none"><a href="#"><?php the_title(); ?></a></h3>
                            <!-- Meta Info -->
                            <div class="meta-info d-flex flex-wrap align-items-center">
                                <ul>
                                    <li class="d-inline-block">Posted By <span><i class="fa-solid fa-user"></i></span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php the_author(); ?></a>
                                    </li>
                                    <li class="d-none d-md-inline-block ps-2"> <span><i class="fa-regular fa-calendar-days"></i></span> <a href="#"><?php echo get_the_date('j M Y'); ?></a></li>
                                    <li class="d-inline-block p-2"><span><i class="fa-solid fa-comment"></i></span> <a href="#comment-body"><?php comments_number() ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="card-text"><?php the_content(); ?></p>
                    </div>

                </div>
            </div>

            <div class="page-nav">
                <?php
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'space'),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div>
            <div id="comment-body" class="comment-area mt-5">
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>

        </article>

    </div>
