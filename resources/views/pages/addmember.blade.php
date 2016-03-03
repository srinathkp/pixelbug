<!DOCTYPE html>
<html>
<head>
	<title>Add a member</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<meta name="csrf-token" value="{{ csrf_token() }}">
	<style>
	#profilepic{
		border-radius: 20%;
	}
	</style>
</head>
<body>
	<div class="container" style="padding:5%;">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Add Member</h4>
			</div>
			<div class="panel-body">
				
				<form id="member_form" method="POST" enctype='multipart/form-data' action="{{action('MemberController@PostCreate')}}">

				  	<div class="form-group">
				    	<label for="name">Name: </label>
 				    	<input type="text" class="form-control" id="name" name="name">
  				  	</div>
  					<div class="form-group">
					    <label for="city">City: </label>
    					<input type="text" class="form-control" id="city" name="city">
  					</div>
  					<div class="form-group">
					    <label for="pincode">Pincode: </label>
    					<input type="number" class="form-control" id="pincode" name="pincode">
  					</div>
  					<div class="form-group">
					    <label for="contact">Contact: </label>
    					<input type="number" class="form-control" id="contact" name="contact">
  					</div>
  					<div class="form-group">
					    <label for="email">E-Mail: </label>
    					<input type="email" class="form-control" id="email" name="email">
  					</div>
  					<div class="form-group">
					    <label for="profile_pic">Profile Picture: </label>
    					<input type="file" class="form-control" id="profile_pic" name="profile_pic">
  					</div>
  					<div class="form-group">
  						<div class="row">
						    <div class="col-sm-4"></div>
						    <div class="col-sm-3">
						    	<img src="" id="profilepic" width="200" height="200" style="display:none;" />
  							</div>
  							<div class="col-sm-4"></div>
  						</div>
  					</div>
				  <button type="submit" class="btn btn-default" id="submitform">Submit</button>
				</form>

			</div>
		</div>
	</div>
</body>

<script>
	$(document).ready(function(){
		var img;
		$('#profile_pic').change( function(event) {
    		img = event.target.files[0];
    		$("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
			//alert(img_url);			
		});
	});
</script>
</html>