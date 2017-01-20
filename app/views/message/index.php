<!DOCTYPE html>
<html>
<?php include '../app/views/header.php'; ?>

<body>
	<div class="container">
     
      <form class="form-signin" method="post" action="sendmessage">
        <h2 class="form-signin-heading">Please comment</h2>
        <textarea name='comment' id='comment' cols="27" class="input-block-level" placeholder="Your comment..." required></textarea><br />
        <button class="btn btn-large btn-primary" type="submit">Submit</button>
      </form>
    </div> <!-- /container -->

</body>

</html>

