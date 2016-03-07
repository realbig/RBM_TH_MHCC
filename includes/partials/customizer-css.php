<?php
    require_once __DIR__ . '/../class-phpcolors.php';

    // This class lets us lighten/darken Hex Colors using HSL, just like SASS.

    $background = get_theme_mod( 'mount_hope_background', '#46403c' );
    $background_object = new Mexitek\PHPColors\Color( $background );

    $site_title = get_theme_mod( 'mount_hope_site_title', '#F7F7F7' );
    $site_title_object = new Mexitek\PHPColors\Color( $site_title );

    $header_footer_text = get_theme_mod( 'mount_hope_header_footer_text', '#ffffff' );
    $header_footer_text_object = new Mexitek\PHPColors\Color( $header_footer_text );

    $selected_nav_background = get_theme_mod( 'mount_hope_nav_sel_bg', '#c7a589' );
    $selected_nav_background_object = new Mexitek\PHPColors\Color( $selected_nav_background );

    $selected_nav_text_color = get_theme_mod( 'mount_hope_nav_sel_color', '#46403c' );
    $selected_nav_text_color_object = new Mexitek\PHPColors\Color( $selected_nav_text_color );

    $nav_background = get_theme_mod( 'mount_hope_nav_bg', '#59524c' );
    $nav_background_object = new Mexitek\PHPColors\Color( $nav_background );

    $nav_text_color = get_theme_mod( 'mount_hope_nav_color', '#cdcbc9' );
    $nav_text_color_object = new Mexitek\PHPColors\Color( $nav_text_color );
?>

<style type = "text/css">
    
    #header h1#branding a {
        color: <?php echo $site_title; ?>;
    }
    
    #header h2 {
        color: <?php echo $header_footer_text; ?>;
    }
    
    #page_wrapper_outer, #site_info_wrap {
        background: <?php echo $background; ?>;
    }
    
    #nav > .menu-header > ul > li > a, #nav > .home-button > ul > li > a {
        background-color: <?php echo $nav_background; ?>;
        border-left-color: <?php echo $background; ?>;
        border-right-color: <?php echo $background; ?>;
    }
    
    #site_info_wrap, .location a {
        color: <?php echo $header_footer_text; ?>;
    }
    
    #nav > .menu-header > ul > .current-menu-item > a, #nav > .home-button > ul .current_page_item > a {
        background-color: <?php echo $selected_nav_background; ?>;
        color: <?php echo $selected_nav_text_color; ?>;
    }
    
    #nav > .menu-header > ul > li > a, #nav > .home-button > ul > li > a {
        border-top-color: <?php echo $background; ?>;
    }
    
    body {
        background-color: <?php echo $background; ?>;
    }
    
    #nav > .menu-header > ul > li > a, #nav > .home-button > ul > li > a {
        color: <?php echo $nav_text_color; ?>;
    }
    
    #site_map, #site_map a {
        color: <?php echo $header_footer_text; ?>
    }

</style>