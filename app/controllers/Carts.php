<?php
class Carts extends Controller
{
  public function __construct()
  {
    $this->cartModel = $this->model('Cart');
    $this->orderModel = $this->model('Order');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif (Auth::userAuth()) {
      $cartItems = 0;
      $id = $_SESSION['user_id'];
      $carts = $this->cartModel->getCart($id);

      $data = [
        'carts' => $carts
      ];

      if ($data['carts']) {
        foreach ($data['carts'] as $cart) {
          $cartItems = $cartItems + $cart->cart_quantity;
          $_SESSION['user_cart'] = $cartItems;
        }
      } else {
        $cartItems = 0;
      }

      $_SESSION['user_cart'] = $cartItems;
      $this->view('carts/index', $data);
    } else {
      redirect('users/login');
    }
  }

  public function add($id, $price)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif (Auth::userAuth()) {
      $data = [
        'id' => $id,
        'price' => $price,
        'user_id' => $_SESSION['user_id']
      ];

      if ($this->cartModel->findCartProduct($id, $data['user_id']) > 0) {
        $this->cartModel->addOne($id, $data['user_id']);
        success('cart_message', '<i class="fa-solid fa-cart-shopping mr-2"></i>Item added to the cart!');
        redirect('pages/menu');
      } else {
        $this->cartModel->addNew($id, $data['user_id'], $price);
        success('cart_message', '<i class="fa-solid fa-cart-shopping mr-2"></i>Item added to the cart!');
        redirect('pages/menu');
      }
    } else {
      redirect('users/login');
    }
  }

  public function delete($id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif (Auth::userAuth()) {
      $delete =  $this->cartModel->deleteCartItem($id);
      if ($delete) {
        danger('cart_message', '<i class="fa-solid fa-trash mr-2"></i>Item has been removed from the cart!');
        redirect('carts');
      }
    } else {
      redirect('users/login');
    }
  }

  public function updateQuantity($id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif (Auth::userAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $qty = $_POST['quantity'];
        if (!is_numeric($qty)) {
          danger('cart_message', '<i class="fa-solid fa-triangle-exclamation mr-2"></i>Quantity Must Be A Number!');
          redirect('carts/index');
        } elseif ($qty < 1 && empty($qty)) {
          danger('cart_message', '<i class="fa-solid fa-triangle-exclamation mr-2"></i>Quantity Must Not Be Less Than 1!');
          redirect('carts/index');
        } else {
          $this->cartModel->updateQty($id, $qty);
          success('cart_message', '<i class="fa-solid fa-check mr-2"></i>Quantity Has Been Successfully Updated!');
          redirect('carts/index');
        }
      }
    } else {
      redirect('users/login');
    }
  }

  public function checkout()
  {
    if (Auth::userAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Init Data
        $carts = $this->cartModel->getCart($_SESSION['user_id']);

        $data = [
          'first_name' => trim($_POST['first_name']),
          'last_name' => trim($_POST['last_name']),
          'email' => trim($_POST['email']),
          'contact_number' => trim($_POST['contact_number']),
          'address' => trim($_POST['address']),
          'city' => trim($_POST['city']),
          'payment_method' => trim($_POST['payment_method']),
          'total' => $_POST['total'],
          'qty' => $_POST['qty'],
          'order_schedule' => $_POST['order_schedule'],
          'carts' => $carts,
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'contact_err' => '',
          'address_err' => '',
          'city_err' => '',
          'payment_method_err' => '',
          'order_schedule_err' => ''
        ];

        // Validate First Name
        if (empty($data['first_name'])) {
          $data['first_name_err'] = 'Please enter first name';
        } elseif (is_numeric($data['first_name'])) {
          $data['first_name_err'] = 'Name cannot contant any number';
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['first_name'])) {
          $data['first_name_err'] = 'Name must only contain letters';
        }

        // Validate Last Name
        if (empty($data['last_name'])) {
          $data['last_name_err'] = 'Please enter last name';
        } elseif (is_numeric($data['last_name'])) {
          $data['last_name_err'] = 'Name cannot contant any number';
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['last_name'])) {
          $data['last_name_err'] = 'Name must only contain letters';
        }

        // Validate Email
        if (empty($data['email'])) {
          $data['email_err'] = 'Email must have a value.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $data['email_err'] = 'Enter valid email.';
        }

        // Validate Contact Number
        if (empty($data['contact_number'])) {
          $data['contact_number_err'] = 'Please enter contact number';
        } elseif (strlen($data['contact_number']) < 11) {
          $data['contact_number_err'] = 'Contact must not be less than 11 characters.';
        } else {
          // Check input if the input is a number
          if (!is_numeric($data['contact_number'])) {
            $data['contact_number_err'] = 'Invalid contact number';
          }
        }

        // Validate Address
        if (empty($data['address'])) {
          $data['address_err'] = 'Please enter address';
        }

        // Validate City
        if (empty($data['city'])) {
          $data['city_err'] = 'Please enter city';
        } elseif (is_numeric($data['city'])) {
          $data['city_err'] = 'Input for city must not have any numeric value';
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['city'])) {
          $data['city_err'] = 'City must only contain letters';
        }

        // Validate Payment Method
        if (empty($_POST['payment_method'])) {
          $data['payment_method_err'] = 'You must choose payment method';
        }

        // Validate Payment Method
        if (empty($_POST['order_schedule'])) {
          $data['order_schedule_err'] = 'Please enter schedule of the order';
        }

        if (empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['email_err']) && empty($data['contact_err']) && empty($data['address_err']) && empty($data['city_err']) && empty($data['payment_method_err']) && empty($data['order_schedule_err'])) {
          // Add to shipping
          $shipping_id = $this->orderModel->addToShipping(
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['contact_number'],
            $data['address'],
            $data['city']
          );

          $_SESSION['shipping_id'] = $shipping_id;

          // Add to payment
          $payment_id = $this->orderModel->addToPayment($_POST['payment_method'], $shipping_id);

          // Add to order
          $order_id = $this->orderModel->addToOrder(
            $data['order_schedule'],
            $_SESSION['user_id'],
            $shipping_id,
            $payment_id,
            $data['total']
          );

          foreach ($data['carts'] as $cart) {
            // Add to order details
            $this->orderModel->addToOrderDetails(
              $order_id,
              $cart->product_id,
              $cart->product_name,
              $cart->product_price,
              $cart->cart_quantity,
              $_SESSION['user_id'],
              $shipping_id
            );
          }

          $orders = $this->orderModel->getAllOrderDetail($order_id);
          Email::sendEmailOrdersToUser($orders);

          $this->cartModel->clearCart();

          $_SESSION['user_cart'] = '0';

          success('cart_message', '<i class="fa-solid fa-cart-shopping mr-2"></i>Order successfully submitted');

          redirect("carts");
        } else {
          $this->view('carts/checkout', $data);
        }
      } else {
        $id = $_SESSION['user_id'];

        $carts = $this->cartModel->getCart($id);

        $users = $this->userModel->getUserByID($id);

        // Init Data
        $data = [
          'carts' => $carts,
          'first_name' => $users->user_first_name,
          'last_name' => $users->user_last_name,
          'email' => $users->user_email,
          'contact_number' => $users->user_contact,
          'address' => $users->user_address,
          'city' => $users->user_city,
          'payment_method' => '',
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'contact_err' => '',
          'address_err' => '',
          'city_err' => '',
          'payment_method_err' => '',
          'order_schedule_err' => ''
        ];

        $this->view('carts/checkout', $data);
      }
    } elseif (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins');
    } else {
      redirect('pages');
    }
  }
}
