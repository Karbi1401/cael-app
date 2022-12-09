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
    $this->db->query('INSERT INTO users
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
    $this->db->query('SELECT * FROM users WHERE user_username = :username');
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
    $this->db->query('SELECT * FROM users WHERE user_email = :email');
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
    $this->db->query('SELECT * FROM users WHERE user_username = :username');
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

  public function findUserByUsernameAndID($username, $user_id)
  {
    $this->db->query('SELECT * FROM users WHERE user_username = :username AND user_id = :user_id');
    // Bind value
    $this->db->bind(':username', $username);
    $this->db->bind(':user_id', $user_id);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findUserByEmailAndID($email, $user_id)
  {
    $this->db->query('SELECT * FROM users WHERE user_email = :email AND user_id = :user_id');
    // Bind value
    $this->db->bind(':email', $email);
    $this->db->bind(':user_id', $user_id);

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
    $this->db->query('SELECT * FROM users WHERE user_id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function avatar($user_id, $user_image)
  {
    $this->db->query("UPDATE users SET user_image = :user_image
                      WHERE user_id = :user_id");

    $this->db->bind(':user_image', $user_image);
    $this->db->bind(':user_id', $user_id);

    $this->db->execute();

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function editUser($data)
  {
    $this->db->query("UPDATE users 
                      SET user_username = :user_username,
                      user_first_name = :user_first_name,
                      user_last_name = :user_last_name,
                      user_email = :user_email,
                      user_contact = :user_contact,
                      user_address = :user_address,
                      user_city = :user_city
                      WHERE user_id = :user_id");

    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':user_username', $data['username']);
    $this->db->bind(':user_first_name', $data['first_name']);
    $this->db->bind(':user_last_name', $data['last_name']);
    $this->db->bind(':user_email', $data['email']);
    $this->db->bind(':user_contact', $data['contact_number']);
    $this->db->bind(':user_address', $data['address']);
    $this->db->bind(':user_city', $data['city']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function editUserAsAdmin($data)
  {
    $this->db->query("UPDATE users 
                      SET user_username = :user_username,
                      user_first_name = :user_first_name,
                      user_last_name = :user_last_name,
                      user_email = :user_email,
                      user_contact = :user_contact,
                      user_address = :user_address,
                      user_city = :user_city,
                      user_role = :user_role
                      WHERE user_id = :user_id");

    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':user_username', $data['username']);
    $this->db->bind(':user_first_name', $data['first_name']);
    $this->db->bind(':user_last_name', $data['last_name']);
    $this->db->bind(':user_email', $data['email']);
    $this->db->bind(':user_contact', $data['contact_number']);
    $this->db->bind(':user_address', $data['address']);
    $this->db->bind(':user_city', $data['city']);
    $this->db->bind(':user_role', $data['role']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getAllUsers()
  {
    $this->db->query("SELECT * FROM users");

    $results = $this->db->resultSet();

    return $results;
  }

  public function addUser($data)
  {
    // Create query
    $this->db->query('INSERT INTO `users`
                      (`user_first_name`, 
                      `user_last_name`, 
                      `user_email`, 
                      `user_contact`, 
                      `user_address`, 
                      `user_city`, 
                      `user_username`, 
                      `user_password`, 
                      `user_role`) 
                      VALUES (:first_name,
                      :last_name,
                      :email,
                      :contact_number,
                      :address,
                      :city,
                      :username,
                      :password,
                      :role)');

    // Bind values
    $this->db->bind(':first_name', $data['first_name']);
    $this->db->bind(':last_name', $data['last_name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':contact_number', $data['contact_number']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':city', $data['city']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':role', $data['role']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
