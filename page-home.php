<?php
/*
    Template Name: Home page
    Template Post Type: post, page, event
 */
get_header();
?>
    <div class="hero primary">
        <div class="top-angle"></div>
        <img class="faiza-img" src="<?php echo get_template_directory_uri();?>/images/primary.png" alt="faiza ramunny" title="faiza-ramunny">
        <div class="hero__cont lf">
            <?php if(get_field('homeTitle')){?>
            <h1 class="page-title">
                <?php the_field('homeTitle');?>
            </h1>
            <?php }else{ echo '<h1 class="page-title">faiza-ramunny</h1>';}?>
            
            <?php if(get_field('homeSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('homeSubTit');?>
            </span>
            <?php }else{ echo '<span class="page-subtitle">know the arab carrie bradshaw</span>';}?>
            
            <?php if(have_rows('homeBtns')){?>
            <div class="btn-line">
               <?php while(have_rows('homeBtns')){ the_row();?>
                <a href="<?php the_sub_field('link');?>" class="cst-btn <?php if(get_sub_field('isModal')){ echo 'open-modal'; } else{ echo ''; }?>">
                    <?php the_sub_field('title');?>
                </a>
                <?php } ?>
            </div>
            <?php } else {echo'<div class="btn-line">
                       <a href="javascript:void(0);" class="cst-btn">
                           get the Broken to Fabulous Guide
                       </a>
                       <a href="javascript:void(0);" class="cst-btn">
                           Book Vent Session
                       </a>
                    </div>';
            } ?>     
        </div>
    </div>
    <div class="site-container__wrapper">
        <div class="about basic-block">
            <div class="about-info">
                <div class="caption-cont lf">
                    <h2 class="simple-caption">
                        About me
                    </h2>
                </div>
                <div class="about-info__block">
                    <span class="about-info__tit">
                        <?php if(get_field('homeAboutQuot')){ the_field('homeAboutQuot');}else{ echo '"Life is so much better with love, laughter, and sparkle."';}?>
                    </span>
                    <?php if(get_field('homeAboutText')){ the_field('homeAboutText');}else{ echo 'Faiza K.A Rammuny is a thirty three year old writer with not only a FABULOUS sense of fashion, but interesting, unique, and comical understanding of relationships, that she gained by documenting not only her search to find love, but the search of countless other women and men. Writing about the subject, found many turning to Faiza for her insight and two cents on their relationships, which inspired her to quit her job, and focus solely on offering many just that.';}?>

                    <div class="btn-line">
                        <a href="<?php the_field('homeAboutLink')?>" class="cst-btn">
                            <?php the_field('homeAboutLinkText')?>
                        </a>    
                    </div>  
                </div>

            </div>
            <img src="<?php if(get_field('homeAboutImage')){ the_field('homeAboutImage');}else{ echo get_template_directory_uri().'/images/about.png';}?>" class="about-me__thumb"  alt="faiza rammuny" title="faiza rammuny">
        </div>
        <div class="basic-block blog-posts">
            <div class="block-separator">
                <div class="block-separator__cont">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri();?>/images/enf.png" alt="block separator">
                    </div>
                </div>
            </div>
            <div class="caption-cont cnt two-line">
                <h2 class="simple-caption">
                    <span>Recent</span>
                    <span>Blog posts</span>
                </h2>
            </div>
            <?php
            $cnt=0;
              global $query_string;
              query_posts( $query_string.'posts_per_page=3&cat=-8');
		      if ( have_posts() ) {
                while ( have_posts() ){
                    $cnt++;
                    the_post();
                    if(($cnt % 2)==0){?>
                        <div class="blog-posts__item">
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
                            <div class="thumb rht" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>)">
                            </div>
                        </div>
                    <?php } else { ?>
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
                    }
              }
            wp_reset_query();
            ?>
        </div>
        <div class="basic-block insta">
            <div class="block-separator">
                <div class="block-separator__cont">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri();?>/images/enf.png" alt="enf">
                    </div>
                </div>
            </div>
            <div class="caption-cont cnt two-line">
                <h2 class="simple-caption">
                    <span>Instagram</span>
                    <span>Media</span>
                </h2>
            </div>
            <div class="insta-cont">
                <?php echo do_shortcode( '[elfsight_instagram_testimonials id="1"]' );?>
            </div>
            
        </div>
    </div>
    
    
    
<?php
get_footer();
