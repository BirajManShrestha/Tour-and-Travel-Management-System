<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="bg-image"></div>
  <div class="container">
    <div class="form">
      <h1>Welcome</h1>
      <form action = "connect.php" method = "post">
        <input type="text" id="username" name="username" placeholder="Email">
        <input type="password" id="password" name="password" placeholder="Password">
        <div class="inside">
            <label>
                <input type="checkbox" name="remember-me"> Remember me
              </label>
      
              <a href="#" id="forgotPassword">Forgot password?</a><br>
        </div>
        <div class="btn">
            <button type="submit" class="button-8">Login</button>
        </div>
        <div class="signup">
          Don't have an account?<a href="#">Create account</a><br>
        </div>
        </form>
    </div>
  </div>
  <script src="login.js"></script>
</body>
</html>
