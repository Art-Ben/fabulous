<?php
/*
    Template Name: Press page
    Template Post Type: post, page, event
 */
get_header();
?>
    <div class="hero basic" style="background-image:url(<?php if(get_field('pressBg')){ the_field('pressBg'); }else{ echo get_template_directory_uri().'/images/about-me_bg.png';}?>)" >
        <div class="top-angle"></div>
        <div class="hero__cont cnt">
            <?php if(get_field('pressTitle')){?>
            <h1 class="page-title">
                <?php the_field('pressTitle');?>
            </h1>
            <?php }else{ echo '<h1 class="page-title">Press & media</h1>';}?>
            
            <?php if(get_field('pressSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('pressSubTit');?>
            </span>
            <?php }else{ echo '<span class="page-subtitle">Life is so much better with love, laughter, and sparkle</span>';}?>
            
            <?php if(have_rows('pressBtns')){?>
            <div class="btn-line">
               <?php while(have_rows('pressBtns')){ the_row();?>
                <a href="<?php if(get_sub_field('link')){the_sub_field('link');}elseif(get_sub_field('file')){the_sub_field('file');}?>" class="cst-btn" <?php if(get_sub_field('file')){echo 'download';}?> >
                    <?php the_sub_field('title');?>
                </a>
                <?php } ?>
            </div>
            <?php } else {echo'<div class="btn-line">
                       <a href="javascript:void(0);" class="cst-btn">
                           Download Media Kit
                       </a>
                       <a href="javascript:void(0);" class="cst-btn">
                           Download Headshots
                       </a>
                    </div>';
            } ?>
            
            <div class="btn-line cnt">
                <a href="javascript:void(0);" class="cst-btn cst-btn__down" data-scroll=".site-container__wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/images/arrow-down.svg" alt="arrow-down" title="arrow-down">
                </a>
            </div>
        </div>
    </div>
    <div class="site-container__wrapper">
        <div class="basic-block video">
            <div class="block-separator">
                <div class="block-separator__cont">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri();?>/images/enf.png" alt="block separator">
                    </div>
                </div>
            </div>
            <div class="caption-cont cnt two-line">
                <h2 class="simple-caption">
                    <span>Video</span>
                    <span>Publication</span>
                </h2>
            </div>
            <div class="video-items">
                <div class="video-items__cont">
                   <?php if( have_rows('video_publication') ){
                    while ( have_rows('video_publication') ){
                        the_row();
                        ?>
                         <div class="carousel-cell">
                            <?php if(get_sub_field('thumb')){?>
                             <div class="thumb" style="background-image:url(<?php the_sub_field('thumb') ?>)"></div>
                            <?php } else { ?>
                            <div class="thumb">
                                <div class="title">Oops, video without thumbnail</div>
                            </div>
                            <?php } ?>
                            
                            <div class="meta-info">
                                <div class="channel">
                                    <i class="<?php the_sub_field('source')?>"></i> from <a href="<?php the_sub_field('chanell')?>"><?php the_sub_field('chanell-txt')?></a>
                                </div>
                                <div class="meta-info__item">
                                    <span><?php the_sub_field('date'); ?></span>|
                                    <span><?php the_sub_field('comments'); ?></span>
                                </div>
                            </div>
                            <a href="<?php the_sub_field('watch-more')?>" class="caption">
                                <?php the_sub_field('title')?>
                            </a>
                            <div class="desc">
                                <?php the_sub_field('desc')?>
                            </div>
                            <div class="btn-line">
                                <a href="<?php the_sub_field('watch-more')?>" class="watch-more">
                                    watch more
                                </a>
                            </div>
                    </div>

                    <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
        <div class="basic-block thought">
            <div class="block-separator">
                <div class="block-separator__cont">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri();?>/images/enf.png" alt="block separator">
                    </div>
                </div>
            </div>
            <div class="caption-cont cnt two-line">
                <h2 class="simple-caption">
                    <span>Press</span>
                    <span>releases</span>
                </h2>
            </div>
            <div class="thought-block">
              <div class="thought-block__cont">
                  <?php if( have_rows('thought','settings') ){
                    while ( have_rows('thought','settings') ){
                        the_row();
                        ?>
                        <div class="thought-block__item carousell-cell">
                            <div class="logo">
                                <img src="<?php the_sub_field('thoughtLogo');?>" alt="press-media logo">
                            </div>
                            <div class="desc">
                                <?php the_sub_field('thoughtDesc');?>
                            </div>
                            <div class="date">
                                <?php the_sub_field('thoughtDate');?>
                            </div>
                            <div class="btn-line cnt">
                                <a href="<?php the_sub_field('thoughtLink');?>" class="read-more">
                                read more
                            </a>
                            </div>

                        </div>

                    <?php
                    }
                }
                ?>
              </div>
            </div>
        </div>
    </div>
<?php
get_footer();
