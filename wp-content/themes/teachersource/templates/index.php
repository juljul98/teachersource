<?php 
/*
Template Name: Home Page
*/
?>
<?php 
include("include/header.php");
?>
<div class="slider">
	<div>

		<div class="row" id="slider1">
			<div class="sliderImg"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/images/slider/1.jpg" alt=""></div class="sliderImg">
			<div class="sliderImg"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/images/slider/2.jpg" alt=""></div class="sliderImg">
		</div>
		<div class="navigator">
			<p class="prev"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></p>
			<p class="next"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
		</div>
	</div>
</div>

<section class="content loginas" id="login">
	<div class="container">
		<h2>Welcome to <span>Teacher Source</span></h2>
		<p class="txtBlk">		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, labore? Molestias odit perspiciatis
			<a href="#">Login as ?</a>	</p>
		<div class="row roundnavigation">

			<div class="col-md-6 col-sm-12 loginImg" id="school">
				<a href="<?php echo home_url() . "/"; ?>schoolpage">
					<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/images/school.jpg" alt="School" title="Login as Teacher">
					<div class="bg"></div>
					<span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
					
				</a>
			</div>
			<div class="col-md-6 col-sm-12 loginImg" id="teacher">
				<a href="<?php echo home_url() . "/"; ?>teacherpage">
					<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/images/teacher.jpg" alt="School" title="Login as Student">
					<div class="bg"></div>
					<span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
				
				</a>
			</div>

		</div>
	</div>
</section>
<section class="downloads">
	<div class="container">
			<h2>Try our <span>Mobile Application</span></h2>
		<div class="row">
			<div class="col-md-3 col-sm-3 clearfix">
				<span>Available in your Stores :</span>	
				<ul class="storeLinks clearfix">
					<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/social/android.png" alt="Android"></a></li>
					<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/social/apple.png" alt="Apple"></a></li>
				</ul>
			</div>
			<div class="col-md-9 col-sm-9" id="slider2">
				<div><img class="img-responsive android" src="<?php echo get_stylesheet_directory_uri() ?>/images/mobile/1.png" alt="Mobile"></div>
				<div><img class="img-responsive iphone" src="<?php echo get_stylesheet_directory_uri() ?>/images/mobile/2.png" alt="Mobile"></div>
			</div>
		</div>
	</div>
</section>

<section class="mapArea">
	<div class="container mapBlk">
		<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() ?>/images/map/1.jpg" alt="Map">
	</div>
	<div class="informationBlk">
		<div class="container">
			<div class="col-md-4 col-sm-4">
				<h3>Mission</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, sequi.</p>
				<button>Read More</button>
			</div>
			<div class="col-md-4 col-sm-4">
				<h3>Vision</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, sequi.</p>
				<button>Read More</button>
			</div>
			<div class="col-md-4 col-sm-4">
				<h3>About Us</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, sequi.</p>
				<button>Read More</button>
			</div>
		</div>
	</div>
</section>

<div class="pageTop"><a href="#up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a></div>
    <script>
        $('#slider1').slick({
          infinite: true,
          speed: 300,
          slidesToShow: 1,
          adaptiveHeight: true,
          prevArrow: '.prev',
          nextArrow: '.next'
        });
        $('#slider2').slick({
          infinite: true,
          speed: 300,
          slidesToShow: 1,
          adaptiveHeight: true,
          prevArrow: false,
          nextArrow: false
        });
    </script>
<?php
include("include/footer.php");
?>	

