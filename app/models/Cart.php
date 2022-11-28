<?php

class Cart
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getCart($id)
  {
    $this->db->query('SELECT *, 
                      cart.cart_id as cartID, 
                      user.user_id as userID, 
                      product.product_id as productID,
                      category.category_id as categoryID 
                      FROM cart 
                      INNER JOIN user 
                      ON cart.user_id = user.user_id 
                      INNER JOIN product 
                      ON cart.product_id = product.product_id
                      INNER JOIN category
                      ON product.category_id = category.category_id
                      WHERE cart.user_id = :user_id
                      ORDER BY cart.created_at ASC');

    $this->db->bind(':user_id', $id);

    $results = $this->db->resultSet();

    if ($results) {
      return $results;
    } else {
      return false;
    }
  }

  public function findCartProduct($id, $user_id)
  {
    $this->db->query("SELECT * FROM cart 
                      WHERE product_id = :product_id AND user_id = :user_id");

    $this->db->bind(':product_id', $id);
    $this->db->bind(':user_id', $user_id);

    $this->db->execute();

    $row = $this->db->rowCount();

    return $row;
  }

  public function addOne($id)
  {
    $this->db->query("UPDATE cart SET cart_quantity = cart_quantity + 1
                      WHERE product_id = :product_id 
                      AND user_id = :user_id");

    $this->db->bind(':product_id', $id);
    $this->db->bind(':user_id', $_SESSION['user_id']);

    return $this->db->execute();
  }

  public function addNew($id, $user_id, $price)
  {
    $this->db->query("INSERT INTO cart (product_id, user_id, cart_quantity, cart_price)
                      VALUES (:product_id, :user_id, 1, :cart_price)");

    $this->db->bind(':product_id', $id);
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':cart_price', $price);

    return $this->db->execute();
  }

  public function deleteCartItem($id)
  {
    $this->db->query("DELETE FROM cart WHERE cart_id = :id");

    $this->db->bind(':id', $id);

    return $this->db->execute();
  }

  public function clearCart()
  {
    $this->db->query("DELETE FROM cart WHERE user_id = :id");

    $this->db->bind(':id', $_SESSION['user_id']);

    return $this->db->execute();
  }

  public function updateQty($id, $qty)
  {
    $this->db->query("UPDATE cart SET cart_quantity = :cart_quantity
                      WHERE product_id = :product_id 
                      AND user_id = :user_id");
    $this->db->bind(':product_id', $id);
    $this->db->bind(':cart_quantity', $qty);
    $this->db->bind(':user_id', $_SESSION['user_id']);

    return $this->db->execute();
  }
}
