<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EXPIRED_N_FABULOUS
 */
get_header();
global $post;
$cat = get_the_category($post->ID);
if($cat[0]->cat_name !== 'FBTB Breakup Guide'){
?>
    <div class="hero basic single-post" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
        <div class="top-angle"></div>
    </div>
    
    <div class="site-container__wrapper blog single-post">
        <div class="single-post__thumb">
            <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" title="<?php the_title();?>">
        </div>
            <div class="basic-block blog-body single-post">
                <?php
                    while ( have_posts() ):
                        the_post();
                        get_template_part( 'template-parts/content', 'single' );

                            // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                                comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
            </div>
            <div class="basic-block blog-sidebar">
                    <?php get_sidebar();?>
            </div>
        </div>
        <?php
        } elseif(is_user_logged_in() and ($cat[0]->cat_name == 'FBTB Breakup Guide')){?>
            <div class="hero basic single-post" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
                <div class="top-angle"></div>
            </div>

            <div class="site-container__wrapper blog single-post guide">
                <div class="single-post__thumb">
                    <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" title="<?php the_title();?>">
                </div>
                    <div class="basic-block single-post">
                        <?php
                            while ( have_posts() ):
                                the_post();
                                get_template_part( 'template-parts/content', 'guide' );
                                    // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>
                    </div>
                </div>
        <?php } else{?>
        <div class="hero basic guide" style="background-image:url(<?php if(get_field('guideBg')){ the_field('guideBg'); }else{ echo get_template_directory_uri().'/images/guideBg.png';}?>)" >
        <div class="top-angle"></div>
        <div class="hero__cont cnt">
            <?php if(get_field('guideTitle')){?>
            <h1 class="page-title">
                <?php the_field('guideTitle');?>
            </h1>
            <?php } else{?>
                <h1 class="page-title">
                    FBTB Breakup<br>Guide
                </h1>
            <?php } ?>
            
            <?php if(get_field('guideSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('guideSubTit');?>
            </span>
            <?php } else{?>
             <span class="page-subtitle">
                 To the magic of love… keep believing!
             </span>
            <?php } ?>
            <div class="btn-line cnt">
                <a href="javascript:void(0);" class="cst-btn cst-btn__down" data-scroll=".site-container__wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/images/arrow-down.svg" alt="arrow-down" title="arrow-down">
                </a>
            </div>
        </div>
    </div>
    <div class="site-container__wrapper login">
        <div class="basic-block login">
            <div class="caption-cont cnt">
                <h2 class="simple-caption">
                    <span>Login</span>
                </h2>
            </div>
               <?php
                wp_login_form(array(
                'echo'           => true,
                'form_id'        => 'loginform',
                'label_username' => __( '' ),
                'label_password' => __( '' ),
                'label_remember' => __( 'Remember Me' ),
                'label_log_in'   => __( 'LogIn' ),
                'id_username'    => 'user_login',
                'id_password'    => 'user_pass',
                'id_remember'    => 'rememberme',
                'id_submit'      => 'wp-submit',
                'remember'       => true,
                'value_username' => '',    
                'value_remember' => false 
));
            ?>
            <div class="registr-block">
                <div class="cont">
                    <a href="/fbtb-breakup-guide-register/">
                    Register
                </a>
                </div>
            </div>
        </div>
    </div>
<?php    
}
get_footer();
