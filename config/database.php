<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {
    }

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
          $ini = parse_ini_file('app.ini');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host='.$ini['db_host'].';dbname='.$ini['db_name'],$ini['db_user'],$ini['db_pass'], $pdo_options);
      }
      return self::$instance;
    }
  }