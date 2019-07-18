<?php
/*
    Template Name: Blog page
    Template Post Type: post, page, event
 */
get_header();
?>
    <div class="hero basic" style="background-image:url(<?php if(get_field('blogBg')){ the_field('blogBg'); }else{ echo get_template_directory_uri().'/images/blogBg.png';}?>)" >
        <div class="top-angle"></div>
        <div class="hero__cont cnt">
            <?php if(get_field('blogTitle')){?>
            <h1 class="page-title">
                <?php the_field('blogTitle');?>
            </h1>
            <?php } else{?>
                <h1 class="page-title">
                    Blog
                </h1>
            <?php } ?>
            
            <?php if(get_field('blogSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('blogSubTit');?>
            </span>
            <?php } else{?>
             <span class="page-subtitle">
                 COMING SOON PROJECTS, NEWS & WHAT IS COOKING FRED NOW IN THE KITCHEN
             </span>
            <?php } ?>
                 
        </div>
    </div>
    <div class="site-container__wrapper blog">
        <div class="basic-block blog-body">
            <?php
              $query_blog='cat=3&posts_per_page=4';
              global $query_blog;
              query_posts($query_blog);
		      if ( have_posts() ) {
                while ( have_posts() ){
                    the_post(); 
            ?>
                        <div class="blog-posts__item">
                            <div class="thumb" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>)">
                            </div>
                            
                            <div class="info">
                                <div class="meta-content">
                                    by <span class="author"><?php the_author(); ?></span> | <span class="date"><?php echo get_the_date('F j, Y') ?></span> | <span class="comments"><?php comments_number('0 commetns', '1 comment', '% comments'); ?></span> 
                                </div>
                                <a href="<?php the_permalink(); ?>" class="info__title">
                                   <?php the_title();?>
                                </a>
                                <div class="info__desc">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="info__more">
                                    read more
                                </a>
                            </div>
                        </div>
                <?php
                    }
                  wp_reset_postdata();
                }
                if (  $wp_query->post_count >= 4  ) : ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                    </script>
                    <div class="bnt-line cnt">
                        <a id="true_loadmore" href="javascript:void(0);" class="cst-btn">Load more</a>
                    </div>
                    <?php
                  endif;
            ?>
            
            
        </div>
        <aside class="basic-block blog-sidebar">
            <?php get_sidebar();?>
        </aside>
    </div>
    
    
    
<?php
get_footer();
