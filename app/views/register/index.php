<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link href="../css/styles.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.css"></script>
</head>

<body>
	<div class="container">
     
      <form class="form-signin" action = "register" method = "post">
        <h2 class="form-signin-heading">Please sign up</h2>
        <input name = "username" type="text" class="input-block-level" placeholder="Name" required>
        <input name = "phone" type="tel" class="input-block-level" placeholder="Telephone Number" required>
        <input name = "email" type="email" class="input-block-level" placeholder="Email address" required>
        <input name = "pwd" type="password" class="input-block-level" placeholder="Password" required>
        <input name = "pwd2" type="password" class="input-block-level" placeholder="Password again" required>
        <button class="btn btn-large btn-primary" type="submit">Sign up</button>
      </form>
    </div> <!-- /container -->
</body>

</html>