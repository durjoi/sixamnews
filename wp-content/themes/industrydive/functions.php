<?php 

function industrydive_css_js_file_include() {
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', [], '5.1.3');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style( 'style', get_stylesheet_uri());

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', [], '5.1.3', 'true');
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', [], '1.0.0', 'true');

    wp_localize_script( 'main', 'ajax_posts', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'noposts' => __('No older posts found', 'industrydive'),
    ));
}

add_action('wp_enqueue_scripts', 'industrydive_css_js_file_include');


// Theme Function 

function industrydive_customizer_register($wp_customize) {
    $wp_customize->add_section('industrydive_header_area', [
        'title' => __('Header Area', 'industrydive'),
        'description' => 'Update your header area.'
    ]);
    $wp_customize->add_setting('industrydive_logo', [
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'industrydive_logo', [
        'label' => 'Logo Upload',
        'section' => 'industrydive_header_area',
        'setting' => 'industrydive_logo',
        'description' => 'Upload your logo here',
    ]));
}

add_action('customize_register', 'industrydive_customizer_register');

// Menu Register
register_nav_menu('main_menu', __('Main Menu', 'industrydive'));

add_theme_support( 'post-thumbnails' );

// Adding Meta box for featured post

function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Posts', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
}
function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
	<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'sm-textdomain' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );

/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'sm_meta_save' );

// Get Post Count 
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// add the tracker to the head meta
function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');


// Filter Post
function filter_projects() {
    $catSlug = $_POST['category'];
  
    if($catSlug != "all") {
        $ajaxposts = new WP_Query([
            'posts_per_page' => 7,
            'post_type' => 'post',
            'category_name' => $catSlug,
            'orderby' => 'menu_order', 
            'order' => 'desc',
          ]);
    } else {
        $ajaxposts = new WP_Query([
            'posts_per_page' => 7,
            'post_type' => 'post',
            'orderby' => 'date', 
            'order' => 'desc',
          ]);
    }
    
    $response = '';
  
    if($ajaxposts->have_posts()) {
      while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        $response .= get_template_part('template_part/post_item');
      endwhile;
    } else {
      $response = 'empty';
    }
  
    echo $response;
    wp_reset_postdata();
    exit;
  }

  add_action('wp_ajax_filter_projects', 'filter_projects');
//   add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');


function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 4;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $category = $_POST['cat'];

    header("Content-Type: text/html");

    if($category != "all") {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $ppp,
            'category_name' => $category,
            'paged'    => $page,
        );
    } else {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $ppp,
            'paged'    => $page,
        );
    }

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= get_template_part('template_part/post_item');

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

// Adding font awsome 
function pe_fontawesome(){
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
 }
 add_action('wp_enqueue_scripts','pe_fontawesome');