<?php
class Orders extends Controller
{
  public function __construct()
  {
    $this->orderModel = $this->model('Order');
    $this->paymentModel = $this->model('Payment');
  }

  public function index()
  {
    $orders = $this->orderModel->getAllPendingOrders();

    $data = [
      'orders' => $orders
    ];

    $this->view('orders/index', $data);
  }
}
