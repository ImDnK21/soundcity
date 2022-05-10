<?php
class Album {
  private $db;

  private $id;
  private $author;
  private $title;
  private $description;
  private $cover_path;
  private $price;
  private $stock;
  private $status;
  private $year;
  private $length;
  private $spotify;
  private $youtube;
  private $created_at;
  private $updated_at;

  function __construct() {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }

  function getAuthor() {
    return $this->author;
  }

  function getTitle() {
    return $this->title;
  }

  function getDescription() {
    return $this->description;
  }

  function getCoverPath() {
    return $this->cover_path;
  }

  function getPrice() {
    return $this->price;
  }

  function getStock() {
    return $this->stock;
  }

  function getStatus() {
    return $this->status;
  }

  function getYear() {
    return $this->year;
  }

  function getLength() {
    return $this->length;
  }

  function getSpotify() {
    return $this->spotify;
  }

  function getYoutube() {
    return $this->youtube;
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

  function setAuthor($author) {
    $this->author = $author;
  }

  function setTitle($title) {
    $this->title = $title;
  }

  function setDescription($description) {
    $this->description = $description;
  }

  function setCoverPath($cover_path) {
    $this->cover_path = $cover_path;
  }

  function setPrice($price) {
    $this->price = $price;
  }

  function setStock($stock) {
    $this->stock = $stock;
  }

  function setStatus($status) {
    $this->status = $status;
  }

  function setYear($year) {
    $this->year = $year;
  }

  function setLength($length) {
    $this->length = $length;
  }

  function setSpotify($spotify) {
    $this->spotify = $spotify;
  }

  function setYoutube($youtube) {
    $this->youtube = $youtube;
  }

  function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

  public function getAll() {
    $albums = $this->db->query("SELECT album.*, author.name AS author FROM album JOIN author ON album.author = author.id WHERE stock > 0 ORDER BY album.title");
    return $albums;
  }

  public function getFiltered($filter) {
    $albums = $this->db->query("SELECT album.*, author.name AS author FROM album JOIN author ON album.author = author.id WHERE " . $filter .  " AND stock > 0 ORDER BY album.title");
    return $albums;
  }

  public function getLatest($max) {
    $albums = $this->db->query("SELECT album.*, author.name AS author FROM album JOIN author ON album.author = author.id WHERE stock > 0 ORDER BY album.created_at DESC LIMIT $max");
    return $albums;
  }

  public function getSortered($sort) {
    $albums = $this->db->query("SELECT album.*, author.name AS author FROM album JOIN author ON album.author = author.id WHERE stock > 0 ORDER BY " . $sort);
    return $albums;
  }

  public function getSingle() {
    $query = "SELECT album.*, author.name AS author FROM album JOIN author ON album.author = author.id WHERE album.id = {$this->getId()} AND stock > 0 LIMIT 1";
    $album = $this->db->query($query);
    if ($album->num_rows > 0) {
      return $album->fetch_object();
    } else {
      header('Location:' . APP_URL . 'admin/manageProducts');
    }
  }

  public function save() {
    $query = "INSERT INTO album (author, title, description, cover_path, price, stock, status, year, length, spotify, youtube) VALUES ('{$this->author}', '{$this->title}', '{$this->description}', '{$this->cover_path}', '{$this->price}', '{$this->stock}', '{$this->status}', '{$this->year}', '{$this->length}', '{$this->spotify}', '{$this->youtube}')";
    $save = $this->db->query($query);
    $result = false;
    if ($save) {
      $result = true;
    } else {
      die($query);
    }
    return $result;
  }

  public function update() {
    $query = "UPDATE album SET author = '{$this->author}', title = '{$this->title}', description = '{$this->description}', price = '{$this->price}', stock = '{$this->stock}', status = '{$this->status}', year = '{$this->year}', length = '{$this->length}', spotify = '{$this->spotify}', youtube = '{$this->youtube}'";

    if ($this->getCoverPath() != null) {
      $query .= ", cover_path = '{$this->cover_path}'";
    }

    $query .= " WHERE id = '{$this->id}'";

    // var_dump($_FILES);
    // echo '<br>';
    // var_dump($_POST);
    // die();

    $update = $this->db->query($query);
    $result = false;
    if ($update) {
      $result = true;
    } else {
      die($query);
    }
    return $result;
  }

  public function delete() {
    $query = "DELETE FROM album WHERE id = {$this->id}";
    // die();  
    $delete = $this->db->query($query);
    $result = false;
    if ($delete) {
      $result = true;
    }
    return $result;
  }
}
