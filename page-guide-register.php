<?php
/*
    Template Name: Guide page register
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
            $user_id = get_current_user_id();
            $code = get_user_meta( $user_id, 'has_to_be_activated', true );
            if((is_user_logged_in () and $code == '') and (current_user_can ('subscriber') || current_user_can('administrator')) and ($code ==='')){?>
                <div class="caption-cont cnt">
                    <h2 class="simple-caption">
                        <span>Success</span>
                    </h2>
                </div>
                <div class="success-msg">
                    <h3 class="success-msg__cpt">You already logined!</h3>
                    <p>
                        Visit <a href="/fbtb-breakup-guide">fbtb-breakup-guide</a> page for view a guide.
                    </p>
                </div>

            <?php } elseif(is_user_logged_in () and $code !== ''){?>
                   <div class="caption-cont cnt">
                        <h2 class="simple-caption">
                            <span>Login</span>
                        </h2>
                    </div>
                    <span class="cong">You must confirm your email</span>
            <?php } else{?>
                <div class="caption-cont cnt">
                    <h2 class="simple-caption cnt">Register</h2>
                </div>
                <?php echo do_shortcode('[cr_custom_registration]');?>
                <div class="registr-block">
                    <div class="cont">
                        <a href="/fbtb-breakup-guide/#loginform">
                            Login
                        </a>
                    </div>
                </div><?
            } ?>
        </div>
    </div>
<?php
get_footer();