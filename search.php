<?php get_header(); ?>
    <div class="<?php echo vct_get_content_container_class(); ?>">
        <div class="content-wrapper">
            <div class="row">
                <div class="<?php echo vct_get_maincontent_block_class(); ?>">
                    <div class="main-content">
                        <div class="search-results-header">
                            <h4><?php echo sprintf( esc_html__("Search Results for", "visual-composer-starter").' %s', '<strong><cite>'. get_search_query() .'</cite></strong>'); ?></h4>
                        </div>
                        <div class="archive">
                            <?php if ( have_posts() ) : ?>

                                <?php
                                // Start the loop.
                                while ( have_posts() ) : the_post();

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', get_post_format() );

                                    // End the loop.
                                endwhile;

                                ?>
                                <div class="pagination">
                                    <div class="nav-links archive-navigation">
                                        <?php
                                        // Previous/next page navigation.
                                        the_posts_pagination( array(
                                            'screen_reader_text' => '',
                                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'visual-composer-starter' ) . '</span>',
                                        ) );
                                        ?>
                                    </div><!--.nav-links archive-navigation-->
                                </div><!--.pagination-->
                                <?php


                            // If no content, include the "No posts found" template.
                            else :
                                get_template_part( 'template-parts/content', 'none' );

                            endif;

                            ?>

                        </div><!--.archive-->
                    </div><!--.main-content-->
                </div><!--.<?php vct_get_maincontent_block_class(); ?>-->

                <?php if ( vct_get_sidebar_class() ): ?>
                    <?php get_sidebar(); ?>
                <?php endif; ?>

            </div><!--.row-->
        </div><!--.content-wrapper-->
    </div><!--.<?php echo vct_get_content_container_class(); ?>-->
<?php get_footer();
