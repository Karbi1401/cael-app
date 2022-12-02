<?php

class Order
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function addToShipping($first_name, $last_name, $email, $contact, $address, $city)
  {
    $this->db->query("INSERT INTO 
                      shippings(shipping_first_name, 
                      shipping_last_name, 
                      shipping_email, 
                      shipping_contact, 
                      shipping_address, 
                      shipping_city)
                      VALUES(:shipping_first_name, 
                      :shipping_last_name, 
                      :shipping_email, 
                      :shipping_contact, 
                      :shipping_address, 
                      :shipping_city)");

    $this->db->bind(':shipping_first_name', $first_name);
    $this->db->bind(':shipping_last_name', $last_name);
    $this->db->bind(':shipping_email', $email);
    $this->db->bind(':shipping_contact', $contact);
    $this->db->bind(':shipping_address', $address);
    $this->db->bind(':shipping_city', $city);

    return $this->db->insertById();
  }

  public function addToPayment($payment_method, $shipping_id)
  {
    $this->db->query("INSERT INTO 
                      payments(payment_method, 
                      payment_status, 
                      shipping_id)
                      VALUES(:payment_method, 
                      0, 
                      :shipping_id)");

    $this->db->bind(':payment_method', $payment_method);
    $this->db->bind(':shipping_id', $shipping_id);

    return $this->db->insertById();
  }

  public function addToOrder($order_schedule, $user_id, $shipping_id, $payment_id, $total)
  {
    $this->db->query("INSERT INTO `orders`(`order_schedule`, `user_id`, `shipping_id`, `payment_id`, `order_total`) VALUES (:order_schedule,:user_id,:shipping_id,:payment_id,:order_total)");

    $this->db->bind(':order_schedule', $order_schedule);
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':shipping_id', $shipping_id);
    $this->db->bind(':payment_id', $payment_id);
    $this->db->bind(':order_total', $total);

    return $this->db->insertById();
  }

  public function addToOrderDetails($order_id, $product_id, $product_name, $product_price, $product_quantity, $user_id, $shipping_id)
  {
    $this->db->query("INSERT INTO 
                      orderdetails(order_id, 
                      product_id,
                      product_name, 
                      product_price, 
                      product_quantity, 
                      user_id, 
                      shipping_id)
                      VALUES(:order_id, 
                      :product_id, 
                      :product_name, 
                      :product_price, 
                      :product_quantity, 
                      :user_id, 
                      :shipping_id)");

    $this->db->bind(':order_id', $order_id);
    $this->db->bind(':product_id', $product_id);
    $this->db->bind(':product_name', $product_name);
    $this->db->bind(':product_price', $product_price);
    $this->db->bind(':product_quantity', $product_quantity);
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':shipping_id', $shipping_id);

    $this->db->execute();
  }

  public function getAllOrderDetail($order_id)
  {
    $this->db->query("SELECT *, 
                      orderdetails.order_detail_id as orderdetailsID, 
                      orders.order_id as orderID, 
                      products.product_id as productID, 
                      users.user_id as userID,
                      shippings.shipping_id as shippingID,
                      users.user_first_name as userFirstName,
                      users.user_last_name as userLastName,
                      users.user_email as userEmail,
                      users.user_contact as userContact,
                      shippings.shipping_first_name as shippingFirstName,
                      shippings.shipping_last_name as shippingLastName,
                      shippings.shipping_email as shippingEmail,
                      shippings.shipping_contact as shippingContact,
                      shippings.shipping_address as shippingAddress,
                      shippings.shipping_city as shippingCity
                      FROM orderdetails 
                      INNER JOIN orders 
                      ON orderdetails.order_id = orders.order_id
                      INNER JOIN products 
                      ON orderdetails.product_id = products.product_id 
                      INNER JOIN users 
                      ON orderdetails.user_id = users.user_id
                      INNER JOIN shippings
                      ON orderdetails.shipping_id = shippings.shipping_id
                      WHERE orders.order_id = :order_id
                      ORDER BY orderdetails.created_at ASC;");

    $this->db->bind(':order_id', $order_id);
    $orderdetails = $this->db->resultSet();

    if ($orderdetails) {
      return $orderdetails;
    } else {
      return false;
    }
  }
}
