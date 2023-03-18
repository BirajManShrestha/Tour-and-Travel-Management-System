<?php 
   session_start();
   
   if(isset($_SESSION['log']))
   {
      echo "Welcome!<BR>";
      echo "You are an authorized person.";
      
      // block of code, to process further...
   }
   else
   {
      header('Location: login.html');
      exit();
   }
   
   // block of code, to process further...
?>