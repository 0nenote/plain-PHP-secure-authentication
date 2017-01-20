<!DOCTYPE html>
<html>
<head>
<?php include '../app/views/header.php'; ?> 
</head>
<body>
	<div class="container">
     
      <form class="form-signin" action = "register" method = "post">
        <h2 class="form-signin-heading">Please sign up</h2>

        <input name = "username" type="text" class="input-block-level" placeholder="Name" required>
        <input name="phone" type="text" class="input-big bfh-phone" data-format="+31 (ddd) ddd-dddd" placeholder="Telephone Number">
        <input name = "email" type="email" class="input-block-level" placeholder="Email address" required>
        <input name = "pwd" type="password" class="input-block-level" placeholder="Password" required>
        <input name = "pwd2" type="password" class="input-block-level" placeholder="Password again" required>
        <button class="btn btn-large btn-primary" type="submit">Sign up</button>
      </form>
    </div> <!-- /container -->
</body>
</html>