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
		border-radius: 20%;
	}
	</style>
</head>
<body>
	<div class="container" style="padding:5%;">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Edit Photo</h4>
			</div>
			<div class="panel-body">
				
				<form id="photo_form" method="POST" enctype='multipart/form-data'>

				  	<div class="form-group">
				    	<label for="photo_name">Photo Name: </label>
 				    	<input type="text" class="form-control" id="photo_name" name="photo_name" value= {{$photo->photo_name}}>
  				  	</div>
  					<div class="form-group">
					    <label for="album">Album Name: </label>
    					<input type="text" class="form-control" id="album" name="album" value={{ $photo->album }}>
  					</div>

  					<div class="form-group">
  						<div class="row">
						    <div class="col-sm-4"></div>
						    <div class="col-sm-3">
						    	<img id="photo" width="200" height="200" src="/storage/app/photos/{{$photo->id}}.jpg" />
  							</div>
  							<div class="col-sm-4"></div>
  						</div>
  					</div>
  					
  				 <button type="submit" class="btn btn-default" id="submitform">Edit</button>
				</form>

				
			</div>
		</div>
  				 <a href={{action('PhotoController@GetDelete',['id'=>$photo->id])}}>
  				 	<button type="submit" class="btn btn-default" id="submitform">Delete</button>
				</a>
	</div>
</body>

<script>
	$(document).ready(function(){
	


		$.ajaxSetup({
  			headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			}
		});

		$('photo_form').submit(function(e){

		var postData = $(this).serializeArray();	
		$.ajax({
		        url: "{{action('PhotoController@PostEdit')}}",
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