<?php
session_start();
require_once('../app/application.php');
require_once('../config/database.php');
$app = new Application();

if (isset($_SESSION['user'])) {
    echo "Hello " . $_SESSION['user']['username'];
}