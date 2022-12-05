<?php

class Payment
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function paymentComplete($payment_id)
  {
    $this->db->query("UPDATE payments
                      SET payment_status = :payment_status
                      WHERE payment_id = :payment_id");

    $this->db->bind(':payment_status', 1);
    $this->db->bind(':payment_id', $payment_id);

    return $this->db->execute();
  }

  public function paymentCancel($payment_id)
  {
    $this->db->query("UPDATE payments
                      SET payment_status = :payment_status
                      WHERE payment_id = :payment_id");

    $this->db->bind(':payment_status', 2);
    $this->db->bind(':payment_id', $payment_id);

    return $this->db->execute();
  }
}
