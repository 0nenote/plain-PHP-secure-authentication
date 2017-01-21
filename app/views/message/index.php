<!DOCTYPE html>
<html>
<?php include '../app/views/header.php'; ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>
<div class="container">
   <h2>Messages of TestUser</h2>
        <?php
        // Comprobar que tienes filas
        if (count($this->getAllMessages()) > 0) {
            // Sacar los datos de cada fila
            foreach ($this->getAllMessages() as $message) {
                  echo  '<div class="well well-lg">';
                  echo  $message->getMessage() .'</br>';
                  echo '<p class="bg-info">'.$message->getDateAdded().'</p>';
                  echo ' </div>';
            }
        } else {
            ?>
            <p class="text-info">No messages to show</p>
            <?php
        }
        ?>
   
</div> <!-- /container -->
<div class="container">
    <form class="form-signin" method="post" action="../message/sendmessage">
        <h2 class="form-signin-heading">Add a message</h2>
        <textarea name='comment' id='comment' cols="27" class="input-block-level" placeholder="Your comment..." required></textarea><br />
        <div class="g-recaptcha" data-sitekey="6LclkxIUAAAAACElQa-YT3IoUfF0nbEtPFWtEODp" style="transform:scale(0.715);transform-origin:0 0;"></div>
          <button class="btn btn-large btn-primary" type="submit">Submit</button>
        </form>
      </div> <!-- /container -->


</body>
</html>

