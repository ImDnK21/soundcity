<?php
class Region {
  private $db;
  private $id;
  private $name;

  function __construct() {
    $this->db = Database::connect();
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getAll() {
    $authors = $this->db->query("SELECT * FROM region ORDER BY name");
    return $authors;
  }
}
