<?php
/*
    Template Name: About-me page
    Template Post Type: post, page, event
 */
get_header();
?>
    <div class="hero basic about-me" style="background-image:url(<?php if(get_field('aboutBg')){ the_field('aboutBg'); }else{ echo get_template_directory_uri().'/images/about-me_bg.png';}?>)" >
        <div class="top-angle"></div>
        <div class="hero__cont cnt">
            <?php if(get_field('aboutTitle')){?>
            <h1 class="page-title">
                <?php the_field('aboutTitle');?>
            </h1>
            <?php }else{ echo '<h1 class="page-title">About me</h1>';}?>
            
            <?php if(get_field('aboutSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('aboutSubTit');?>
            </span>
            <?php }else{ echo '<span class="page-subtitle">Life is so much better with love, laughter, and sparkle</span>';}?>
            <?php if(get_field('linksInst','settings') || get_field('linksFb','settings') || get_field('linksTw','settings') || get_field('linksSnap','settings') || get_field('linksYtu','settings')){?>
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
            <?php } else{ echo ' '; }?>
            <div class="btn-line cnt">
                <a href="javascript:void(0);" class="cst-btn cst-btn__down" data-scroll=".site-container__wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/images/arrow-down.svg" alt="arrow-down" title="arrow-down">
                </a>
            </div>
        </div>
    </div>
    <div class="site-container__wrapper">
        <div class="about-me-section basic-block">
            <img src="<?php if(get_field('aboutImage')){ the_field('aboutImage');}else{ echo get_template_directory_uri().'/images/about-me.png';}?>" class="about-me-section__pic"  alt="faiza rammuny" title="faiza rammuny">
            <div class="about-me-section__text">
                <?php if(get_field('aboutText')){ the_field('aboutText');}else{ echo 'Faiza K.A Rammuny is a thirty three year old writer with not only a FABULOUS sense of fashion, but interesting, unique, and comical understanding of relationships, that she gained by documenting not only her search to find love, but the search of countless other women and men. Writing about the subject, found many turning to Faiza for her insight and two cents on their relationships, which inspired her to quit her job, and focus solely on offering many just that.'; }?>
            </div>
        </div>
        <div class="basic-block testimonials">
            <div class="block-separator">
                <div class="block-separator__cont">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri();?>/images/enf.png" alt="block separator">
                    </div>
                </div>
            </div>
            <div class="caption-cont cnt">
                <h2 class="simple-caption">
                    <span>My TEstimonials</span>
                </h2>
            </div>
            <div class="testimonials-slider">
                <a href="javascript:void(0);" class="slider-control slider-prev">
                    <img src="<?php echo get_template_directory_uri()?>/images/slider_arrow-left.svg" alt="slider arrow icon right">
                </a>
                <a href="javascript:void(0);" class="slider-control slider-next">
                     <img src="<?php echo get_template_directory_uri()?>/images/slider_arrow-right.svg" alt="slider arrow icon right">
                </a>
                <div class="testimonials-slider__cont">
                   <?php if(have_rows('tstSlider')){
                        while( have_rows('tstSlider') ){
                            the_row();
                    ?>
                    <div class="carousel-cell">
                        <div class="slide-header">
                            <i class="<?php the_sub_field('tstSliderIcon');?>"></i>
                        </div>
                        <div class="slide-body">
                           <?php the_sub_field('tstSliderText');?>
                        </div>
                    </div>
                    <?php }
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
                    <span>Thought about</span>
                    <span>Faiza Rammuny</span>
                </h2>
            </div>
            <div class="thought-block">
               <?php if( have_rows('thought','settings') ){
                    $count_thought=0;
                    while ( have_rows('thought','settings') ){
                        the_row();
                        $count_thought++;
                        ?>
                        <div class="thought-block__item">
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
                        if($count_thought==3){
                            break;
                        }
                    }
                }
                ?>
            </div>
            <div class="btn-line cnt">
                <a href="/press-and-media" class="cst-btn">
                    watch more publication
                </a>
            </div>
        </div>
        

    </div>
    
    
    
<?php
get_footer();
