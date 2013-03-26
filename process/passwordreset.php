<?php

include '../common/dbconnect.php';
include '../common/functions.php';
sec_session_start(); // Our custom secure way of starting a php session. 
 
if(isset($_POST['q'], $_POST['p'])) { 
   $email = strip_tags($_POST['email']);
   $username = strip_tags($_POST['username']);
   $sec_answer = $_POST['q'];
   $new_password = $_POST['p']; 

   if ($stmt = $mysqli->prepare("SELECT sec_answer, sec_salt, id FROM administrators WHERE email = ? AND username = ?")) {
      $stmt->bind_param('ss', $email, $username);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($db_sec_answer, $sec_salt, $user_id); 
      $stmt->fetch();

      $sec_answer = hash('sha512', $sec_answer.$sec_salt); // hash the password with the unique salt.

      if ($stmt->num_rows == 1) {

         if(checkbrute($user_id, $mysqli) == true) { 
               // Account is locked
               // Send an email to user saying their account is locked
            echo "Someone has attempted to reset the password 5 times now. this account has been locked for 2 hours.";
            header('Refresh: 5; url=../index.php');
         }

         if ($db_sec_answer == $sec_answer) {
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            // Create salted password (Careful not to over season)
            $new_password = hash('sha512', $new_password.$random_salt);

            if ($stmt = $mysqli->prepare("UPDATE administrators SET password = ?, salt = ? WHERE email = ? AND username = ?")) {
               $stmt->bind_param('ssss', $new_password, $random_salt, $email, $username);
               $stmt->execute();

               echo "Successfully reset password...";
               header('Refresh: 5; url=../index.php');
            } 
         }

         else {
            // Answer is not correct
            // We record this attempt in the database
            $now = time();
            $mysqli->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
            echo "Answer was incorrect. Password was not reset.";
            header('Refresh: 5; url=../index.php');
         }
      }
      else {
         echo "this user does not exist.";
         header('Refresh: 5; url=../index.php');
      }
   }
} else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
}
