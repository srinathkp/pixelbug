<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pixelbug</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/jquery.flexisel.js"></script>
  <script type="text/javascript" src="js/text-slider.js"></script>
  <script type="text/javascript" src="js/flickity.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/flickity.css">

	<!--FONTS-->
	<link href='https://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
	<!--Style Sheet-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<!-- <nav class="navbar navbar-default" data-spy="affix" data-offset-top="786">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="images/pixelbug-logo.png" width="75"></a>
    </div> 
 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#us">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="#who">About us</a></li>
      	<li><a href="#what">Work</a></li>
      	<li><a href="#gallery">Gallery</a></li>
      	<li><a href="#testimonial">Testimonials</a></li>
      	<li><a href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav> -->

<div id="wrapper">
 <div class="overlay"></div>
 <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li>
                    <a href="">HOME</a>
                </li><!-- 
                 <li>
                    <a href="index.html">ABOUT US</a>
                </li> -->
                <li>
                    <a href="{{action('PhotoController@RecentAlbumPhotos')}}">GALLERY</a>
                </li>
                <li>
                    <a href="{{action('MemberController@GetMap')}}">TEAM</a>
                </li>
                @if(Auth::check())
                	<li>
                      <a href="{{action('PhotoController@GetAdd')}}">ADD PHOTOS</a>
                  	</li>
                  	<li>
                      <a href="{{action('MemberController@GetCreate')}}">ADD MEMBER</a>
                  	</li>
                	<li>
                      <a href="{{action('MemberController@GetEdit')}}">EDIT TEAM</a>
                  	</li>
	                <li>
	                    <a href="{{action('Auth\AuthController@getLogout')}}">LOGOUT</a>
	                </li>
                @endif
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->
<div id="page-content-wrapper">
      <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
			<span class="hamb-bottom"></span>
  </button>
<header>
 	<div class="container">
 		<div class="row">
 		  <img src="images/pixelbug-logo.png">
  			<!--<h3>PIXELBUG</h3>-->
 		
 		</div>
 	</div>
 </header>



<section id="who">
 <div class="container">
 	<div class="row">
 		<h2>WHO WE ARE</h2>
 		<div class="col-md-4">
 			<h3>GENESIS</h3>
 			<p>We are a student run photography club, established in 2012 and inaugurated by the eminent film director Gautham Vasudev Menon with an aim to inculcate interest in and a passion for photography among students.</p>
 		</div>
 		<div class="col-md-4">
 			<h3>TEAM</h3>
 			<p>Having started out as a hobby group comprising of young and talented photographers, we have grown into a professional club of over 25 active members yearning to learn through every opportunity put forth to us.</p>
 		</div>
 		<div class="col-md-4">
 			<h3>EXPERIENCE</h3>
 			<p>Over the years, we have trained ourselves through every chance that came by. We have takgit en to the streets for many photowalks, promoted tourism across South India. In addition to this, we also carried out various studio shoots.</p>
 		</div> 		
 	</div>
 </div>
</section>

<section id="what">
	<div class="container-fluid">
		<h2>WHAT WE DO</h2>
		<div class="col-md-4 sample" id="products">
			<h3>PRODUCT</h3>
			
		</div>
		<div class="col-md-4 sample" id="studio">
			<h3>STUDIO</h3>
			
		</div>
		<div class="col-md-4 sample" id="wedding">
			<h3>WEDDING</h3>
			
		</div>
		<div  id="event" class="col-md-4 sample">
			<h3>EVENT COVERAGE</h3>
			
		</div>
		<div class="col-md-4 sample" id="workshop">
			<h3>WORKSHOP</h3>
			
		</div>
		<div class="col-md-4 sample" id="landscape">
			<h3>LANDSCAPE</h3>
			
		</div>
	</div>
</section>

<section id="gallery">
	<h2>GALLERY</h2>
	<p>A glimpse of our work</p>
	    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
		 	 <div class="gallery-cell" id="festember">
		  		<a href="{{action('PhotoController@GetAllAlbumPhotos',['album_name'=>'Festember'])}}">
		  			<h3>FESTEMBER</h3>
		  	</a>
		 </div>
		 <div class="gallery-cell" id="pragyan">
		  	<a href="{{action('PhotoController@GetAllAlbumPhotos',['album_name'=>'Pragyan'])}}">
		  		<h3>PRAGYAN</h3>
		  	</a>
		 </div>
		 <div class="gallery-cell" id="nittfest">
		  <a href="{{action('PhotoController@GetAllAlbumPhotos',['album_name'=>'Nittfest'])}}">
		  <h3>NITTFEST</h3>
		  </a>
		  </div>
		  <div class="gallery-cell" id="sportsfete">
		  <a href="{{action('PhotoController@GetAllAlbumPhotos',['album_name'=>'Sportsfete'])}}">
		  <h3>SPORTSFETE</h3>
		  </a>
		  </div>
		</div>
		<a href="{{action('PhotoController@GetRecentAlbumPhotos')}}"><button class="full-gallery">VIEW FULL GALLERY</button></a>

</section>

<section id="team">
	<div class="container">
		<h2>MEET THE TEAM</h2>
		<div class="col-md-12">
			<div class="col-md-6">
			<div class="team-pic" id="saatwik"></div>
			<h3>SAATWIK</h3>
		</div>
		<div class="col-md-6">
			<div class="team-pic" id="pradeep"></div>
			<h3>PRADEEP</h3>
		</div>
		</div>
	<a href="{{action('MemberController@GetMap')}}">
			<button>VIEW ALL MEMBERS</button>
	</a>
	</div>
</section>

<section id="testimonial">
	<div class="container">
		<h2>TESTIMONIALS</h2>
		<div class="slide">
			<div class="slider-item quote">
			<h3 class="paragraph">
				Pixelbug is a club of like-minded, dedicated and a high caliber group of photographers. The club has helped me in boosting my self confidence and skills to a whole new level. At Pixelbug, you are always a learner, and you get to be a part of a club where the members are open minded, helpful and always ready to share ideas. Being a part of this club is a major memory of my journey at NITT.

			</h3>
			<p class="white">
				Shyam Purushan	
			</p>
			</div>
			<div class="slider-item quote">
			<h3 class="paragraph">
				It was a great experience starting the club from it's seed. Sowed the seeds along with Pranav and it has reached great heights now.

			</h3>
			<p class="white">
				Palaniappan
			</p>
			</div>

		<script>
			$('.slide').textSlider({

			timeout: 5000,
			slideTime: 750,
			loop: 1

			});

		</script>
		</div>
	</div>
</section>

<section id="contact">
	<div class="container">
	<h2>WANT TO TALK TO US?</h2>
	<h3>Have any queries or want to work with us? Say hi to us at this address!</h3>
	 <a href="mailto:pixelbug@gmail.com">
	 	<button>pixelbug@gmail.com</button>
	 	</a>
	</div>
</section>

<footer>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
				<h3>You don't take a photograph, you make it.</h3>
				<p>ANSEL ADAMS</p>
					<ul class="social-icons icon-circle list-unstyled list-inline"> 
				   <li> <a href="https://www.facebook.com/pixelbug.nitt/?fref=ts" target="blank"><i class="fa fa-facebook"></i></a></li> 
			        <li> <a href="https://plus.google.com/104949925186685208349/posts" target="blank"><i class="fa fa-google-plus"></i></a></li> 
			         <li> <a href="https://www.instagram.com/pixelbug.nitt/" target="blank"><i class="fa fa-instagram"></i></a></li> 
	         	</ul>
			</div>
	</div>
</footer>

</div>
</div>

<script>
	$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});
</script>


</body>
</html>