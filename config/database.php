<?php
class Database {
  public static function connect() {
    $db = new mysqli('sql102.epizy.com', 'epiz_31661753', 'MqzVN0Q7EWAcG', 'epiz_31661753_database');
    $db->query("SET NAMES 'utf8'");
    return $db;
  }
}
