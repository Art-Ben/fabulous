<?php
/*
    Template Name: About-me page
    Template Post Type: post, page, event
 */
get_header();
?>
    <div class="hero basic about-me" style="background-image:url(<?php if(get_field('aboutBg')){ the_field('aboutBg'); }else{ echo get_template_directory_uri().'/images/faiza-ramunny.png';}?>)" >
        <div class="top-angle"></div>
        <div class="hero__cont lf">
            <?php if(get_field('aboutTitle')){?>
            <h1 class="page-title">
                <?php the_field('aboutTitle');?>
            </h1>
            <?php }else{ echo '<h1 class="page-title">faiza-ramunny</h1>';}?>
            
            <?php if(get_field('aboutSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('aboutSubTit');?>
            </span>
            <?php }else{ echo '<span class="page-subtitle">know the arab carrie bradshaw</span>';}?>
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
        </div>
    </div>
    <div class="site-container__wrapper">
        <div class="about-me basic-block">
            <img src="<?php if(get_field('aboutImage')){ the_field('abouttImage');}else{ echo get_template_directory_uri().'/images/about-me.png';}?>" class="about-me__thumb"  alt="faiza rammuny" title="faiza rammuny">
        </div>
        <div class="basic-block blog-posts">
            <div class="block-separator">
                <div class="block-separator__cont">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri();?>/images/enf.png" alt="block separator">
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    
    
<?php
get_footer();
