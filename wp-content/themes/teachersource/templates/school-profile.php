<?php 
/*
Template Name: School Profile Page
*/
?>
<?php 
include("include/header-school.php");

?>
<?php

    $ctr = 0;
    $locations = Array();   

    $args = array(
        'post_type'=> 'location',
        'post_status' => 'publish',
    );
    
    $query = new WP_query($args);

    while($query->have_posts()) : $query->the_post();
        $locations[$ctr]['location_id'] = get_the_ID();
        $locations[$ctr]['location_name'] = get_the_title();
        $ctr++;
    endwhile;  

    wp_reset_postdata();

?>
 <script src="http://malsup.github.com/jquery.form.js"></script> 

<div class="container content">
		
	<h1>School Profile</h1>
	<div class="row">
	    <div class="col-xs-12 col-md-12">

	    	<h4>Profile</h4>
			<div class="col-md-6">

<form enctype="multipart/form-data" action="/school/upload/" method="POST" id="myForm">
<label for="file">Filename:</label>
<input type="hidden" value="<?php echo $user['user_email']; ?>" name="user_mail">
<input type="file" name="avatar" id="avatar"><br>
<input type="submit" name="submit" class="btn btn-success" value="Upload Image">
</form>

<div class="progress progress-striped active">
  <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
    <span class="sr-only">0% Complete</span>
  </div>
</div>
				<form action="#" method="post">
					
		            <div class="form-group">
		            	<label>Email Address</label>
		                <input name="user_email" id="user_email" type="text" class="form-control" readonly placeholder="Email Address" value="<?php echo $user['user_email']; ?>">
		            </div>
		            <div class="form-group">
		            	<label>Password</label>
		                <input name="user_password" id="user_password" type="password" class="form-control" placeholder="Password" value="<?php echo $user['user_password']; ?>">
		            </div>
		            <div class="form-group">
		            	<label>School Name</label>	            	
		                <input name="school_name" id="school_name" type="text" class="form-control" placeholder="School Name" value="<?php echo $user['school_name']; ?>">
		            </div>
		            <div class="form-group">
		            	<label>Firstname</label>	            	
		                <input name="first_name" id="first_name" type="text" class="form-control" placeholder="Firstname" value="<?php echo $user['first_name']; ?>">
		            </div>
		            <div class="form-group">
		            	<label>Lastname</label>	            	
		                <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Lastname" value="<?php echo $user['last_name']; ?>">
		            </div>
		            <div class="form-group">
		            	<label>Location</label>
		            	<input type="text" name="location" id="location" class="form-control" placeholder="location" value="<?php echo $user['location']; ?>">
		       	            	
		            </div>

		        </form>
				
			</div>
			<div class="col-md-6">
			<?php 
			    if ($user['ifhaveavatar'] == null) { ?>
			        <img src="<?php echo site_url() .'/wp-content/themes/teachersource/images/avatar/avatar.jpg'; ?>" alt="Avatar">
			<?php }  else { ?>
			<div class="avatar">
				<img class="img-responsive" src="<?php echo $user['ifhaveavatar']; ?>" alt="<?php echo $user['name']; ?>">
			</div>  
			<?php } ?>
			<div id="map" style="width: 100%; height: 400px;">
				
			</div>
				
			</div>

	    </div>

	</div>	
	<div class="row">
	    <div class="col-xs-12 btn-set">
			<a href="#" id="update_profile" class="btn btn-default">Update Profile</a>
	    </div>
	</div>	

</div>
<script>
	$(function(){
	 
	 // function from the jquery form plugin
	 $('#myForm').ajaxForm({
	 	beforeSend:function(){
	 		 $(".progress").show();

	 	},
	 	uploadProgress:function(event,position,total,percentComplete){
	 		$(".progress-bar").width(percentComplete+'%'); //dynamicaly change the progress bar width
	 		$(".sr-only").html(percentComplete+'%'); // show the percentage number
	 	},
	 	success:function(){
	 		$(".progress").hide(); //hide progress bar on success of upload
	 	},
	 	complete:function(response){
		 	 $('.avatar img').attr('src', response.responseText);
		 	 
	 	}
	 });

	 //set the progress bar to be hidden on loading
	 $(".progress").hide();
});
</script>
<script type="text/javascript">

	$(document).ready(function(){

		$("#update_profile").click(function(){
			var data = {};
			
			data['user_email'] = $("#user_email").val();
			data['user_password'] = $("#user_password").val();
			data['school_name'] = $("#school_name").val();
			data['last_name'] = $("#last_name").val();
			data['first_name'] = $("#first_name").val();
			data['location'] = $("#location").val();

			
			 $.post(ajax_url, {action: 'update_school', post_data: data}, function(data){
			  if(data.trim().toString() == 'true'){
	            window.location = "<?php echo home_url() . "/"; ?>school/profile/";
	          } else {
	          	alert('Error');
	          }
	        });

			return false;
		});
	});

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCg7fCx8dzgQBARD8LZed3AQ12Qy3Pb4c"
            type="text/javascript"></script>
<script type="text/javascript">
function initialize() {
var geocoder;
var map;

var address = "<?php echo $user['location']; ?>";
geocoder = new google.maps.Geocoder();
  //var latlng = new google.maps.LatLng(-34.397, 150.644);
var myOptions = {
    zoom: 12,
    center: address,
    mapTypeControl: true,
    disableDefaultUI: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map"), myOptions);

  if (geocoder) {
    geocoder.geocode({
      'address': address
    }, function(results, status) {
      console.log(status);
      if (status == google.maps.GeocoderStatus.OK) {
        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);


          var infowindow = new google.maps.InfoWindow({
            content: '<b>' + address + '</b>',
            size: new google.maps.Size(150, 50)
          });

          var marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
          
            title: address
          });
          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });

        } else {
          alert("No results found");
        }
      } else {
        console.log("Geocode was not successful for the following reason: " + status);
      }
    });
  }
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php 
include("include/footer-school.php");
include("include/map-api.php");
?>