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
}
