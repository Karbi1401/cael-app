<?php

class Admin
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Login Admin
  public function login($username, $password)
  {
    $this->db->query('SELECT * FROM user WHERE user_username = :username AND user_role = "admin"');
    $this->db->bind(':username', $username);

    $row = $this->db->single();

    $hashed_password = $row->user_password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Find user by email
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM user WHERE user_email = :email AND user_role = "user"');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Find user by username
  public function findUserByUsername($username)
  {
    $this->db->query('SELECT * FROM user WHERE user_username = :username');
    // Bind value
    $this->db->bind(':username', $username);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Find user role if admin
  public function findUserByRole($username)
  {
    $this->db->query("SELECT user_role FROM user WHERE user_username = :username");
    // Bind value
    $this->db->bind(':username', $username);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      if ($row->user_role == 'admin') {
        return true;
      }
    } else {
      return true;
    }
  }
}
