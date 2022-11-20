<?php

class Category
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getCategories()
  {
    $this->db->query("SELECT *,
											category.category_id as catID,
											category.category_name as categoryName,
											user.user_id as userID,
											category.category_status as categoryStatus,
											category.created_at as categoryCreated
											FROM category
											INNER JOIN user
											ON category.user_id = user.user_id
											ORDER BY category.created_at ASC
											");

    $results = $this->db->resultSet();

    return $results;
  }

  public function getCategoryByID($id)
  {
    $this->db->query('SELECT * FROM category WHERE category_id = :id');

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {
      return $row;
    } else {
      return false;
    }
  }

  public function findCategoryName($data)
  {
    $this->db->query('SELECT * FROM category WHERE category_name = :category_name');

    $this->db->bind(':category_name', $data['category_name']);

    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function addCategory($data)
  {
    $this->db->query("INSERT INTO 
            					category (category_name, user_id)
            					VALUES (:category_name, :user_id)");

    $this->db->bind(':category_name', $data['category_name']);
    $this->db->bind(':user_id', 1);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateCategory($data)
  {
    $this->db->query('UPDATE category SET category_name = :category_name WHERE category_id = :id');

    $this->db->bind(':id', $data['id']);
    $this->db->bind(':category_name', $data['category_name']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function changeCategoryStatusInactive($id)
  {
    $this->db->query('UPDATE category SET category_status = 0 WHERE category_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function changeCategoryStatusActive($id)
  {
    $this->db->query('UPDATE category SET category_status = 1 WHERE category_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteCategory($id)
  {
    $this->db->query('DELETE FROM category WHERE category_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
