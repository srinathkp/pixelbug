<!DOCTYPE html>
<html>
<head>
	<title>Pixelbug</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<meta name="csrf-token" value="{{ csrf_token() }}">
	<style>
	#photo{
		border-radius: 0%;
	}
	</style>
</head>
<body>
	<div class="container" style="padding:5%;">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Add Photo</h4>
			</div>
			<div class="panel-body">
				
				<form id="photo_form" method="POST" enctype='multipart/form-data'>

				  	<div class="form-group">
				    	<label for="photo_name">Photo Name: </label>
 				    	<input type="text" class="form-control" id="photo_name" name="photo_name">
  				  	</div>
  					<div class="form-group">
					    <label for="album">Album Name: </label>
    					<input type="text" class="form-control" id="album" name="album">
  					</div>
  					<div class="form-group">
					    <label for="photo">Photo: </label>
    					<input type="file" class="form-control" id="photo" name="photo">
  					</div>
  					<div class="form-group">
  						<div class="row">
						    <div class="col-sm-4"></div>
						    <div class="col-sm-3">
						    	<img src="" id="photo" width="200" height="200" style="display:none;" />
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
		$('#photo').change( function(event) {
    		img = event.target.files[0];
    		$("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
			//alert(img_url);			
		});


		$.ajaxSetup({
  			headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			}
		});

		$('photo_form').submit(function(e){

		var postData = $(this).serializeArray();	
		$.ajax({
		        url: "{{action('PhotoController@PostAdd')}}",
		        type:"POST",
		        data: postData,
		        success:function(data){
		          	alert(data);
		        },
		        error:function(){ 
		            alert("error!");
		        }
	    	});
		$('photo_form').submit();

		});
	  	
	});
</script>
</html>