<?php 
/*
Template Name: School Landing Page
*/
    session_start();
    $session = $_SESSION;
    foreach ($session as $x => $email) {
        if($email['school'] != null) {
          header("location:/schoolpage/account");
        } else {
          // Do action here
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>School | Teacher Source</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700" rel="stylesheet" type="text/css">
    <!-- Page stylesheet -->

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>css/css/school.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>css/css/home.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/';?>style.css">


    <script type="text/javascript">
      var ajax_url = "<?php echo get_site_url() . "/"; ?>ajax/";
    </script>
    
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/';?>js/jquery.js"></script>

    <script type="text/javascript">

      $.fn.serializeObject = function () {
          var o = {};
          var a = this.serializeArray();
          $.each(a, function () {
              if (o[this.name] !== undefined) {
                  if (!o[this.name].push) {
                      o[this.name] = [o[this.name]];
                  }
                  o[this.name].push(this.value || '');
              } else {
                  o[this.name] = this.value || '';
              }
          });
          return o;
      };

      function login_user(data){
        $.post(ajax_url, {action: 'login_school', post_data: data}, function(data){
          if(data.trim().toString() == 'true'){
            window.location = "<?php echo home_url() . "/"; ?>schoolpage/account/";
          }
          else {
            alert("Invalid Login.");
          }
        });
      }

      function signup_user(data){
        $.post(ajax_url, {action: 'signup_school', post_data: data}, function(data){
          if(data.trim().toString() == 'true'){
            window.location = "<?php echo home_url() . "/"; ?>schoolpage/account/";
          }
          else {
            alert("School already registered.");
          }
        });

      }

      $(document).ready(function(){

          $(".form-login").submit(function(){

              var data = $(".form-login").serializeObject();
              data['login_method'] = 'manual';

              login_user(data);
              return false;
          });

          $(".form-signup").submit(function(){

              var data = $(".form-signup").serializeObject();
              data['registration_method'] = 'manual';

              signup_user(data);
              return false;
          });
      });


    </script>

   <script src="https://apis.google.com/js/platform.js" async defer></script>
   <meta name="google-signin-client_id" content="1078162262270-bdlaeq8f1kvba8v21ln9t60l42fc7k9b.apps.googleusercontent.com">
    <script type="text/javascript">
    var btnLogin = 0;
    var btnSignup = 0;

    function showGoogleData(googleUser) {
      var profile = googleUser.getBasicProfile();

      var data = {}; 

      data['registration_method'] = 'google';
      data['login_method'] = 'google';

      data['user_email'] = profile.getEmail();
      data['first_name'] = profile.getGivenName();
      data['last_name'] = profile.getFamilyName();
      data['pass_word'] = profile.getId();
    
      if(btnSignup == 1){
        signup_user(data);
        btnSignup = 0;
      }
      if(btnLogin == 1){
        login_user(data);
        btnLogin = 0;
      }

    }
    </script>
    <script type="text/javascript" src="http://platform.linkedin.com/in.js">
      api_key: 759ek9ie3jq7k4
      authorize: true
      scope: r_basicprofile r_emailaddress
    </script>
    <script type="text/javascript">
      function OnLinkedInAuth() {
        var fields = ["id", "first-name", "last-name", "email-address"];
        IN.API.Profile("me").fields(fields).result(showLinkedinData);
      }
      function showLinkedinData(profile) {
          var member = profile.values[0];
          
          var data = {}; 

          data['registration_method'] = 'linkedin';
          data['login_method'] = 'linkedin';

          data['user_email'] = member.emailAddress;
          data['first_name'] = member.firstName;
          data['last_name'] = member.lastName;
          data['pass_word'] = member.id;

          if(btnSignup == 1){
            signup_user(data);
            btnSignup = 0;
          }
          if(btnLogin == 1){
            login_user(data);
            btnLogin = 0;
          }

      }    
    </script>


    <script type="text/javascript">

        $(document).ready(function(){

            $(".fb-signup-btn").click(function(){
                btnSignup = 1;
                checkLoginState();
                return false;

            });

            $(".gm-signup-btn").click(function(){
                btnSignup = 1;
                $(".abcRioButton").trigger('click');
                return false;
            });

            $(".in-signup-btn").click(function(){
                btnSignup = 1;              
                IN.User.authorize(function(){
                   OnLinkedInAuth();
                });
                return false;
            });            

            $(".fb-login-btn").click(function(){
                btnLogin = 1;
                checkLoginState();
                return false;

            });

            $(".gm-login-btn").click(function(){
                btnLogin = 1;
                $(".abcRioButton").trigger('click');
                return false;
            });

            $(".in-login-btn").click(function(){
                btnLogin = 1;              
                IN.User.authorize(function(){
                   OnLinkedInAuth();
                });
                return false;
            });   

        });

    </script>
</head>

<body>

  <script>

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '269824566743806',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }  

  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      showFacebookData();
    }
    else{
      FB.login(function(response) {
         if (response.status === 'connected') {
            showFacebookData();
          }   
      }, {scope: 'email'});          
    } 
  }

  function showFacebookData() {
    FB.api('/me?fields=first_name,last_name,email', 
        function(response) {
          var data = {}; 

          data['registration_method'] = 'facebook';
          data['login_method'] = 'facebook';
          data['user_email'] = response.email;
          data['first_name'] = response.first_name;
          data['last_name'] = response.last_name;
          data['pass_word'] = response.id;

          if(btnSignup == 1){
            signup_user(data);
            btnSignup = 0;
          }
          if(btnLogin == 1){
            login_user(data);
            btnLogin = 0;
          }

        }, {scope: 'email'}
    );

  }

</script>

<div id="social-signup" style="display:none;">
  <div class="g-signin2" data-onsuccess="showGoogleData"></div>
  <div class="fb-login-button" data-scope="email,user_birthday,user_hometown,user_location,user_website,user_work_history,user_about_me" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div><br/>
  <script type="in/Login"></script>
</div>

    <div id="wrapper" class="school">
        <!-- Start of Header -->
        <div class="header">
            <div class="container">
                <div class="row clearfix">
                    <a href="/" class="logo">
                        <img src="<?php echo get_stylesheet_directory_uri().'/';?>images/logo.png" alt="Teacher Source" class="logo-sub00">

                    </a>
                    <div class="global-menu navbar-collapse pull-right">
                        <ul class="navbar-nav nav loginButton">
                            <li><a href="#"><i class="fa fa-stop visible-xs" aria-hidden="true"></i><span class="hidden-xs">About Us</span></a></li>
                            <li><a href="#"><i class="fa fa-stop visible-xs" aria-hidden="true"></i><span class="hidden-xs">How we Work</span></a></li>
                            <li><a href="#"><i class="fa fa-stop visible-xs" aria-hidden="true"></i><span class="hidden-xs">Overview</span></a></li>
                            <li><a href="#"><i class="fa fa-stop visible-xs" aria-hidden="true"></i><span class="hidden-xs">Sign up</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="rainbow-border"></div>
        </div>
        <!-- End of Header -->
        <div class="container">
        <div class="main-content row">

            <div class="col-md-6 banner section">
             
                
                        <div class="signup">

                            <div class="signup-form">
                              

                                <div class="form">
                                    <form action="<?php echo home_url() . "/"?>teacher-account/" method="post" class="form-login">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                            <input name="user_email" type="text" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                            <input name="user_password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                                        </div>
                                        <input type="submit" value="Log In" class="btn signup-btn">
                                    </form>
                                    <a href="<?php echo site_url(); ?>/resetpassword/?reset=school">Forgot Password ?</a>
                                </div>

                                <p class="other-signup">... or log in via</p>
                                <div class="accountList">
                                    <a href="#" class="fb-btn fb-login-btn"><i class="fa fa-facebook" aria-hidden="true"></i><span class="sub-text">connect</span></a>
                                    <a href="#" class="gm-btn gm-login-btn"><i class="fa fa-envelope-o" aria-hidden="true"></i><span class="sub-text">connect</span></a>
                                    <a href="#" class="in-btn in-login-btn"><i class="fa fa-linkedin" aria-hidden="true"></i><span class="sub-text">connect</span></a>
                                </div>
                                <div class="alert alert-danger loginErr">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Invalid Login!</strong> Wrong username and password.
                                </div>
                            </div>
                        </div>
      
            </div>
            <div class="col-md-6 register section">
            
                
           
                        <div class="signup">
                    
                            <div class="signup-form">
                                

                                <div class="form">
                                    <form action="#" method="post" class="form-signup">
                                        <div class="input-group  col-xs-12">
                                            <input name="user_email" type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group  col-xs-12">
                                            <input name="user_password" type="password" class="form-control  col-xs-12" placeholder="Password" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group  col-xs-12">
                                            <input name="first_name" type="text" class="form-control  col-xs-12" placeholder="First Name" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group  col-xs-12">
                                            <input name="last_name" type="text" class="form-control  col-xs-12" placeholder="Last Name" aria-describedby="basic-addon1">
                                        </div>
                                        <input type="submit" value="Sign me up!" class="btn signup-btn">
                                    </form>                                  
                                </div>
                                <p class="other-signup">... or sign up via</p>
                                <div class="accountList">
                                    <a href="#" class="fb-btn fb-signup-btn"><i class="fa fa-facebook" aria-hidden="true"></i><span class="sub-text">connect</span></a>
                                    <a href="#" class="gm-btn gm-signup-btn" id="gm-signup-btn"><i class="fa fa-envelope-o" aria-hidden="true"></i><span class="sub-text">connect</span></a>
                                    <a href="#" class="in-btn in-signup-btn"><i class="fa fa-linkedin" aria-hidden="true"></i><span class="sub-text">connect</span></a>
                                </div>
                       
                            </div>
                     
                        
                  
                </div>
            </div>
            </div>
            </div>
</div>
  <?php include 'include/footer.php'; ?>
</body>
</html>