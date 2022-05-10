<?php
class Address {
  private $db;
  private $id;
  private $user;
  private $street;
  private $number;
  private $extra;
  private $zipcode;
  private $region;
  private $commune;
  private $created_at;
  private $updated_at;

  function __construct() {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }

  function getUser() {
    return $this->user;
  }

  function getStreet() {
    return $this->street;
  }

  function getNumber() {
    return $this->number;
  }

  function getExtra() {
    return $this->extra;
  }

  function getZipcode() {
    return $this->zipcode;
  }

  function getRegion() {
    return $this->region;
  }

  function getCommune() {
    return $this->commune;
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

  function setUser($user) {
    $this->user = $user;
  }

  function setStreet($street) {
    $this->street = $street;
  }

  function setNumber($number) {
    $this->number = $number;
  }

  function setExtra($extra) {
    $this->extra = $extra;
  }

  function setZipcode($zipcode) {
    $this->zipcode = $zipcode;
  }

  function setRegion($region) {
    $this->region = $region;
  }

  function setCommune($commune) {
    $this->commune = $commune;
  }

  function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

  public function getAll() {
    $address = $this->db->query("SELECT A.*, R.name as region FROM address A JOIN region R ON A.region = R.id WHERE user = {$this->user}");
    return $address;
  }

  public function save() {
    $query = "INSERT INTO address (user, street, number, extra, zipcode, region, commune) VALUES ('{$this->user}', '{$this->street}', '{$this->number}', '{$this->extra}', '{$this->zipcode}', '{$this->region}', '{$this->commune}')";
    $save = $this->db->query($query);
    $result = false;
    if ($save) {
      $result = true;
    } else {
      die($query);
    }
    return $result;
  }

  public function delete() {
    $query = "DELETE FROM address WHERE id = {$this->id}";
    $delete = $this->db->query($query);
    $result = false;
    if ($delete) {
      $result = true;
    }
    return $result;
  }
}
