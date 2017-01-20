<?php


    // Variable
    $activeuser = 1;

    // Crear conexion
    $conn = new mysqli("localhost", "root", "", "dbe1kmonon1");

    // Comprobar que la conexion esta bien
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generar la query y ejecutarla
    $sql = "SELECT comment, date FROM comments WHERE users_id = " . $activeuser;
    $result = $conn->query($sql);

?>

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
    <div class="well well-lg">
        <ul>
        <?php
        // Comprobar que tienes filas
        if ($result->num_rows > 0) {
            // Sacar los datos de cada fila
            while($row = $result->fetch_assoc()) {

				echo $row["date"];
				echo "<li>".$row["comment"]."</li>";
            }
        } else {
            ?>
            <li> No comments.</li>
            <?php
        }
        ?>
        </ul>
    </div>
</div> <!-- /container -->
<div class="container">
    <form class="form-signin" method="post" action="sendmessage">
        <h2 class="form-signin-heading">Please comment</h2>
        <textarea name='comment' id='comment' cols="27" class="input-block-level" placeholder="Your comment..." required></textarea><br />
        <button class="btn btn-large btn-primary" type="submit">Submit</button>
    </form>
</div> <!-- /container -->


</body>
</html>

