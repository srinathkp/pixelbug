<!DOCTYPE html>
<html>
<head>
	<title>Pixelbug</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<meta name="csrf-token" value="{{ csrf_token() }}">
	
</head>
<body>
	<div class="container" id="main">
	</div>

</body>
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
			 $.each(members,function(index,value){
			 	var id = value['id'];
			 	var url = '/storage/app/members/'+value['id'];
			 	document.getElementById('main').innerHTML += '<img src="'+url+'" height="200" width="200"/> <br/>';
			 });
			},
			error:function(){
				alert('error');
			}



		});
	});
</script>

</html>