<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" value="{{ csrf_token() }}">
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
</style>

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" >
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
</nav>

<div class="container">
<div class="the-team">
	<h2>TEAM</h2>
	<div id="member-panel">
		
	</div>
</div>
</div>

<!---Footer-->
<footer>
	<div class="container">
		<div class="col-md-8">
			
		</div>
		<div class="col-md-4">
				<h2>Find us!</h2>
					<ul class="social-icons icon-circle list-unstyled list-inline"> 
				   <li> <a href="#"><i class="fa fa-facebook"></i></a></li> 
				    <li> <a href="#"><i class="fa fa-youtube"></i></a></li>
			       <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
			        <li> <a href="#"><i class="fa fa-google-plus"></i></a></li> 
			         <li> <a href="#"><i class="fa fa-instagram"></i></a></li> 
	         	</ul>
			</div>
	</div>
</footer>
<!---AJAX for members-->

<script>
		$(document).ready(function(){
		
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
			 var json = JSON.parse(data);
			 var members = json['members'];
			 $.each(members,function(index,member){
			 	var url = '/storage/app/members/'+member['id'];
			 	/*var id = value['id'];
			 	document.getElementById('main').innerHTML += '<img src="'+url+'" height="200" width="200"/> <br/>';*/
			 	 
			 	$('#member-panel').append(
			 		'<div class="row">\
				 		<div class="col-md-3">\
					 		<img src="'+String(url)+'" height="300" width="300">\
					 	</div>\
					 	<div class="col-md-4">\
					 		<img src="'+String(member['map_url'])+'" height="300" width="300">\
					 	</div>\
					 	<div class="col-md-5 about-them">\
					 		<h3>'+String(member['member_name'])+'</h3>\
					 		<h4>'+String(member['member_email'])+'</h4>\
					 		<p style="text-align:center">'+String(member['description'])+'</p>\
					 	</div>\
					 </div>\
					<br/>');

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