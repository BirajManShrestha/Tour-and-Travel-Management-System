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
            $sql = "SELECT * FROM users WHERE Username=? and Password=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            if($stmt->execute())
            {
               $result = $stmt->get_result();
               if($result->num_rows)
               {
                  $_SESSION['log'] = $username;
                  header('Location: welcome.php');
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
<HTML>
<HEAD>
<STYLE>
   .form{width: 280px; margin: auto; padding: 12px; border-left: 2px solid #ccc;
      border-radius: 18px;}
   h2{color: purple; text-align: center;}
   input{padding: 12px; width: 100%; margin-bottom: 12px; border: 0px;
      border-radius: 6px; background-color: #ccc;}
   button{margin: 14px 0px; width: 100%; background-color: #008080; color: white;
      padding: 12px; font-size: 1rem; border-radius: 6px;}
   p{text-align: center;}
   button:hover{cursor: pointer;}
   .red{text-align: center; color: red;}
</STYLE>
</HEAD>
<BODY>

<DIV class="form">
   <H2>Login</H2>
   <FORM name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <LABEL>Username
      <?php
         if(!empty($err))
            echo "<SPAN class=\"red\">*</SPAN>";
         else
            echo "*";
      ?></LABEL><BR>
      <INPUT type="text" name="username" placeholder="Enter Username" required><BR>
      <LABEL>Password
      <?php
         if(!empty($err))
            echo "<SPAN class=\"red\">*</SPAN>";
         else
            echo "*";
      ?></LABEL><BR>
      <INPUT type="text" name="password" placeholder="Enter Password" required><BR>
      <BUTTON type="submit">Login</BUTTON>
   </FORM>
   <?php
      echo "<DIV class=\"red\">"; 
      if(isset($err))
         echo $err;
      echo "</DIV>";
   ?>
   <P>Have not registered ? <a href="login.php">Register</a></P>
</DIV>

</BODY>
</HTML