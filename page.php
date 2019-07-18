<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EXPIRED_N_FABULOUS
 */

get_header();
?>

	<div class="hero basic" style="background-image:url(<?php if(get_field('pageBg')){ the_field('pageBg'); }else{ echo '';}?>)" >
        <div class="top-angle"></div>
        <div class="hero__cont cnt">
            <?php if(get_field('pageTitle')){?>
            <h1 class="page-title">
                <?php the_field('pageTitle');?>
            </h1>
            <?php } else{ echo '';}?>
            
            <?php if(get_field('pageSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('pageSubTit');?>
            </span>
            <?php } else{ echo ' '; } ?>
            
            <?php if(get_field('socialLink')){
                if(get_field('linksInst','settings') || get_field('linksFb','settings') || get_field('linksTw','settings') || get_field('linksSnap','settings') || get_field('linksYtu','settings')){?>
                <ul class="socialLinks-block__list">
                    <?php if(get_field('linksInst','settings')) {?>
                        <li>
                            <a href="<?php the_field('linksInst','settings');?>" class="item"><i class="fab fa-instagram"></i></a>
                        </li>
                    <?php }else{echo ' ';} ?>

                    <?php if(get_field('linksFb','settings')) {?>
                        <li>
                            <a href="<?php the_field('linksFb','settings');?>" class="item"><i class="fab fa-facebook-f"></i></a>
                        </li>
                     <?php }else{echo ' ';} ?>

                    <?php if(get_field('linksTw','settings')) {?>
                        <li>
                            <a href="<?php the_field('linksTw','settings');?>" class="item"><i class="fab fa-twitter"></i></a>
                        </li>
                    <?php }else{echo ' ';} ?>


                    <?php if(get_field('linksSnap','settings')) {?>
                        <li>
                            <a href="<?php the_field('linksSnap','settings');?>" class="item"><i class="fab fa-snapchat-ghost"></i></a>
                        </li>
                    <?php }else{echo ' ';} ?>

                    <?php if(get_field('linksYtu','settings')) {?>
                        <li>
                            <a href="<?php the_field('linksYtu','settings');?>" class="item"><i class="fab fa-youtube"></i></a>
                        </li>
                    <?php }else{echo ' ';} ?>
                </ul>
                <?php } else{ echo ' '; } } else{ echo '';}?>
                
                <?php if(have_rows('pageBtns')){?>
                <div class="btn-line">
                   <?php while(have_rows('pageBtns')){ the_row();?>
                    <a href="<?php if(get_sub_field('link')){the_sub_field('link');}elseif(get_sub_field('file')){the_sub_field('file');}?>" class="cst-btn" <?php if(get_sub_field('file')){echo 'download';}?> >
                        <?php the_sub_field('title');?>
                    </a>
                    <?php } ?>
                </div>
                <?php } else {echo '';} ?>
                
                <?php if(get_field('scroll-btn')){?>
            
                    <div class="btn-line cnt">
                        <a href="javascript:void(0);" class="cst-btn cst-btn__down" data-scroll=".site-container__wrapper">
                            <img src="<?php echo get_template_directory_uri();?>/images/arrow-down.svg" alt="arrow-down" title="arrow-down">
                        </a>
                    </div>
                <?php } else {echo '';}?>
        </div>
    </div>
    <div class="site-container__wrapper">
        <div class="basic-block single-page">
            <?php if(get_field('pageContent')){ the_field('pageContent'); } else { echo '<h3>Sorry, this page without content</h3>';}?>
        </div>
    </div>

<?php
get_footer();
