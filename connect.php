<?php
   error_reporting(0);
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      function validData($x)
      {
         $x = trim($x);
         $x = stripslashes($x);
         $x = htmlspecialchars($x);
         return $x;
      }
      $conn = new mysqli("localhost", "root", "", "login");
      if(!$conn->connect_errno)
      {
         $username = validData($_POST["username"]);
         $password = validData($_POST["password"]);
         if(!empty($username) and !empty($password))
         {
            $sql = "SELECT * FROM login WHERE username=? and password=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            if($stmt->execute())
            {
               $result = $stmt->get_result();
               if($result->num_rows)
               {
                  $_SESSION['log'] = $username;
                  header('Location: login.php');
                  exit();
               }
               else
                  $err = "Wrong Username and/or Password";
            }
         }
      }
      $conn->close();
   }
?>