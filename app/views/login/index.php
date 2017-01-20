<!DOCTYPE html>
<html>
<?php include '../app/views/header.php'; ?>

<body>
	<div class="container">
      <form class="form-signin" action="login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="input-block-level" placeholder="Email address" required name="email">
        <input type="password" name= "password"class="input-block-level" placeholder="Password" required>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        <p class="form-signin-heading"><br>New User? <a href="register/index"> Register here</p>
      </form>
    </div> <!-- /container -->
</body>

</html>