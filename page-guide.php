<?php
/*
    Template Name: Guide page
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
            if((is_user_logged_in () and $code == '') and (current_user_can ('subscriber') || current_user_can('administrator'))){   
              $args = array(
                    'post_type' => 'post',
                    'cat' => 8
              );
              $loop = new WP_Query($args);
		      if ( have_posts() ) {
                while ( $loop->have_posts() ){
                    $loop->the_post();
            ?>
                        <div class="blog-posts__item guide">
                            <div class="thumb" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>)">
                            </div>
                            <div class="info">
                                <a href="<?php the_permalink(); ?>" class="info__title">
                                   <?php the_title();?>
                                </a>
                                <div class="info__desc">
                                    <?php my_excerpt('short'); ?>
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
            } elseif(is_user_logged_in() and $code !== ''){
            ?>
                <div class="caption-cont cnt">
                    <h2 class="simple-caption">
                        <span>Login</span>
                    </h2>
                </div>
                <span class="cong">You must confirm your email</span>
           <?
            }elseif(!is_user_logged_in() and $code == ''){
            ?>
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
                    <a href="/fbtb-breakup-guide-reset/#lostpasswordform">
                        Forgot Password
                    </a>
                    <br>
                    <a href="/fbtb-breakup-guide-register/#registerform">
                        Register
                    </a>
                </div>
            </div>
            <?php }elseif(!is_user_logged_in() and $code !==''){                
                ?>
                <div class="caption-cont cnt">
                    <h2 class="simple-caption">
                        <span>Login</span>
                    </h2>
                </div>
                <span class="cong">You must confirm your email</span>
                <?
            } ?>
        </div>
    </div>
<?php
get_footer();