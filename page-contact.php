<?php
/*
    Template Name: Contact page
    Template Post Type: post, page, event
 */
get_header();
?>
    <div class="hero basic" style="background-image:url(<?php if(get_field('contactBg')){ the_field('contactBg'); }else{ echo get_template_directory_uri().'/images/contact-bg.png';}?>)" >
        <div class="top-angle"></div>
        <div class="hero__cont cnt">
            <?php if(get_field('contactTitle')){?>
            <h1 class="page-title">
                <?php the_field('contactTitle');?>
            </h1>
            <?php }else{ echo '<h1 class="page-title">Contact</h1>';}?>
            
            <?php if(get_field('contactSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('contactSubTit');?>
            </span>
            <?php }else{ echo '<span class="page-subtitle">CONNECT WITH FAIZA</span>';}?>
            
            <div class="btn-line cnt">
                <a href="javascript:void(0);" class="cst-btn cst-btn__down" data-scroll=".site-container__wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/images/arrow-down.svg" alt="arrow-down" title="arrow-down">
                </a>
            </div>
        </div>
    </div>
    <div class="site-container__wrapper">
        <div class="basic-block contact">
            <div class="caption-cont cnt two-line">
                <h2 class="simple-caption">
                    <span>Stay</span>
                    <span>in touch</span>
                </h2>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="226" title="Stay in touch (form in contact page)"]')?>
        </div>
    </div>
    
<?php
get_footer();
