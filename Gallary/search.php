<?php
session_start();
if(isset($_SESSION['user_id']))
{
include_once "h1.php";
}else {
	include_once("home.php");
}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Webslesson Demo - Ajax Live Data Search using Jquery PHP MySql</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

		<style>
		   html,body{
                background-image: url('https://images.pexels.com/photos/2735739/pexels-photo-2735739.jpeg?cs=srgb&dl=arid-barren-camels-2735739.jpg&fm=jpg');
                background-size: cover;
                    background-repeat: no-repeat;
                  height: 100%;
                    font-family: 'Numans', sans-serif;
                    background-attachment: fixed;
       }
		</style>
	</head>
	<body>
		<div class="container">
			<br />
			<br />
			<br />
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="image name" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"searchpro.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>



