
<?php

header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

?>

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
  <script type="text/javascript" src="js/flickity.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/flickity.css">

	<!--FONTS-->
	<link href='https://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
	<!--Style Sheet-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
	body{
		background-color: white;
	}

	footer{
		background-color:  #232323;
	}

	.sidebar-nav li a{
		color: white;
	}
</style>

</head>
<body>

<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div class="object" id="object_four"></div>
<div class="object" id="object_three"></div>
<div class="object" id="object_two"></div>
<div class="object" id="object_one"></div>

</div>
</div>
 
</div>



<!-- <nav class="navbar navbar-default navbar-fixed-top" >
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
                    <a href="{{action('PagesController@index')}}">HOME</a>
                </li><!-- 
                 <li>
                    <a href="index.html">ABOUT US</a>
                </li> -->
                <li>
                    <a href="{{action('PhotoController@RecentAlbumPhotos')}}">EDIT GALLERY</a>
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
<div class="container">
<div class="the-team">
	<br/><h2>EDIT TEAM</h2>
	<div id="member-panel">
		
	</div>
</div>
</div>


<footer>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
				
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


<!---AJAX for members-->

<script>
		$(window).load(function(){
		
		$.ajaxSetup({
  			headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			}
		});

		$.ajax({
			url: '{{action("MemberController@PostMap")}}',
			type: 'POST',
			data: '',
			success:function(data){
			$("#loading").fadeOut(500);
			 var json = JSON.parse(data);
			 var members = json['members'];
			 $.each(members,function(index,member){
			 	var url = '/storage/app/members/'+member['id'];
			 	var member_url = '/editmember/'+member['id'];
			 	/*var id = value['id'];
			 	document.getElementById('main').innerHTML += '<img src="'+url+'" height="200" width="200"/> <br/>';*/
			 	 
			 	$('#member-panel').append(
			 		'<div class="row">\
					 		<div class="col-md-3">\
						 		<img src="'+String(url)+'" height="200" width="200" style="border-radius:50%;border:2px solid grey;">\
						 	</div>\
						 	<div class="col-md-5 about-them">\
						 		<h3>'+String(member['member_name'])+'</h3>\
						 		'+String(member['member_dob'])+'\
						 		<h4>'+String(member['member_email'])+'</h4>\
						 		<br><a href='+String(member['member_fb'])+'><i class="fa fa-facebook"></i></a>\
						 		&nbsp;&nbsp;&nbsp;<a href='+String(member["member_photolink"])+'><i class="fa fa-instagram"></i></a>\
						 		<p style="text-align:center">'+String(member['member_description'])+'</p>\
					 	  <a href="'+String(member_url)+'"><button class="full-gallery">EDIT</button></a>\
						 	</div>\
						 	<div class="col-md-4">\
						 		<img src="'+String(member['map_url'])+'" height="200" width="200" style="border-radius:50%;border:2px solid grey;">\
						 	</div>\
						 </div>\
					<br/><hr style="border-width:5px"/>');

			 	console.log(member);
			 });
			},
			error:function(){
				alert('error');
			}



		});
	});
</script>


</body>
</html>