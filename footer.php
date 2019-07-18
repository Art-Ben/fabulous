
    </div>
	<footer class="footer">
            <div class="footer__top" style="background-image:url(<?php if(get_field('footerBg','settings')){the_field('footerBg','settings');}else{ echo get_template_directory_uri().'/images/footer.png';}?>)">
                <div class="bottom-angle"></div>
                <div class="footer-angle"></div>
                <?php if(get_field('linksInst','settings') || get_field('linksFb','settings') || get_field('linksTw','settings') || get_field('linksSnap','settings') || get_field('linksYtu','settings')){?>
                <div class="socialLinks-block">
                   <div class="socialLinks-block__cont">
                       <span class="tit">
                        We are social
                        </span>
                        
                        <ul class="socialLinks-block__list">
                            <?php if(get_field('linksInst','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksInst','settings')?>" class="item"><i class="fab fa-instagram"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                            <?php if(get_field('linksFb','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksFb','settings')?>" class="item"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                            <?php if(get_field('linksTw','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksTw','settings')?>" class="item"><i class="fab fa-twitter"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                            
                            <?php if(get_field('linksSnap','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksSnap','settings')?>" class="item"><i class="fab fa-snapchat-ghost"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                            <?php if(get_field('linksYtu','settings')) {?>
                            <li>
                                <a href="<?php the_field('linksYtu','settings')?>" class="item"><i class="fab fa-youtube"></i></a>
                            </li>
                            <?php }else{echo ' ';} ?>
                            
                        </ul>
                   </div>
                   <?php } else{ echo ' '; }?>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__bottom--cont">
                    <div class="footer-nav">
                       <?php wp_nav_menu(array('container'=>'nav','container_class' => 'nav', 'menu' => 'footer-menu', 'menu_class'=>'nav--list'));?>
                       
<!--
                        <nav class="nav">
                            <ul class="nav--list">
                                <li><a href="javascript:void(0);" class="link">Home</a></li>
                                <li><a href="javascript:void(0);" class="link">blog</a></li>
                                <li><a href="javascript:void(0);" class="link">about me</a></li>
                                <li><a href="javascript:void(0);" class="link">vent session</a></li>
                                <li><a href="javascript:void(0);" class="link">contact</a></li>
                                <li><a href="javascript:void(0);" class="link">privacy</a></li>
                                <li><a href="javascript:void(0);" class="link">disclaimer</a></li>
                                <li><a href="javascript:void(0);" class="link">terms and conditions</a></li>
                                <li><a href="javascript:void(0);" class="link">press</a></li>
                            </ul>
                        </nav>
-->
                    </div>
                    <div class="footer-copy">
                        ©<?php echo date('Y'); ?>, <?php the_field('siteTitle','settings')?>. All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
        <a href="javascript:void(0);" class="toTop">
            <i class="fas fa-chevron-up"></i>
        </a>
        <div class="cst-modal" style="background-image:url(<?php the_field('modalBg','settings');?>);">
            <div class="cst-modal__body">
                <div class="caption">
                    <span class="cpt--item">
                        Get The Broken to
                    </span>
                    <span class="cpt--item">
                        Fabulous Guide
                    </span>
                </div>
                
                <div class="cst-modal__form">
                    <?php echo do_shortcode('[contact-form-7 id="281" title="Modal form"]');?>
                </div>
            </div>
            <div class="top-angle footer"></div>
        </div>
        <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
        <script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
        <script src="<?php echo get_template_directory_uri();?>/lib/bodyScrollLock.js"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/scripts/main.js"></script>
        <?php wp_footer(); ?>
        <div id="fb-root"></div>
        
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        <!-- Calendly link widget begin -->
        <!-- Calendly link widget begin -->
        <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
        <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
        <!-- Calendly link widget end -->
    </body>
</html>
