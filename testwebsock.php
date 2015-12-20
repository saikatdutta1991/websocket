#!/usr/bin/env php
<?php

require_once('./websockets.php');

// class echoServer extends WebSocketServer {
//   //protected $maxBufferSize = 1048576; //1MB... overkill for an echo server, but potentially plausible for other applications.
  
//   protected function process ($user, $message) {
//     $this->send($user,$message);
//   }
  
//   protected function connected ($user) {
//     // Do nothing: This is just an echo server, there's no need to track the user.
//     // However, if we did care about the users, we would probably have a cookie to
//     // parse at this step, would be looking them up in permanent storage, etc.
//   }
  
//   protected function closed ($user) {
//     // Do nothing: This is where cleanup would go, in case the user had any sort of
//     // open files or other objects associated with them.  This runs after the socket 
//     // has been closed, so there is no need to clean up the socket itself here.
//   }
// }

// $echo = new echoServer("127.0.0.1","9001");

// try {
//   $echo->run();
// }
// catch (Exception $e) {
//   $echo->stdout($e->getMessage());
// }




class echoServer extends WebSocketServer 
{
  
  protected $usersList = array();
  
  protected function process ($user, $message) 
  {
      $msg = json_decode($message, true);
      
      switch($msg['mode'])
      {
        case 'set' :
                    $this->usersList[ $msg['name'] ] = $user;
                    break;

        case 'post' : 
                      $to = $msg['to'];
                      $txt = $msg['message'];

                      $this->send($this->usersList[$to], $txt);
                      break;
      }
  }
  
  protected function connected ($user) 
  {
    $this->stdout('client connected'); 
  }
  
  protected function closed ($user) 
  {
    $this->stdout('client gone off');
  }

}

$echo = new echoServer("192.160.11.109","9003");

try 
{
  $echo->run();
}
catch (Exception $e) 
{
  $echo->stdout($e->getMessage());
}

