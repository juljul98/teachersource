<?php 
/*
Template Name: School Search Page
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
		
	<h1>Search Teacher</h1>
	<div class="row">
		<div class="col-xs-12">
		<form action="#" method="post">
            <div class="form-group">
            	<label>Location</label>
            	<select name="location" id="location" class="form-control">
            	<option value="">Select Location</option>	
            	<?php foreach($locations as $location): ?>
            		<option value="<?php echo $location['location_id']; ?>"><?php echo $location['location_name']; ?></option>
            	<?php endforeach; ?>
            	</select>	            	
            </div>
            <div class="form-group">
            	<label>Subject</label>
            	<select name="subject" id="subject" class="form-control">
            	<option value="">Select Subject to Teach</option>	
            	<?php foreach($subjects as $subject): ?>
            		<option value="<?php echo $subject['subject_id']; ?>"><?php echo $subject['subject_name']; ?></option>
            	<?php endforeach; ?>
            	</select>	            	
            </div>	            
        </form>
		</div>
	</div>	
	<div class="row">
	    <div class="col-xs-12 btn-set">
			<a href="#" id="search" class="btn btn-default">Search Teacher</a>
	    </div>
	</div>	
	<div class="row" id="result">
	</div>		

</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#search").click(function(){
			var data = {};

			data['location'] = $("#location").val();
			data['subject'] = $("#subject").val();

			$.post(ajax_url, {action: 'search_teacher', post_data: data}, function(data){
				
				if(data != "false"){	
				var data = $.parseJSON(data);		
				
					if(data["count"] > 0){
								
						var ctr = 0;
						var html_data = "<h4>Search Results</h4>";
						$.each(data["data"], function(index, value){

							html_data += '<div class="col-xs-12">';	
							html_data += '<strong>' + value["teacher_name"] + '</strong>';
							html_data += '<p>' + value["teacher_email"] + '</p>';
							html_data += '<button>Send Request for Hiring</button>';
							html_data += '</div>';
							html_data += '<hr/>';
							ctr++;
						});

						$("#result").html(html_data);
					
					}
			
				}
				else{
						var html_data = "<h4>No Results Found</h4>";
						$("#result").html(html_data);
				}

	        });

			return false;
		});
	});

</script>

<?php 
include("include/footer-teacher.php");
?>