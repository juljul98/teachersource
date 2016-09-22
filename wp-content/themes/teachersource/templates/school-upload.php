<?php
 /* Template Name: School Upload
 */
      



      $errors= array();
      $file_name = $_FILES['avatar']['name'];
      $file_size =$_FILES['avatar']['size'];
      $file_tmp =$_FILES['avatar']['tmp_name'];
      $file_type=$_FILES['avatar']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['avatar']['name'])));
      $path_array  = wp_upload_dir();
      $path = str_replace('\\', '/', $path_array['path']);
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
        $count = strlen($file_name);
        $filename = file_name($count);
        $new_path = $path. "/" . $filename . "." . $file_ext;
        move_uploaded_file($file_tmp, $new_path);
        $save_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $new_path);
                global $post;
        
        $post = $_POST['user_mail'];

         $args = array(
            'post_type'=> 'school',
            'post_status' => 'publish',
            'meta_query' => array(
                array(
                    'key'     => 'user_email',
                    'value'   => $post,
                    'compare' => '=',
                ),
            )
        );
        $query = new WP_query($args);
        if($query->have_posts()){
            $query->the_post(); 
            $arr = array(
            );
            update_post_meta(get_the_ID(), 'user_avatar', $save_path);
            wp_update_post ($arr);
            echo $save_path;
        } 
        else{
            echo "/wp-content/themes/teachersource/images/avatar";
        }   

        wp_reset_postdata();
        
      } else{
         print_r($errors);
      }

      function file_name($count) {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));
            for ($i = 0; $i < $count; $i++) {
                $key .= $keys[array_rand($keys)];
            }
            return $key;
      } 