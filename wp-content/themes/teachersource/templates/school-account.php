<?php 
/*
Template Name: School Account Page
*/
?>
<?php 
include("include/header-school.php");

?>

<div class="container content">
	<div class="row">

		<div class="col-xs-12">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h1><?php echo the_title();?></h1>
		<div>
			<?php echo the_content(); ?>
		</div>

		 <?php endwhile; else : ?>
		 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		 <?php endif; ?>

		</div>

	</div>
</div>
    
<?php 
include("include/footer-school.php");
?>
