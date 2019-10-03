<!DOCTYPE html>
<html lang="en">
<html>
	<head>	
	<meta charset="utf-8">
	<title>Cat Farm <?php echo $version; ?></title>
	
	<style type="text/css">
		html, body
		{
			margin: 10;
			padding: 0;
		}	
		
		.msg_log{
			border: solid 1px #CCC;
			background-color:#EFEFEF;
			padding:10px;			
			width:60%;
			margin:auto auto;
		}
		#post_msg_box, #response_msg_box{
			background-color:white;			
			min-height:100px;
			border: solid 1px #CCC;			
			margin: 10px;
			padding: 10px;
		}
		
	</style>
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    	
		
	<script>
		$(function () {
			console.log('loaded');
		});	
		
		function CatAPI(action_name, type, url, post_data)
		{			
			jsonPretty = JSON.stringify(post_data, null, '   ');			
			
			$("#post_msg").html(action_name + ": " + type + " " + url + "\n" + jsonPretty );
			$("#response_msg").html("...");				
			
			$.ajax({
				type: type,
				url: url,
				data: JSON.stringify(post_data),
				contentType : 'application/json',
				headers: { "APIKEY": "MYKey" },
				success: function(result){
					
					// console.log(result);
					
					jsonObj = (typeof(result) != "object") ? jQuery.parseJSON( result ) : result;					
					// console.log(jsonObj);					
					
					jsonPretty = JSON.stringify(jsonObj, null, '   ');
					// console.log(jsonPretty);
					
					$("#response_msg").text(jsonPretty);
					
				}
			});
		}
		
		
	</script>	
		
	</head>
	
    <body>
        <h1>Cat Farm using {{ $version }}</h1>
					
		TASK: Create a REST API endpoint specification that manages cats on a cat farm — a basic implementation using a PHP microframework such as lumen.
Assume API keys are used to authenticate and that you be using JSON.
You should be able to manage a few aspects of a cat farm such as adding, editing and deleting cats, feeding cats and checking on cat statuses. 
 
		<br><br>
		
		
		<div class=''>
			Get Cats: <input type='button' id='get_cats' value='Get Cats'/>
			<br><br>
			
			Get Cat:
			<input type='text' id='get_cat_id' style='width:100px' placeholder='ID'>
			<input type='button' id='get_cat' value='Get Cat'/>
			<br><br>
			
			Add Cat:
			<input type='text' id='new_cat_name' style='width:100px' placeholder='Name'>
			<input type='button' id='add_cat' value='Add Cat'/>
			<br><br>
			
			Delete Cat:
			<input type='text' id='delete_cat_id' style='width:100px' placeholder='ID'>			
			<input type='button' id='delete_cat' value='Delete Cat'/>
			<br><br> 
			
			Update Cat:
			<input type='text' id='update_cat_id' style='width:100px' placeholder='ID'>
			<input type='text' id='update_cat_name' style='width:100px' placeholder='Name'>
			<input type='button' id='update_cat' value='Update Cat'/>
			<br><br> 
			
			Feed Cat:
			<input type='text' id='feed_cat_id' style='width:100px' placeholder='ID'>
			<input type='text' id='feed_cat_food_type' style='width:100px' placeholder='Food Type'>
			<input type='text' id='feed_cat_food_amount' style='width:100px' placeholder='Food Amount'>
			<input type='button' id='feed_cat' value='Feed Cat'/>
			<br><br> 
			
		</div>
		
		<div style='clear:both; width:75%; height:1px; border-top:solid 1px black; margin:10px auto 10px auto;'></div>
		
		<div class='msg_log'>
			REQUEST
			<div id='post_msg_box'>
				<pre id='post_msg'>
				</pre>			
			</div>
			RESPONSE
			<div id='response_msg_box'>
				<pre id='response_msg'>
				</pre>
			</div>
		</div>
		
		
		
		<script>
		
		$('#get_cats').on('click', function() { 
			CatAPI("GET CATS","GET","/api/cats", {} );
		});
		
		$('#get_cat').on('click', function() { 
			CatAPI("GET CAT","GET","/api/cat/" + + $('#get_cat_id').val() , {} );
		});
			
		
		$('#add_cat').on('click', function() { 			
			CatAPI("ADD CAT","POST","/api/cat", {name: $('#new_cat_name').val()} );
		});
		
		$('#delete_cat').on('click', function() { 			
			CatAPI("DELETE CAT","DELETE","/api/cat/" + $('#delete_cat_id').val() , {} );
		});
		
		$('#update_cat').on('click', function() { 			
			CatAPI("UPDATE CAT","PUT","/api/cat/" + $('#update_cat_id').val() , {name: $('#update_cat_name').val()} );
		});
		
		$('#feed_cat').on('click', function() { 			
			CatAPI("FEED CAT","PUT","/api/feed/" + $('#feed_cat_id').val(), {food_type: $('#feed_cat_food_type').val(), food_amount: $('#feed_cat_food_amount').val() } );
		});
		
		
				
		</script>
		
		
    </body>
</html>