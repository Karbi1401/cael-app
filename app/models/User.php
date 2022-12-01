<?php

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Register user
  public function signup($data)
  {
    // Create query
    $this->db->query('INSERT INTO user
                      (user_first_name, 
                      user_last_name, 
                      user_email, 
                      user_contact,
                      user_address,
                      user_city,
                      user_username, 
                      user_password) 
                      VALUES 
                      (:first_name, 
                      :last_name, 
                      :email, 
                      :contact,
                      :address,
                      :city,
                      :username, 
                      :password)');

    // Bind values
    $this->db->bind(':first_name', $data['first_name']);
    $this->db->bind(':last_name', $data['last_name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':contact', $data['contact_number']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':city', $data['city']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Login User
  public function login($username, $password)
  {
    $this->db->query('SELECT * FROM user WHERE user_username = :username');
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
    $this->db->query('SELECT * FROM user WHERE user_email = :email');
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

  // Get user by ID
  public function getUserByID($id)
  {
    $this->db->query('SELECT * FROM user WHERE user_id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}
