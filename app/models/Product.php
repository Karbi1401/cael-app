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
                      categories.category_name as categoryName
                      FROM products
                      INNER JOIN categories
                      ON products.category_id = categories.category_id
                      ORDER BY products.created_at ASC');

    $results = $this->db->resultSet();

    return $results;
  }

  public function getProductByID($id)
  {
    $this->db->query('SELECT *,
                      products.product_id as productID,
                      categories.category_id as categoryID,
                      categories.category_name as categoryName
                      FROM products 
                      INNER JOIN categories
                      ON products.category_id = categories.category_id
                      WHERE product_id = :id');

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function addProduct($data)
  {
    $this->db->query("INSERT INTO products
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
    $this->db->query('UPDATE products 
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
    $this->db->query('UPDATE products SET product_image = :product_image WHERE product_id = :product_id');

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
    $this->db->query('SELECT * FROM products WHERE product_name = :product_name');

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
    $this->db->query('UPDATE products SET product_status = 0 WHERE product_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function changeProductStatusActive($id)
  {
    $this->db->query('UPDATE products SET product_status = 1 WHERE product_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteProduct($id)
  {
    $this->db->query('DELETE FROM products WHERE product_id = :id');

    $this->db->bind(':id', $id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getProductByStatus()
  {
    $this->db->query('SELECT * FROM products WHERE product_status = 1 ORDER BY created_at ASC');

    $results = $this->db->resultSet();

    return $results;
  }

  public function getProductByCategory($id)
  {
    $this->db->query('SELECT *,
                      products.product_id as productID,
                      products.category_id as tblproductCategoryID,
                      categories.category_id as tblcategoryCategoryID
                      FROM products
                      INNER JOIN categories
                      ON products.category_id = categories.category_id
                      WHERE categories.category_id = :id
                      ORDER BY products.created_at ASC');

    $this->db->bind(':id', $id);

    $results = $this->db->resultSet();

    return $results;
  }
}
