<?php

class Rider
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllRider()
  {
    $this->db->query("SELECT * FROM riders");

    $riders = $this->db->resultSet();

    if ($riders) {
      return $riders;
    } else {
      return false;
    }
  }

  public function addRider($data)
  {
    $this->db->query('INSERT INTO riders
                      (rider_first_name, 
                      rider_last_name, 
                      rider_email, 
                      rider_contact,
                      rider_address,
                      rider_city,
                      rider_username, 
                      rider_password) 
                      VALUES 
                      (:first_name, 
                      :last_name, 
                      :email, 
                      :contact,
                      :address,
                      :city,
                      :username, 
                      :password)');

    $this->db->bind(':first_name', $data['first_name']);
    $this->db->bind(':last_name', $data['last_name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':contact', $data['contact_number']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':city', $data['city']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function findRiderByEmail($email)
  {
    $this->db->query('SELECT * FROM riders WHERE rider_email = :email');

    $this->db->bind(':email', $email);

    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findRiderByUsername($username)
  {
    $this->db->query('SELECT * FROM riders WHERE rider_username = :username');

    $this->db->bind(':username', $username);

    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function getRiderByID($id)
  {
    $this->db->query('SELECT * FROM riders WHERE rider_id = :id');

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}
