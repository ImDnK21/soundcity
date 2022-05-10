<?php 
class Account {
  private $db;
  private $id;
  private $role;
  private $rut;
  private $firstname;
  private $lastname;
  private $email;
  private $password;
  private $created_at;
  private $updated_at;

  function __construct() {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }

  function getRole() {
    return $this->role;
  }

  function getRut() {
    return $this->rut;
  }

  function getFirstname() {
    return $this->firstname;
  }

  function getLastname() {
    return $this->lastname;
  }

  function getEmail() {
    return $this->email;
  }

  function getPassword() {
    return password_hash($this->db->escape_string($this->password), PASSWORD_DEFAULT);
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

  function setRole($role) {
    $this->role = $this->db->escape_string($role);
  }

  function setRut($rut) {
    $this->rut = $this->db->escape_string($rut);
  }

  function setFirstname($firstname) {
    $this->firstname = $this->db->escape_string($firstname);
  }

  function setLastname($lastname) {
    $this->lastname = $this->db->escape_string($lastname);
  }

  function setEmail($email) {
    $this->email = $this->db->escape_string($email);
  }

  function setPassword($password) {
    $this->password = $password;
  }

  function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

  // public function getAll() {
    // $account = "SELECT id, role, rut, firstname, lastname, email, created_at, updated_at FROM user WHERE id = {$this->id}";
    // return $account;
  // }

  public function save() {
    $query = "INSERT INTO user (rut, firstname, lastname, email, password) VALUES ('{$this->getRut()}', '{$this->getFirstname()}', '{$this->getLastname()}', '{$this->getEmail()}', '{$this->getPassword()}')";
    $save = $this->db->query($query);
    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function update() {
    $query = "UPDATE user SET firstname = '{$this->getFirstname()}', lastname = '{$this->getLastname()}' WHERE id = {$this->id}";
    $update = $this->db->query($query);
    $result = false;
    if ($update) {
      $result = true;
    } else {
      die($query);
    }
    return $result;
  }

  public function login() {
    $result = false;
    $email = $this->email;
    $password = $this->password;

    $query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";
    $login = $this->db->query($query);

    if ($login && $login->num_rows == 1) {
      $account = $login->fetch_object();
      if (password_verify($password, $account->password)) {
        $result = $account;
      }
    }
    return $result;
  }
}
