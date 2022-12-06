<?php
class Orders extends Controller
{
  public function __construct()
  {
    $this->orderModel = $this->model('Order');
    $this->paymentModel = $this->model('Payment');
    $this->riderModel = $this->model('Rider');
  }

  public function index()
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $orders = $this->orderModel->getAllPendingOrders();

      $data = [
        'orders' => $orders
      ];

      $this->view('orders/index', $data);
    } else {
      redirect('pages');
    }
  }

  public function details($order_id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $orderdetails = $this->orderModel->getAllOrderDetails($order_id);

      foreach ($orderdetails as $orderdetail) {
        $user_first_name = $orderdetail->user_first_name;
        $user_last_name = $orderdetail->user_last_name;
        $user_email = $orderdetail->user_email;
        $user_contact = $orderdetail->user_contact;
        $user_address = $orderdetail->user_address;
        $user_city = $orderdetail->user_city;
        $shipping_first_name = $orderdetail->shipping_first_name;
        $shipping_last_name = $orderdetail->shipping_last_name;
        $shipping_email = $orderdetail->shipping_email;
        $shipping_contact = $orderdetail->shipping_contact;
        $shipping_address = $orderdetail->shipping_address;
        $shipping_city = $orderdetail->shipping_city;
      }

      $data = [
        'user_first_name' => $user_first_name,
        'user_last_name' => $user_last_name,
        'user_email' => $user_email,
        'user_contact' => $user_contact,
        'user_address' => $user_address,
        'user_city' => $user_city,
        'shipping_first_name' => $shipping_first_name,
        'shipping_last_name' => $shipping_last_name,
        'shipping_email' => $shipping_email,
        'shipping_contact' => $shipping_contact,
        'shipping_address' => $shipping_address,
        'shipping_city' => $shipping_city,
        'orderdetails' => $orderdetails,
      ];

      $this->view('orders/details', $data);
    } else {
      redirect('pages');
    }
  }

  public function assignRider($order_id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $riders = $this->riderModel->getAllRider();

      $data = [
        'id' => $order_id,
        'riders' => $riders
      ];

      $this->view('orders/assign_rider', $data);
    } else {
      redirect('pages');
    }
  }

  public function assignRiderOrder($order_id, $rider_id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $this->orderModel->assignRiderOrder($order_id, $rider_id);

      $this->orderModel->orderDeliver($order_id);

      success('order_message', 'The order is on delivery!');

      redirect('orders');
    } else {
      redirect('pages');
    }
  }

  public function onDelivery()
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $orders = $this->orderModel->getAllOnDeliveryOrders();

      $data = [
        'orders' => $orders
      ];

      $this->view('orders/on_delivery', $data);
    } else {
      redirect('pages');
    }
  }

  public function completed()
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {

      $orders = $this->orderModel->getAllCompletedOrders();

      $data = [
        'orders' => $orders
      ];

      $this->view('orders/completed', $data);
    } else {
      redirect('pages');
    }
  }

  public function cancelled()
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {

      $orders = $this->orderModel->getAllCancelledOrders();

      $data = [
        'orders' => $orders
      ];

      $this->view('orders/cancelled', $data);
    } else {
      redirect('pages');
    }
  }

  public function completeOrder($order_id, $payment_id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $orders = $this->orderModel->orderComplete($order_id);
      $payments = $this->paymentModel->paymentComplete($payment_id);
      //$complete_orders = $this->orderModel->completeOrdersByID($order_id);

      //Email::sendOrdersCompleteToUser($complete_orders);

      if ($orders && $payments) {
        success('order_message', 'Order has been completed!');
        redirect('orders');
      }
    } else {
      redirect('pages');
    }
  }

  public function cancelOrder($order_id, $payment_id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $orders = $this->orderModel->orderCancel($order_id);
      $payments = $this->paymentModel->paymentCancel($payment_id);
      //$cancelled_orders = $this->orderModel->cancelledOrdersByID($order_id);

      //Email::sendOrdersCancelledToUser($cancelled_orders);

      if ($orders && $payments) {
        danger('order_message', 'Order has been cancelled!');
        redirect('orders');
      }
    } else {
      redirect('pages');
    }
  }
}
