<!DOCTYPE html>
<html>
<?php include '../app/views/header.php'; ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>
	<div class="container">
       <form class="form-signin" action = "login" method = "post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="input-block-level" placeholder="Email address" required name="email">
        <input type="password" name= "password"class="input-block-level" placeholder="Password" required>		
		<div class="g-recaptcha" data-sitekey="6LclkxIUAAAAACElQa-YT3IoUfF0nbEtPFWtEODp" style="transform:scale(0.715);transform-origin:0 0;"></div>
       <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        <p class="form-signin-heading"><br>New User? <a href="user/signup"> Register here</p>
      </form>
    </div> 
</body>
</html>