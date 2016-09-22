<?php 
/*
Template Name: Teacher Search Page
*/
?>
<?php 
include("include/header-teacher.php");
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

<div class="container content">
		
	<h1>Search School</h1>
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
        </form>
		</div>
	</div>	
	<div class="row">
	    <div class="col-xs-12 btn-set">
			<a href="#" id="search" class="btn btn-default">Search School</a>
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

			$.post(ajax_url, {action: 'search_school', post_data: data}, function(data){
				
				if(data != "false"){	
				var data = $.parseJSON(data);		
				
					if(data["count"] > 0){
								
						var ctr = 0;
						var html_data = "<h4>Search Results</h4>";
						$.each(data["data"], function(index, value){

							html_data += '<div class="col-xs-12">';	
							html_data += '<strong>' + value["school_name"] + '</strong>';
							html_data += '<p>' + value["school_email"] + '</p>';
							html_data += '<button>Apply</button>';
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