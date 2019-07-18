<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EXPIRED_N_FABULOUS
 */

get_header();
?>
    <div class="basic-block error404">
        <div class="error404__cont">
            <div class="img">
                <img src="<?php echo get_template_directory_uri(); ?>/images/404.png" alt="404 error" title="404 error">
            </div>
            <div class="caption">
                oooops!
            </div>
            <div class="subCapt">
                We can't seem to find the page you're looking for
            </div>
            <div class="btn-line cnt">
                <a href="<?php echo get_home_url();?>" class="cst-btn">
                    go home
                </a>
            </div>
        </div>
        <div class="top-angle footer"></div>
    </div>
    <?php get_footer('short');


