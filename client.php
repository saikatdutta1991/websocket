<?php session_start(); require_once 'checkLogin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<html>
	<head>
	<title>WebSocket Chat</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">

	</head>
	
	<body onload="">
		
		<div class="container-fluid">
			<div class="jumbotron text-center">
			    <h1>My PHP Websocket Chat Client</h1>
			    <p>Designed by Saikat</p> 
			</div>
			
			<div class="row">
			    <div class="col-xs-8" id = "message-container">
			    	<div class = "chat-with">
			    		<h5>Saikat Dutta</h5>
			    	</div>
			    	<div  id = "message-body">
			    		
			    		
			    			<p class = "to pull-right">Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.<p>
			    		
						    
						
					    	<p class = "from pull-left">Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.<p> 



					    	<p class = "to pull-right">Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.<p>
			    		
						    
						
					    	<p class = "from pull-left">Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.<p> 
					    	<p class = "to pull-right">Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.<p>
			    		
						    
						
					    	<p class = "from pull-left">Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.<p> 
					    	<p class = "to pull-right">Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.<p>
			    		
						    
						
					    	<p class = "from pull-left">Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.Not sure how you'd do it with transitions, but you'd have to put the same selector at least.<p>  
					    

			    	</div>
			    	
			    	<div class="input-group" id = "message-field">
                		<input id="uploadname" type="text" class="form-control input-lg">
                		<span class="input-group-btn">
        					<button class="inline input-lg btn btn-primary" type="button">Send</button>
      					</span>
                		
            		</div>

			    </div>
			    <div class="col-xs-4 user" >
			      <div id = "list">
				      <a href="" class = "item-link"><div class = "item">
				      	<img src="images/item.png" class = "img-circle pull-left">
				      	<h3 class = "text-primary name">Saikat Dutta</h3>
				      </div></a>

				      <a href="" class = "item-link"><div class = "item">
				      	<img src="images/item.png" class = "img-circle pull-left">
				      	<h3 class = "text-primary name">Saikat Dutta</h3>
				      </div></a>
				      <a href="" class = "item-link"><div class = "item">
				      	<img src="images/item.png" class = "img-circle pull-left">
				      	<h3 class = "text-primary name">Saikat Dutta</h3>
				      </div></a>
				      <a href="" class = "item-link"><div class = "item">
				      	<img src="images/item.png" class = "img-circle pull-left">
				      	<h3 class = "text-primary name">Saikat Dutta</h3>
				      </div></a>
				      <a href="" class = "item-link"><div class = "item">
				      	<img src="images/item.png" class = "img-circle pull-left">
				      	<h3 class = "text-primary name">Saikat Dutta</h3>
				      </div></a>
				      <a href="" class = "item-link"><div class = "item">
				      	<img src="images/item.png" class = "img-circle pull-left">
				      	<h3 class = "text-primary name">Saikat Dutta</h3>
				      </div></a>

				      
				      
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
		background-color: #337AB7;
		color: white !Important;
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

	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		var socket;

		function init() 
		{
			var host = "ws://192.160.11.109:9003"; // SET THIS TO YOUR SERVER
			try 
			{
				socket = new WebSocket(host);
				log('WebSocket - status '+socket.readyState);
				socket.onopen    = function(msg) { 
										var json_msg = '{"mode" : "set", "name" : ""}';
									   	socket.send(json_msg);
								   };
				socket.onmessage = function(msg) { 
									   log("Received: "+msg.data); 
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
			var txt,msg;
			txt = $("msg");
			msg = txt.value;
			if(!msg) 
			{ 
				alert("Message can not be empty"); 
				return; 
			}

			txt.value="";
			txt.focus();
			try 
			{ 
				var to = $("to").value;
				var json_msg = '{"mode" : "post", "to" : "'+ to +'", "message" : "'+ msg +'"}';
				socket.send(json_msg); 
				log('Sent: '+msg); 
			} catch(ex) 
			{ 
				log(ex); 
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
		function $(id){ return document.getElementById(id); }
		function log(msg){ $("log").innerHTML+="<br>"+msg; }
		function onkey(event){ if(event.keyCode==13){ send(); } }
	</script>

</html>


