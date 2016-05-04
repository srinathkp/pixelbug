<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pixelbug</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  

<script>
var success = 0;
$(window).load(function() {
  $("#loading").fadeOut(500);
  
});


  $(document).ready(function () {



  
$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: '{{$album_name}}',
      type: 'POST',
      data: '',
      success:function(data){
       //success =1;
       var json = JSON.parse(data);
       var photos = json['photos'];
       var count=0;
       $.each(photos,function(index,photo){
        var url = '/storage/app/photos/'+photo['id']+'.jpg';
        /*var id = value['id'];
        document.getElementById('main').innerHTML += '<img src="'+url+'" height="200" width="200"/> <br/>';*/
         
       // $('#gal1').append(
         // ' <img src="'+String(url)+'" width="400" data-fullsrc ="'+String(url)+'">');
        $("#"+count).attr('src', String(url));
        $("#"+count).attr('data-fullsrc', String(url));


        console.log(count);
        count++;
       });
       $('#gal1').galereya();
      },
      error:function(){
        alert('error');
      }



    });





 

});
</script>









  <script type="text/javascript" src="/js/jquery.flexisel.js"></script>
  <script type="text/javascript" src="/js/flickity.min.js"></script>
   <script type="text/javascript" src="/js/jquery.galereya.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/flickity.css">
<link rel="stylesheet" type="text/css" href="/css/jquery.galereya.css">

  <!--FONTS-->
  <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
  <!--Style Sheet-->
  <link rel="stylesheet" type="text/css" href="/css/style.css">

  <style type="text/css">
   body{
    padding-top: 20px;
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



<div id="wrapper">
 <div class="overlay"></div>
 <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li>
                    <a href="index.html">HOME</a>
                </li><!-- 
                 <li>
                    <a href="index.html">ABOUT US</a>
                </li> -->
                <li>
                    <a href="gallery.html">GALLERY</a>
                </li>
                <li>
                    <a href="map-index.html">TEAM</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->
<div id="page-content-wrapper">
      <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
      <span class="hamb-bottom"></span>
      </button>
      <div class="all-photo">
      <h2>{{$album_name}}</h2>
        
        <div id="gal1">
        @for($i=0;$i<$count;$i++)
       <img src="" width=400 data-fullsrc="" id={{$i}}>
        @endfor
        <img src='/storage/app/photos/3.jpg' width=400 data-fullsrc='/storage/app/photos/3.jpg'>
        </div>
                         
       

        
      </div>
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