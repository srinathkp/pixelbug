<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Pixelbug</title>
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="margin-top:5%;">
		<div class="panel panel-default">
			<div class="panel-heading">
			Image Upload
			</div>
			<div class="panel-body">
				<form method="POST" url="{{action('StorageController@storeImage')}}" enctype="multipart/form-data" files="true">
					
					{{csrf_field()}}
	  				<fieldset class="form-group">
	    				<label for="image">Choose image</label>
	    				<input type="file" class="form-control" id="image" name="image" required>
	    				<small class="text-muted">We'll upload it to Dropbox</small>
	  				</fieldset>
	  			
	  				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
	  		</div>
		</div>
	</div>
</body>
</html>