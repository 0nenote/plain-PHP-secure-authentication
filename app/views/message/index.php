<!DOCTYPE html>
<html>
<?php include '../app/views/header.php'; ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>
<div class="container">
    <h2>Welcome <kbd> <?php if (isset($_SESSION['user'])) {
        echo $_SESSION['user']['name'];} ?></kbd></h2>
    <h4>last active <kbd><?php if (isset($_SESSION['user'])) {
        echo $_SESSION['user']['last_active'];} ?></kbd></h4>
    <?php include 'message_list.php'; ?>
</div> <!-- /container -->
<div class="container">
    <form class="form-signin" method="post" action="../message/sendmessage">
        <h2 class="form-signin-heading">Add a message</h2>
        <textarea name='comment' id='comment' cols="27" class="input-block-level" placeholder="Your comment..." required></textarea><br />
        <div class="g-recaptcha" data-sitekey="6LclkxIUAAAAACElQa-YT3IoUfF0nbEtPFWtEODp" style="transform:scale(0.715);transform-origin:0 0;"></div>
          <button class="btn btn-large btn-primary" type="submit">Submit</button>
        <a href="signout" class="btn btn-danger" role="button">Log out</a>
        </form>
      </div> <!-- /container -->


</body>
</html>

