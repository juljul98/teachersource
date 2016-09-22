<?php 
/*
Template Name: Ajax Request Page
*/
?>
<?php

    session_start();
    $post_data = $_POST;

    if(isset($post_data['post_data'])){
        call_user_func($post_data['action'], $post_data['post_data']);
    }
    else{
        call_user_func($post_data['action']);   
    }


    function login_teacher($post_data) {
        $args = array(
            'post_type'=> 'teacher',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'user_email',
                    'value'   => $post_data['user_email'],
                    'compare' => '=',
                ),
            )
        );
        
        $query = new WP_query($args);

        if($query->have_posts() && $post_data['user_email'] != ""){
            $query->the_post();

            
            if($post_data['login_method'] == 'manual'){

                //$verify = get_post_meta(get_the_ID(), 'verified', true);
                $password = get_post_meta(get_the_ID(), 'user_password', true);

                if($password == $post_data['user_password']){
                    $_SESSION['teachersource']['teacher'] = $post_data['user_email'];
                    echo "true";

                }
                else{
                    echo "false";
                }
            }
            else{
                update_post_meta(get_the_ID(), 'verified', 'Yes');
                $_SESSION['teachersource']['teacher'] = $post_data['user_email'];
                echo "true";
            }

        } 
        else{
            echo "false";
        }   
        
        wp_reset_postdata();
        
    }  


    function signup_teacher($post_data) {
        $args = array(
            'post_type'=> 'teacher',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'user_email',
                    'value'   => $post_data['user_email'],
                    'compare' => '=',
                ),
            )
        );
        
        $query = new WP_query($args);


        if(!$query->have_posts() && $post_data['user_email'] != ""){
            
            $post_id = wp_insert_post(array (
                'post_type' => 'teacher',
                'post_title' => $post_data['user_email'],
                'post_content' => " ",
                'post_status' => 'publish',
            ));
            add_post_meta($post_id, 'user_password', $post_data['pass_word']);
            add_post_meta($post_id, 'user_email', $post_data['user_email']);
            add_post_meta($post_id, 'first_name', $post_data['first_name']);
            add_post_meta($post_id, 'last_name', $post_data['last_name']);
            add_post_meta($post_id, 'registration_method', $post_data['registration_method']);
            if($post_data['registration_method'] != 'manual' ){
                add_post_meta($post_id, 'verified', 'Yes');
            }
            if($post_data['registration_method'] == 'manual'){
                add_post_meta($post_id, 'user_password', $post_data['user_password']);
            }

            $_SESSION['teachersource']['teacher'] = $post_data['user_email'];
            echo "true";
        
        } 
        else{
            echo "false";
        }   

        wp_reset_postdata();

    }  

    function login_school($post_data) {

        $args = array(
            'post_type'=> 'school',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'user_email',
                    'value'   => $post_data['user_email'],
                    'compare' => '=',
                ),
            )
        );
        
        $query = new WP_query($args);

        if($query->have_posts() && $post_data['user_email'] != ""){
            $query->the_post();

            if($post_data['login_method'] == 'manual'){

                //$verify = get_post_meta(get_the_ID(), 'verified', true);
                $password = get_post_meta(get_the_ID(), 'user_password', true);

                if($password == $post_data['user_password']){
                    $_SESSION['teachersource']['school'] = $post_data['user_email'];
                    echo "true";

                }
                else{
                    echo "false";
                }
            }
            else{
                update_post_meta(get_the_ID(), 'verified', 'Yes');
                $_SESSION['teachersource']['school'] = $post_data['user_email'];
                echo "true";
            }

        } 
        else{
            echo "false";
        }   
        
        wp_reset_postdata();
        
    }  


    function signup_school($post_data) {
        $args = array(
            'post_type'=> 'school',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'user_email',
                    'value'   => $post_data['user_email'],
                    'compare' => '=',
                ),
            )
        );
        
        $query = new WP_query($args);


        if(!$query->have_posts() && $post_data['user_email'] != ""){
            
            $post_id = wp_insert_post(array (
                'post_type' => 'school',
                'post_title' => $post_data['user_email'],
                'post_content' => " ",
                'post_status' => 'publish',
            ));
            add_post_meta($post_id, 'user_avatar', site_url() .'/wp-content/themes/teachersource/images/avatar/avatar.jpg');
            add_post_meta($post_id, 'user_password', $post_data['pass_word']);
            add_post_meta($post_id, 'user_email', $post_data['user_email']);
            add_post_meta($post_id, 'school_name', "Unnamed School");
            add_post_meta($post_id, 'first_name', $post_data['first_name']);
            add_post_meta($post_id, 'last_name', $post_data['last_name']);
            add_post_meta($post_id, 'registration_method', $post_data['registration_method']);
            if($post_data['registration_method'] != 'manual' ){
                add_post_meta($post_id, 'verified', 'Yes');
            }
            if($post_data['registration_method'] == 'manual'){
                add_post_meta($post_id, 'user_password', $post_data['user_password']);
            }

            $_SESSION['teachersource']['school'] = $post_data['user_email'];
            echo "true";
        
        } 
        else{
            echo "false";
        }   

        wp_reset_postdata();

    }


    function update_teacher($post_data) {

        $args = array(
            'post_type'=> 'teacher',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'user_email',
                    'value'   => $post_data['user_email'],
                    'compare' => '=',
                ),
            )
        );
        
        $query = new WP_query($args);

        if($query->have_posts() && $post_data['user_email'] != ""){

            $query->the_post();
                
            $arr = array(
                'post_content' => $post_data['schedule']
            );

            update_post_meta(get_the_ID(), 'user_password', $post_data['user_password']);
            update_post_meta(get_the_ID(), 'first_name', $post_data['first_name']);
            update_post_meta(get_the_ID(), 'last_name', $post_data['last_name']);
            update_post_meta(get_the_ID(), 'bio', $post_data['bio']);
            update_post_meta(get_the_ID(), 'location', $post_data['location']);
            update_post_meta(get_the_ID(), 'subject', $post_data['subject']);

            wp_update_post ($arr);

            echo "true";
                 
        } 
        else{
            echo "false";
        }   

        wp_reset_postdata();

    }      

    function update_school($post_data) {

        $args = array(
            'post_type'=> 'school',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'user_email',
                    'value'   => $post_data['user_email'],
                    'compare' => '=',
                ),
            )
        );
        
        $query = new WP_query($args);

        if($query->have_posts() && $post_data['user_email'] != ""){

            $query->the_post();
                
            $arr = array(
            );
      
            update_post_meta(get_the_ID(), 'user_password', $post_data['user_password']);
            update_post_meta(get_the_ID(), 'first_name', $post_data['first_name']);
            update_post_meta(get_the_ID(), 'last_name', $post_data['last_name']);
            update_post_meta(get_the_ID(), 'location', $post_data['location']);
            update_post_meta(get_the_ID(), 'school_name', $post_data['school_name']);
            
            wp_update_post ($arr);

            echo "true";
                 
        } 
        else{
            echo "false";
        }   

        wp_reset_postdata();

    }      

    function search_school($post_data) {

        $ctr = 0;
        $school = array();

        $args = array(
            'post_type'=> 'school',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'location',
                    'value'   => $post_data['location'],
                    'compare' => '=',
                ),
            )
        );
        
        $query = new WP_query($args);

        if($query->have_posts()):

            while($query->have_posts()) : $query->the_post();

                $school[$ctr]['school_email'] = get_post_meta(get_the_ID(), 'user_email', true);
                $school[$ctr]['school_name'] = get_post_meta(get_the_ID(), 'school_name', true);
                $ctr++;

            endwhile; 

            $data = array();

            $data['count'] = $ctr;
            $data['data'] = $school;


            echo json_encode($data);

        else:

            echo "false";

        endif;
        
        wp_reset_postdata();

    }  

    function search_teacher($post_data) {

        $ctr = 0;
        $school = array();

        $args = array(
            'post_type'=> 'teacher',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'location',
                    'value'   => $post_data['location'],
                    'compare' => '=',
                ),
                array(
                    'key'     => 'subject',
                    'value'   => $post_data['subject'],
                    'compare' => '=',
                ),
            )
        );
        
        $query = new WP_query($args);

        if($query->have_posts()):

            while($query->have_posts()) : $query->the_post();

                $school[$ctr]['teacher_email'] = get_post_meta(get_the_ID(), 'user_email', true);
                $school[$ctr]['teacher_name'] = get_post_meta(get_the_ID(), 'first_name', true) . " " . get_post_meta(get_the_ID(), 'last_name', true);
                $ctr++;

            endwhile; 

            $data = array();

            $data['count'] = $ctr;
            $data['data'] = $school;


            echo json_encode($data);

        else:

            echo "false";

        endif;
        
        wp_reset_postdata();

    } 

    function reset_pass($post_data) {

        $email = $post_data['email'];
        $encrypted = encryptIt( $email );
        site_url() . "/confirmpassword/?reset=".$post_data['resetType']."&email=". $encrypted ."";

        $to      = $email;
        $subject = 'Teacher Source';
        $message .= "<h1>Reset Password Confirmation</h1>";
        $message .= "Link below. Thanks";
        $message .= site_url() . "/confirmpassword/?reset=".$post_data['resetType']."&email=". $encrypted ."";;
        $headers = 'From: partanduls@gmail.com' . "\r\n" .
        'Reply-To: partanduls@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        echo "Sent";

    }

    function encryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return( $qEncoded );
    }

    function decryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );
    }
 
    
?>