<?php 
    session_start();
    $session = $_SESSION;
  
    foreach ($session as $x => $email) {
        if($email['teacher'] != null) {
            // Action here
        } else {
            header("location:/teacherpage/");
        }
    }

    $args = array(
        'post_type'=> 'teacher',
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key'     => 'user_email',
                'value'   => $_SESSION['teachersource']['teacher'],
                'compare' => '=',
            ),
        )
    );
    
    $post = new WP_query($args);

    if($post->have_posts()) : $post->the_post();
        $user = Array();
        $user['name'] = get_the_title();
        $user['ifhaveavatar'] = get_post_meta(get_the_ID(), 'user_avatar', true);
        $user['user_email'] = get_post_meta(get_the_ID(), 'user_email', true);
        $user['user_password'] = get_post_meta(get_the_ID(), 'user_password', true);
        $user['last_name'] = get_post_meta(get_the_ID(), 'last_name', true);
        $user['first_name'] = get_post_meta(get_the_ID(), 'first_name', true);
        $user['bio'] = get_post_meta(get_the_ID(), 'bio', true);
        $user['location'] = get_post_meta(get_the_ID(), 'location', true);
        $user['subject'] = get_post_meta(get_the_ID(), 'subject', true);
        $user['schedule'] = get_the_content();  
     
              
    endif;  

    wp_reset_postdata();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Teacher Source</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700" rel="stylesheet" type="text/css">
    <!-- Page stylesheet -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>css/landing1.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>style.css">

    <script type="text/javascript">
      var ajax_url = "<?php echo get_site_url() . "/"; ?>ajax/";
      var base_url = "<?php echo get_site_url() ?>";
    </script>
    
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/';?>js/jquery.js"></script>

</head>

<body>

    <div id="wrapper">
        <!-- Start of Header -->
        <div class="header">
            <div class="container">
                <div class="row clearfix">
                    <a href="/" class="logo">
                        <img src="<?php echo get_stylesheet_directory_uri().'/';?>images/logo.png" alt="Teacher Source" class="logo-sub00">
                        <img src="<?php echo get_stylesheet_directory_uri().'/';?>images/logo01.png" alt="Teacher Source" class="logo-sub01">
                    </a>
                    <div class="global-menu navbar-collapse pull-right">
                        <ul class="navbar-nav nav hidden-xs">
                            <li><a href="<?php echo home_url() . "/"; ?>teacherpage/account/">My Dashboard</a></li>
                            <li><a href="<?php echo home_url() . "/"; ?>teacherpage/profile/">Profile &amp; Schedule</a></li>
                            <li><a href="<?php echo home_url() . "/"; ?>teacherpage/search-school/">Search School</a></li>
                            <li><a href="<?php echo home_url() . "/"; ?>teacherpage/logout">Log Out [<?php echo $user['name']; ?>]</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="rainbow-border"></div>
        </div>
        <!-- End of Header -->
        <div class="main-content minheight">    