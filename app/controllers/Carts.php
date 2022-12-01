<?php
class Carts extends Controller
{
  public function __construct()
  {
    $this->cartModel = $this->model('Cart');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    if (Auth::adminAuth()) {
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
    if (Auth::adminAuth()) {
      redirect('admins/index');
    } elseif (Auth::userAuth()) {
      $data = [
        'id' => $id,
        'price' => $price,
        'user_id' => $_SESSION['user_id']
      ];

      if ($this->cartModel->findCartProduct($id, $data['user_id']) > 0) {
        $this->cartModel->addOne($id, $data['user_id']);
        success('cart_message', 'Item added to the cart!');
        redirect('pages/menu');
      } else {
        $this->cartModel->addNew($id, $data['user_id'], $price);
        success('cart_message', 'Item added to the cart!');
        redirect('pages/menu');
      }
    } else {
      redirect('users/login');
    }
  }

  public function delete($id)
  {
    if (Auth::adminAuth()) {
      redirect('admins/index');
    } elseif (Auth::userAuth()) {
      $delete =  $this->cartModel->deleteCartItem($id);
      if ($delete) {
        success('cart_message', 'Item has been removed from the cart!');
        redirect('carts');
      }
    } else {
      redirect('users/login');
    }
  }

  public function updateQuantity($id)
  {
    if (Auth::adminAuth()) {
      redirect('admins/index');
    } elseif (Auth::userAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $qty = $_POST['quantity'];
        if (!is_numeric($qty)) {
          danger('cart_message', 'Quantity Must Be A Number!');
          redirect('carts/index');
        } elseif ($qty < 1 && empty($qty)) {
          danger('cart_message', 'Quantity Must Not Be Less Than 1!');
          redirect('carts/index');
        } else {
          $this->cartModel->updateQty($id, $qty);
          success('cart_message', 'Quantity Has Been Successfully Updated!');
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
      $this->view('carts/checkout');
    } elseif (Auth::adminAuth()) {
      redirect('admins');
    } else {
      redirect('pages');
    }
  }
}
