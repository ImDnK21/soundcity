<?php
class Author {
  private $db;
  private $id;
  private $name;
  private $created_at;
  private $updated_at;

  function __construct() {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }

  function getName() {
    return $this->name;
  }

  function getCreatedAt() {
    return $this->created_at;
  }

  function getUpdatedAt() {
    return $this->updated_at;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setName($name) {
    $this->name = $this->db->escape_string($name);
  }

  function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

  public function getAll() {
    $authors = $this->db->query("SELECT * FROM author ORDER BY name");
    return $authors;
  }

  public function getSortered($sort) {
    $authors = $this->db->query("SELECT * FROM author ORDER BY " . $sort);
    return $authors;
  }

  public function getAuthorName($id) {
    $author = $this->db->query("SELECT name FROM author WHERE id = $id");
    return $author->fetch_object();
  }

  public function save() {
    $query = "INSERT INTO author (name) VALUES ('{$this->name}')";
    $save = $this->db->query($query);
    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function delete() {
    $query = "DELETE FROM author WHERE id = {$this->id}";
    $delete = $this->db->query($query);
    $result = false;
    if ($delete) {
      $result = true;
    }
    return $result;
  }
}
