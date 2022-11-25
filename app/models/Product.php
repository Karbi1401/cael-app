<?php

class Product
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getProduct()
  {
    $this->db->query('SELECT *,
                      category.category_name as categoryName
                      FROM product
                      INNER JOIN category
                      ON product.category_id = category.category_id
                      ORDER BY product.created_at ASC');

    $results = $this->db->resultSet();

    return $results;
  }

  public function getProductByID($id)
  {
    $this->db->query('SELECT *,
                      category.category_name as categoryName
                      FROM product
                      INNER JOIN category
                      ON product.category_id = category.category_id
                      WHERE product_id = :id
                      ORDER BY product.created_at ASC');

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function addProduct($data)
  {
    $this->db->query("INSERT INTO product 
                      (product_name,
                      product_price,
                      product_description,
                      product_image,
                      category_id) 
                      VALUES (:product_name,
                      :product_price,
                      :product_description,
                      :product_image,
                      :category_id)");

    $this->db->bind(':product_name', $data['product_name']);
    $this->db->bind(':product_price', $data['product_price']);
    $this->db->bind(':product_description', $data['product_description']);
    $this->db->bind(':product_image', $data['product_image']);
    $this->db->bind(':category_id', $data['category_id']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateProduct($data)
  {
    $this->db->query('UPDATE product 
                      SET product_name = :product_name, 
                      product_price = :product_price,
                      product_description = :product_description,             
                      category_id = :category_id 
                      WHERE product_id = :product_id');

    // Bind values
    $this->db->bind(':product_name', $data['product_name']);
    $this->db->bind(':product_price', $data['product_price']);
    $this->db->bind(':product_description', $data['product_description']);
    $this->db->bind(':category_id', $data['category_id']);
    $this->db->bind(':product_id', $data['id']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function editProductImage($data)
  {
    $this->db->query('UPDATE product SET product_image = :product_image WHERE product_id = :product_id');

    $this->db->bind(':product_image', $data['product_image']);
    $this->db->bind(':product_id', $data['id']);

    $row = $this->db->single();

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getProductByName($data)
  {
    $this->db->query('SELECT * FROM product WHERE product_name = :product_name');

    $this->db->bind(':product_name', $data['product_name']);

    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function changeProductStatusInactive($id)
  {
    $this->db->query('UPDATE product SET product_status = 0 WHERE product_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function changeProductStatusActive($id)
  {
    $this->db->query('UPDATE product SET product_status = 1 WHERE product_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteProduct($id)
  {
    $this->db->query('DELETE FROM product WHERE product_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
