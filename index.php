<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EXPIRED_N_FABULOUS
 */

get_header();
?>
    <div class="hero basic blog" style="background-image:url(<?php if(get_field('blogBg')){ the_field('blogBg'); }else{ echo get_template_directory_uri().'/images/blogBg.png';}?>)" >
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
            <div class="btn-line cnt">
                <a href="javascript:void(0);" class="cst-btn cst-btn__down" data-scroll=".site-container__wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/images/arrow-down.svg" alt="arrow-down" title="arrow-down">
                </a>
            </div>
        </div>
    </div>
    <div class="site-container__wrapper blog">
        <div class="basic-block blog-body" id="ajax-posts">
            <?php
              $posts_on_page=4;    
              $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $posts_on_page,
                    'cat' => 3
              );
              $loop = new WP_Query($args);
		      if ( have_posts() ) {
                while ( $loop->have_posts() ){
                    $loop->the_post(); 
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
            ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            </script>
            <a href="javascript:void(0);" class="cst-btn" id="more_posts">
                Load more
            </a>
            
        </div>
        <aside class="basic-block blog-sidebar">
            <?php get_sidebar();?>
        </aside>
    </div>
    
    
    
<?php
get_footer();