<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Guestbook</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link href="../css/styles.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.css"></script>
</head>

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

