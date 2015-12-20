<?php 
session_start(); 
require_once 'checkLogin.php';
require 'DBConnection.php';
$result = getAll();
//$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<html>
	<head>
	<title>WebSocket Chat</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	</head>
	
	<body onload="init()">	
		
		<div class="container-fluid">
			<div class="jumbotron text-center">
			    <h1>My PHP Websocket Chat Client</h1>
			    <p>Designed by Saikat</p> 
			</div>
			
			<div class="row">
			    <div class="col-xs-8" id = "message-container">
			    	<div class = "chat-with">
			    		<h5>Inbox</h5>
			    	</div>
			    	<div  id = "message-body">
			    		


			    	</div>
			    	
			    	<div class="input-group" id = "message-field">
                		<input id="msg" type="text" class="form-control input-lg">
                		<input id="to" type="hidden" value="">
                		<span class="input-group-btn">
        					<button class="inline input-lg btn btn-primary" id="send" onclick="send();" type="button">Send</button>
      					</span>
                		
            		</div>

			    </div>
			    <div class="col-xs-4 user" >
			      <div id = "list">
				      
				      <?php 

				      	while($row = $result->fetch_assoc())
				      	{
				      		if($row['id'] != $_SESSION['id'])
				      		echo '<a href="#" class = "item-link"><input type = "hidden" value = "'. $row['id'] .'">
				      				<div class = "item">
				      					<img src="images/item.png" class = "img-circle pull-left">
				      					<h3 class = "text-primary name">'. $row['name'] .'</h3>
				      			</div></a>';
				      	}

				      ?>

				      
			      </div>
			    </div>
			</div>

		</div>


		<!-- <div id="log"></div>
		<input id="msg" type="textbox" onkeypress="onkey(event)"/>
		<button onclick="send()">Send</button>
		<button onclick="quit()">Quit</button>
		<button onclick="reconnect()">connect</button> -->
		
	</body>

	<style type="text/css">

	.to{
		width: 80%;
		background-color: red;
		padding: 10px;
	}

	.from{
		width: 80%;
		padding: 10px;
		background-color: green;
	}

	

	.chat-with{
		margin-top: -10px;
    background-color: rgb(238, 238, 238);
    padding: 1px;
    margin-left: -11px;
    margin-right: -11px;
	}
	.img-circle{
		border-radius: 100%;
		padding: 5px;
	}


	.item{
		height: 90px;
		border-radius: 6px;
    	background-color: rgb(238, 238, 238);
    	margin-right: 10px;
    	margin-bottom: -12px;
	}

	.item-link{
		text-decoration: none !Important;
	}

	.item:hover, .item:hover > .text-primary{
		height: 90px;
		border-radius: 6px;
		background-color: #337AB7;
		color: white !Important;
		margin-right: 10px;
    	margin-bottom: -12px;
	}


	.name{
		padding-top: 34px;
    	padding-left: 99px;
	}


	.jumbotron {
	    padding-top: 1px;
	    padding-bottom: 5px;
		margin-bottom : -5px;
	}

	.row {
	    margin-right: -10px;
	    margin-left: -10px;
	}

	.row > div{
	    margin-top:10px;
	    padding: 20px;
	    outline: 2px solid #ccc;
	    outline-offset: -10px;
	    -moz-outline-radius: 10px;
	    -webkit-outline-radius: 10px;
	    
	
 	}

 	#message-container {
 		height:  450px !Important;
 	}

 	#message-field{
 		margin-left: -11px;
    	margin-right: -11px;
 	}

 	#message-body {
 		height: 349px !Important;
 		overflow-y : scroll;
 		border-radius: 5px;
 		margin-left: -11px;
    	margin-right: -11px;
 		/*border-style: solid;*/
 		/*border-color: rgba(0, 220, 255, 0.62);*/
 	}

 	.user{
 		height: 450px;
 		padding: 20px !Important;
 	}

 	#list {
 		height: 400px;
    	overflow-y: scroll;
    	margin-top: -7px;
 	}
 	


	</style>

	
  	<script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		var socket;

		function init() 
		{
			var host = "ws://192.160.11.106:9050"; // SET THIS TO YOUR SERVER
			try 
			{
				socket = new WebSocket(host);
				log('WebSocket - status '+socket.readyState);
				socket.onopen    = function(msg) { 
										var json_msg = '{"Mode" : "set", "Id" : "<?= $_SESSION['id']?>"}';
									   	socket.send(json_msg);
								   };
				socket.onmessage = function(msg) { 
										var message = JSON.parse(msg.data);

										if(message['From'] == document.getElementById('to').value)
										{
											var p = document.createElement('p');
											p.textContent	 =  message['Message'];
											p.setAttribute('class', 'from pull-left');

											document.getElementById('message-body').appendChild(p);
										}	
										else{
											var pop_msg = msg.data;
											alert(pop_msg);
										}
								
								   };
				socket.onclose   = function(msg) { 
									   log("Disconnected - status "+this.readyState); 
								   };
			}
			catch(ex)
			{ 
				log(ex); 
			}
			$("msg").focus();
		}

		function send()
		{
			var msg;

			msg = document.getElementById('msg');
			
			if(!msg.value) 
			{ 
				alert("Message can not be empty"); 
				return; 
			}

			try 
			{ 
				var to = document.getElementById('to').value;

				var json_msg = '{"Mode" : "post", "To" : "'+ to +'", "Message" : "'+ msg.value +'", "From" : "<?= $_SESSION['id'] ?>"}';
				
				socket.send(json_msg); 

				var p = document.createElement('p');
				p.textContent	 =  msg.value;
				p.setAttribute('class', 'to pull-right');

				document.getElementById('message-body').appendChild(p);


				msg.value="";
				msg.focus();


			} catch(ex) 
			{ 
				console.log(ex); 
			}
		}

		function quit()
		{
			if (socket != null) {
				log("Goodbye!");
				socket.close();
				socket=null;
			}
		}

		function reconnect() 
		{
			quit();
			init();
		}

		// Utilities
		//function $(id){ return document.getElementById(id); }
		function log(msg){ $("log").innerHTML+="<br>"+msg; }
		function onkey(event){ if(event.keyCode==13){ send(); } }

		
	</script>


	<script>
		 $(document).ready(function(){
  			$('.item-link').click(function(){
  				
  				$('#to').val($(this).children('input').val());  

    			$('.to').detach();
    			$('.from').detach();
    			return false;
  			});
		});

	</script>

</html>


