<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EXPIRED_N_FABULOUS
 */
$shareURL = urlencode(get_permalink());
$shareTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
$shareThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL.'&amp;via=Crunchify';
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
$googleURL = 'https://plus.google.com/share?url='.$shareURL;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="single-post__header">
        <div class="single-post__meta">
            <?php
                the_date('F j, Y');
            ?>
        </div>
        <h1 class="single-post__title">
            <?php the_title();?>
        </h1>
	</header>
	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

	<footer class="single-post-footer">
		<div class="tags-block">
            <span class="caption">
                Tags
            </span>
		    <?php $post_tags = get_the_tags();
                if ( $post_tags ) {
                    foreach( $post_tags as $tag ) {?>
                        <span class="tag__item">
                            <?php echo $tag->name; ?>
                        </span>
            <?php
                    }
            } else{
                    echo 'Post without tags';
                } ?>
		</div>
		<div class="share-block">
		    <span class="caption">
		        Share it:
		    </span>
		    <a class="share-btn" href="<?php echo $facebookURL; ?>"><i class="fab fa-facebook"></i></a>
		    <a class="share-btn" href="<?php echo $twitterURL; ?>"><i class="fab fa-twitter"></i></a>
		    <a class="share-btn" href="<?php echo $googleURL; ?>"><i class="fab fa-google-plus-g"></i></a>
		</div>
		<div class="related-posts">
		    <div class="capt">
		        Related
		    </div>
		    <div class="related-posts__cont">
		        <?php
                    global $post;
                    $categories = get_the_category( $post->ID );
                    $catidlist = $categories->cat_name;
                    foreach( $categories as $category) {
                        $catidlist .= $category->cat_name . "";
                    }
                    $custom_query_args = array( 
                        'posts_per_page' => 3,
                        'post__not_in' => array($post->ID), 
                        'orderby' => 'rand', 
                        'cat' => 3
                    );
                    
                    $custom_query = new WP_Query( $custom_query_args );
                    
                    if($custom_query->have_posts()){
                         while ($custom_query->have_posts()){
                             $custom_query->the_post();
                ?>
                    <div class="related-posts__item">
                        <a href="<?php the_permalink();?>" class="cpt">
                            <?php the_title(); ?>
                        </a>
                        <div class="info">
                            <span class="date">
                                <?php the_time('F j, Y');?>
                            </span>
                            <span class="category">
                                In "<?php echo $catidlist;?>"
                            </span>
                        </div>
                    </div>
                <?php   
                         }
                        wp_reset_postdata();
                    }
                ?>
		    </div>
		</div>
		<div class="post-navi">
		    <div class="post-navi__item prev">
		        <?php if(get_previous_post()!==' '){ $prev_post=get_previous_post(true); echo '<a href="'. get_permalink($prev_post).'"><div class="tit"><img src="'.get_template_directory_uri().'/images/previous-post.svg" alt="prev-post" title="'.esc_html($prev_post->post_title).'">previous post</div><div class="cont">'. esc_html($prev_post->post_title) .'</div></a>'; }else{echo ' ';}?>
		    </div>
		    <div class="post-navi__item next">
		        <?php if(get_next_post()!==' '){ $prev_post=get_next_post(true); echo '<a href="'. get_permalink($prev_post).'"><div class="tit">next post <img src="'.get_template_directory_uri().'/images/next-post.svg" alt="next-post" title="'.esc_html($prev_post->post_title).'"></div><div>'. esc_html($prev_post->post_title) .'</div></a>'; }else{echo ' ';}?>
		    </div>
		</div>
	</footer><!-- .entry-footer -->
</article>