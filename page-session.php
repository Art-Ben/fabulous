<?php
/*
    Template Name: Vent Session page
    Template Post Type: page, event
 */
get_header();
?>
    <div class="hero basic" style="background-image:url(<?php if(get_field('ventBg')){ the_field('ventBg'); }else{ echo get_template_directory_uri().'/images/about-me_bg.png';}?>)" >
        <div class="top-angle"></div>
        <div class="hero__cont cnt">
            <?php if(get_field('ventTitle')){?>
            <h1 class="page-title">
                <?php the_field('ventTitle');?>
            </h1>
            <?php }else{ echo '<h1 class="page-title">Vent Session</h1>';}?>
            
            <?php if(get_field('ventSubTit')){?>
            <span class="page-subtitle">
                <?php the_field('ventSubTit');?>
            </span>
            <?php }else{ echo '<span class="page-subtitle">BOOK A VENTSESSION</span>';}?>
             
            <div class="btn-line cnt">
                <a href="javascript:void(0);" class="cst-btn cst-btn__down" data-scroll=".site-container__wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/images/arrow-down.svg" alt="arrow-down" title="arrow-down">
                </a>
            </div>
        </div>
    </div>
    <div class="site-container__wrapper">
        <div class="basic-block vent">
            <div class="block-separator">
                <div class="block-separator__cont">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri();?>/images/enf.png" alt="block separator">
                    </div>
                </div>
            </div>
            <div class="caption-cont cnt">
                <h2 class="simple-caption">
                    <span>BOOK A VENTSESSION</span>
                </h2>
            </div>
            <div class="vent__items">

                <?php if(have_rows('vent_items')){
                        while(have_rows('vent_items')){
                            $even++;
                            the_row(); {?>

                    <div class="item">
                        <div class="thumb" style="background-image:url(<?php the_sub_field('thumb');?>)"></div>
                        <din class="info">
                            <h3 class="caption">
                                <?php the_sub_field('caption');?>
                            </h3>
                            <div class="subCaption">
                                <?php the_sub_field('subCaption')?>
                            </div>
                            <div class="desc">
                                <?php the_sub_field('desc');?>
                            </div>
                            <div class="btn-line">
                                <?php if(have_rows('btns-line')){
                                    while(have_rows('btns-line')){
                                        the_row();
                                ?>
                                <a target="_blank" href="<?php the_sub_field('btn_link')?>" onclick="<?php the_sub_field('btn-event')?>" class="typeform-share cst-btn" data-mode="popup">
                                    <?php the_sub_field('btn-title');?>
                                </a>
<!--                                <a class="typeform-share button" href="https://chamboost.typeform.com/to/jw2KEN" data-mode="popup" style="display:inline-block;text-decoration:none;background-color:#267DDD;color:white;cursor:pointer;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:50px;text-align:center;margin:0;height:50px;padding:0px 33px;border-radius:25px;max-width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:bold;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;" target="_blank">Launch me </a>-->
                                <?php
                                    }
                }
                                ?>
                            </div>
                        </din>
                        
                    </div>
                           <?php            
                    }
                }
}
                ?>
            </div>
            
            <div class="block-separator">
                <div class="block-separator__cont">
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri();?>/images/enf.png" alt="block separator">
                    </div>
                </div>
            </div>
            <div class="caption-cont cnt">
                <h2 class="simple-caption">
                    <span>HOW it works</span>
                </h2>
            </div>
            <div class="vent__advnt">
                <div class="vent__advnt--item">
                    <div class="num">
                        <img src="<?php echo get_template_directory_uri();?>/images/one.png" alt="number 1" title="number 1">
                    </div>
                    <div class="txt">
                        <?php the_field('ventAdvnt-1');?>
                    </div>
                </div>
                <div class="vent__advnt--item">
                    <div class="num">
                        <img src="<?php echo get_template_directory_uri();?>/images/two.png" alt="number 2" title="number 2">
                    </div>
                    <div class="txt">
                        <?php the_field('ventAdvnt-2');?>
                    </div>
                </div>
                <div class="vent__advnt--item">
                    <div class="num">
                        <img src="<?php echo get_template_directory_uri();?>/images/three.png" alt="number 3" title="number 3">
                    </div>
                    <div class="txt">
                        <?php the_field('ventAdvnt-3');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
