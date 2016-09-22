<?php 
/*
Template Name: Teacher Profile Page
*/
?>
<?php 
session_start();
include("include/header-teacher.php");
?>
  <script src="http://malsup.github.com/jquery.form.js"></script> 
<div class="container content">

	<h1>Profile and Schedule</h1>
	<div class="row">
	    <div class="col-xs-12 col-md-6">

	    	<h4>My Profile</h4>
<form enctype="multipart/form-data" action="/teacher/upload/" method="POST" id="myForm">
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
	            	<label>Firstname</label>	            	
	                <input name="first_name" id="first_name" type="text" class="form-control" placeholder="Firstname" value="<?php echo $user['first_name']; ?>">
	            </div>
	            <div class="form-group">
	            	<label>Lastname</label>	            	
	                <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Lastname" value="<?php echo $user['last_name']; ?>">
	            </div>
	            <div class="form-group">
	            	<label>Location</label>	            	
	                <input name="location" id="location" type="text" class="form-control" placeholder="Location" value="<?php echo $user['location']; ?>">
	            </div>
	            <div class="form-group">
	            	<label>Bio</label>	            	
	                <textarea name="bio" id="bio" class="form-control" rows="8"><?php echo $user['bio']; ?></textarea>
	            </div>
	            <div class="row">
	    			<div class="col-xs-12 btn-set">
						<a href="#" id="update_profile" class="btn btn-default">Update Profile</a>
	    			</div>
				</div>	
	        </form>

	    </div>

	    <div class="col-xs-12 col-md-6">
  	<?php 
	    if ($user['ifhaveavatar'] == null) { ?>
	        <img src="<?php echo site_url() .'/wp-content/themes/teachersource/images/avatar/avatar.jpg'; ?>" alt="Avatar">
		<?php }  else { ?>
		<div class="avatar">
			<img class="img-responsive" src="<?php echo $user['ifhaveavatar']; ?>" alt="<?php echo $user['name']; ?>">
		</div>  
	<?php } ?>
	    	<h4>My Schedule</h4>
	    	<div class="form-inline" >
	            <div class="form-group">
	            	<label>Day</label>
	                <select name="day" class="form-control">
	                	<option value="MON">MON</option>
	                	<option value="TUE">TUE</option>
	                	<option value="WED">WED</option>
	                	<option value="THURS">THURS</option>
	                	<option value="FRI">FRI</option>
	                	<option value="SAT">SAT</option>
	                	<option value="SUN">SUN,</option>
	                </select>
	            </div>
	            <div class="form-group">
	            	<label>Start:</label>
	                <select name="hour" class="form-control">
	                	<option value="0">0</option>
	                	<option value="1">1</option>
	                	<option value="2">2</option>
	                	<option value="3">3</option>
	                	<option value="4">4</option>
	                	<option value="5">5</option>
	                	<option value="6">6</option>
	                	<option value="7">7</option>
	                	<option value="8">8</option>
	                	<option value="9">9</option>
	                	<option value="10">10</option>
	                	<option value="11">11</option>
	                	<option value="12">12</option>
	                	<option value="13">13</option>
	                	<option value="14">14</option>
	                	<option value="15">15</option>
	                	<option value="16">16</option>
	                	<option value="17">17</option>
	                	<option value="18">18</option>
	                	<option value="19">19</option>
	                	<option value="20">20</option>
	                	<option value="21">21</option>
	                	<option value="22">22</option>
	                	<option value="23">23</option>	                	
	                </select>
	                &nbsp;:&nbsp;
	                <select name="min" class="form-control">
	                	<option value="00">00</option>
	                	<option value="15">15</option>
	                	<option value="30">30</option>
	                	<option value="45">45</option>
	                </select>
	            </div>
	            <div class="form-group">
	            	<label>Duration (mins):</label>
	                <select name="duration" class="form-control">
	                	<option value="30">30</option>
	                	<option value="45">45</option>
	                	<option value="60">60</option>
	                	<option value="75">75</option>
	                	<option value="90">90</option>
	                	<option value="105">105</option>
	                	<option value="120">120</option>
	                	<option value="135">135</option>
	                	<option value="150">150</option>
	                	<option value="165">165</option>
	                	<option value="180">180</option>
	                </select>
	            </div>
	            <div class="form-group">
	            	<a href="#" id="add_schedule" class="btn btn-default pull-right">Add Schedule</a>
            	</div>
	    	</div>


            <div class="form-group">
            	<br/>
            	<select name="schedule" class="form-control"  size="10" multiple><?php echo $user['schedule']; ?></select>
            	<a href="#" id="remove_schedule" class="btn btn-default pull-right">Remove Selected Schedule</a>
            </div><br/>
            <div id="map" style="width: 100%; height: 400px;">
				
			</div>


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
		$("#add_schedule").click(function(){
			var sched = $("select[name='day']").val() + ' ' + $("select[name='hour']").val() + ":" + $("select[name='min']").val() + '(' + $("select[name='duration']").val() + ' mins.)'  
			$("select[name='schedule']").append('<option>' + sched + '</option>');
			return false;
		});
		$("#remove_schedule").click(function(){
			$("select[name='schedule']").find("option:selected").remove();
			return false;
		});
		$("#update_profile").click(function(){
			var data = {};

			data['user_email'] = $("#user_email").val();
			data['user_password'] = $("#user_password").val();
			data['last_name'] = $("#last_name").val();
			data['first_name'] = $("#first_name").val();
			data['location'] = $("#location").val();
			data['bio'] = $("#bio").val();
			data['schedule'] = $("select[name='schedule']").html();

			 $.post(ajax_url, {action: 'update_teacher', post_data: data}, function(data){
			  if(data.trim().toString() == 'true'){
	            window.location = "<?php echo home_url() . "/"; ?>/teacher/profile";
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
include("include/footer-teacher.php");
?>