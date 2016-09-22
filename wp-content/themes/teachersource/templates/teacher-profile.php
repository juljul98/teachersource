<?php 
/*
Template Name: Teacher Profile Page
*/
?>
<?php 
include("include/header-teacher.php");

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

    $ctr = 0;
    $subjects = Array();   

    $args = array(
        'post_type'=> 'subject',
        'post_status' => 'publish',
    );
    
    $query = new WP_query($args);

    while($query->have_posts()) : $query->the_post();
        $subjects[$ctr]['subject_id'] = get_the_ID();
        $subjects[$ctr]['subject_name'] = get_the_title();
        $ctr++;
    endwhile;  

    wp_reset_postdata();

?>

<div class="container content">
		
	<h1>Profile and Schedules</h1>
	<div class="row">
	    <div class="col-xs-12 col-md-6">

	    	<h4>My Profile</h4>
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
	            	<label>Bio</label>	            	
	                <textarea name="bio" id="bio" class="form-control" rows="8"><?php echo $user['bio']; ?></textarea>
	            </div>
	            <div class="form-group">
	            	<label>Location</label>
	         		<input type="text" name="location" id="location" class="form-control">	            	
	            </div>
	            <div class="form-group">
	            	<label>Subject</label>
	            	<select name="subject" id="subject" class="form-control">
	            	<option value="">Select Subject to Teach</option>	
	            	<?php foreach($subjects as $subject): ?>
	            		<option <?php echo $user['subject'] == $subject['subject_id'] ? "selected" : ''; ?> value="<?php echo $subject['subject_id']; ?>"><?php echo $subject['subject_name']; ?></option>
	            	<?php endforeach; ?>
	            	</select>	            	
	            </div>	

	        </form>

	    </div>

	    <div class="col-xs-12 col-md-6">

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


	    </div>
	</div>	
	<div class="row">
	    <div class="col-xs-12 btn-set">
			<a href="#" id="update_profile" class="btn btn-default">Update Profile</a>
	    </div>
	</div>	

</div>

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
			data['bio'] = $("#bio").val();
			data['location'] = $("#location").val();
			data['subject'] = $("#subject").val();

			data['schedule'] = $("select[name='schedule']").html();

			 $.post(ajax_url, {action: 'update_teacher', post_data: data}, function(data){
			  if(data.trim().toString() == 'true'){
	            window.location = "<?php echo home_url() . "/"; ?>teacher/account/";
	          }
	        });

			return false;
		});
	});

</script>

<?php 
include("include/footer-teacher.php");
?>