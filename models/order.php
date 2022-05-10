<?php
class Order {
  private $db;
  private $id;
  private $buyer;
  private $total;
  private $status;
  private $created_at;
  private $updated_at;

  function __construct() {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }

  function getBuyer() {
    return $this->buyer;
  }

  function getTotal() {
    return $this->total;
  }

  function getStatus() {
    return $this->status;
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

  function setBuyer($buyer) {
    $this->buyer = $this->db->escape_string($buyer);
  }

  function setTotal($total) {
    $this->total = $this->db->escape_string($total);
  }

  function setStatus($status) {
    $this->status = $this->db->escape_string($status);
  }

  function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

  public function getAll() {
    $orders = $this->db->query("SELECT * FROM order WHERE buyer = {$this->id} ORDER BY id DESC");
    return $orders;
  }

  public function save() {
    $query = "INSERT INTO order (buyer, total, status) VALUES ('{$this->buyer}', '{$this->total}', '{$this->status}')";
    $save = $this->db->query($query);
  }
}
