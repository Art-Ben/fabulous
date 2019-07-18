<?php
/*
    Template Name: Guide page reset
    Template Post Type: page ,event
 */

get_header();
?>
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
    <div class="site-container__wrapper guide">
        <div class="basic-block">
           <?php 
                echo do_shortcode('[custom_passreset]');
            ?>
        </div>
    </div>
<?php
get_footer();