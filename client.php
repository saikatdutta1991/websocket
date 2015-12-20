<!DOCTYPE html>
<html lang="en">
<html>
	<head>
	<title>WebSocket</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">

	</head>
	
	<body onload="">
		
		<div class="container-fluid">
			<div class="jumbotron text-center">
			    <h1>My PHP Websocket Chat Client</h1>
			    <p>Designed by Saikat</p> 
			</div>
			
			<div class="row">
			    <div class="col-xs-8">
			    	<div  id = "message-body">
			    		<h3>Column 1</h3>
					      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...Lorem ipsum dolor sit amet, consectetur adipisicing elit...Lorem ipsum dolor sit amet, consectetur adipisicing elit...Lorem ipsum dolor sit amet, consectetur adipisicing elit...Lorem ipsum dolor sit amet, consectetur adipisicing elit...v</p>
					      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
			    	</div>
			    </div>
			    <div class="col-xs-4 user" >
			      <div id = "list">
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>

				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
				      <h3>Column 2</h3>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
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
	.jumbotron {
    padding-top: 1px;
    padding-bottom: 5px;
}
	.row > div{
	    margin-top:10px;
	    padding: 20px;
	    outline: 2px solid #ccc;
	    outline-offset: -10px;
	    -moz-outline-radius: 10px;
	    -webkit-outline-radius: 10px;
 	}

 	#message-body {
 		height:  100% !Important;
 	}

 	.user{
 		height: 450px;
 		padding: 20px !Important;
 	}

 	#list {
 		height: 400px;
    	overflow-y: scroll;

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


