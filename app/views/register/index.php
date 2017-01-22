<!DOCTYPE html>
<html>
<?php include '../app/views/header.php'; ?> 
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>
	<div class="container">
     
      <form class="form-signin" action = "register" method = "post">
        <h2 class="form-signin-heading">Please sign up</h2>

        <input name = "username" type="text" class="input-block-level" placeholder="Name" required>
        <input name="phone" type="text" class="input-big bfh-phone"  placeholder="Telephone Number">
        <input name = "email" type="email" class="input-block-level" placeholder="Email address" required >
        <input name = "pwd" type="password" class="input-block-level" placeholder="Password" required autocomplete="off">
        <input name = "pwd2" type="password" class="input-block-level" placeholder="Password again" required autocomplete="off">
        <div class="g-recaptcha" data-sitekey="6LclkxIUAAAAACElQa-YT3IoUfF0nbEtPFWtEODp" style="transform:scale(0.715);transform-origin:0 0;"></div>
        <button  class="btn btn-success" type="submit">Register</button>
      </form>
    </div> <!-- /container -->
</body>
</html>