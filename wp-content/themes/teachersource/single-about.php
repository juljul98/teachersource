<?php 
include("templates/include/header.php");
?>
<style>
	.singleContent {
		padding: 30px 0;
	}

</style>

<div class="container singleContent">
<?php if (have_posts()) : 
      while (have_posts()) : the_post(); 
	?>
	<h3><?php the_title(); ?></h3> 
	<div><?php the_content(); ?></div>
	<?php
      endwhile; 
                    endif; ?> 

</div>


<div class="pageTop"><a href="#up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a></div>
<?php
include("templates/include/footer.php");
?>