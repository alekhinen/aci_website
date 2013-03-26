<?php

include 'common/dbconnect.php';
include 'common/functions.php';
 
if(isset($_POST['email'], $_POST['username'])) { 
   $email = strip_tags($_POST['email']);
   $username = strip_tags($_POST['username']); 

   if ($stmt = $mysqli->prepare("SELECT sec_question, email, username FROM administrators WHERE email = ? AND username = ?")) {
      $stmt->bind_param('ss', $email, $username);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($sec_question, $email, $username); 
      $stmt->fetch();

      if ($stmt->num_rows == 1) {
         include 'views/passwordreset.php';
      }
   }

} else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
}
