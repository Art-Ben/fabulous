<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  
    <?php wp_head();?>
   
    <link rel="shortcut icon" href="<?php if(get_field('siteFavicon','settings')){the_field('siteFavicon','settings');}else{ echo get_template_directory_uri().'/images/enf-ico.ico';}?>" type="image/x-icon">
    <title>
        <?php if(get_field('siteTitle','settings')){the_field('siteTitle','settings');}else{ echo 'Expired n fabulous';}?>
    </title>
	<meta name="description" content="<?php if(get_field('siteDescription','settings')){ the_field('siteDescription','settings');}else{ echo 'KNOW THE ARAB CARRIE BRADSHAW';}?>" />
	
	
	
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style/main.css">
    
</head>

<body <?php body_class(); ?>>
    <div class="headerTopPanel">
        <div class="headerTopPanel__cont">
            <a href="<?php echo get_site_url();?>" class="logo">
               <?php if(get_field('siteLogo','settings')) { ?>
                <img src="<?php the_field('siteLogo','settings');?>" alt="expired n fabulous" title="expired n fabulous">
                <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri();?>/images/Logo.svg" alt="expired n fabulous">
                <?php } ?>
            </a>
            <a href="javascript:void(0);" class="gumb">
                <span class="gumb__item"></span>
                <span class="gumb__item"></span>
                <span class="gumb__item"></span>
            </a>
        </div>
    </div>
    <header class="menu">
        <div class="menu__body">
           <?php wp_nav_menu(array('container'=>'nav','container_class' => 'menu-nav', 'menu' => 'primary-menu', 'menu_class'=>'menu-nav__list'));?>
           
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
            <div class="back-txt"></div>
        </div>
        <div class="top-angle footer"></div>
    </header>
    
   <div class="site-container">