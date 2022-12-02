<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->cartModel = $this->model('Cart');
  }

  public function signup()
  {
    if (Auth::adminAuth()) {
      redirect('admins/index');
    } elseif (Auth::adminGuest() || Auth::userGuest()) {
      // Check for POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form

        // Init data
        $data = [
          'first_name' => trim(ucwords($_POST['first_name'])),
          'last_name' => trim(ucwords($_POST['last_name'])),
          'email' => trim($_POST['email']),
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'email' => trim($_POST['email']),
          'contact_number' => trim($_POST['contact_number']),
          'address' => trim($_POST['address']),
          'city' => trim($_POST['city']),
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'username_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'email_err' => '',
          'contact_number_err' => '',
          'address_err' => '',
          'city_err' => ''
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

        // Validate Username
        if (empty($data['username'])) {
          $data['username_err'] = 'Please enter username';
        } elseif (!preg_match("/^[a-zA-Z0-9\s]+$/", $data['username'])) {
          $data['username_err'] = 'Username cannot contain any special character';
        } else {
          // Check username
          if ($this->userModel->findUserByUsername($data['username'])) {
            $data['username_err'] = 'Username is already taken';
          }
        }

        // Validate Password
        if (empty($data['password'])) {
          $data['password_err'] = 'Please enter password';
        } elseif (strlen($data['password']) < 6) {
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if (empty($data['confirm_password'])) {
          $data['confirm_password_err'] = 'Please confirm password';
        } else {
          if ($data['password'] != $data['confirm_password']) {
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Validate Email
        if (empty($data['email'])) {
          $data['email_err'] = 'Please enter email';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $data['email_err'] = 'Enter valid email.';
        } else {
          // Check email
          if ($this->userModel->findUserByEmail($data['email'])) {
            $data['email_err'] = 'Email is already taken';
          }
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

        // Make sure errors are empty
        if (empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['email_err']) && empty($data['contact_number_err']) && empty($data['address_err']) && empty($data['city_err'])) {
          // Validated

          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if ($this->userModel->signup($data)) {
            success('user_message', 'You are registered!');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('users/signup', $data);
        }
      } else {
        // Init data
        $data = [
          'first_name' => '',
          'last_name' => '',
          'username' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'email' => '',
          'contact_number' => '',
          'address' => '',
          'city' => '',
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'username_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'email_err' => '',
          'contact_number_err' => '',
          'address_err' => '',
          'city_err' => ''
        ];

        // Load view
        $this->view('users/signup', $data);
      }
    } else {
      redirect('pages');
    }
  }

  public function login()
  {
    if (Auth::adminAuth()) {
      redirect('admins/index');
    } elseif (Auth::adminGuest() || Auth::userGuest()) {
      // Check for POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form

        // Init data
        $data = [
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),
          'username_err' => '',
          'password_err' => ''
        ];

        // Validate Username
        if (empty($data['username'])) {
          $data['username_err'] = 'Please enter username';
        }

        // Validate Password
        if (empty($data['password'])) {
          $data['password_err'] = 'Please enter password';
        } elseif ($this->userModel->findUserByUsername($data['username']) == false) {
          // Check for user/email
          $data['username_err'] = 'No user found';
        }

        // Make sure errors are empty
        if (empty($data['username_err']) && empty($data['password_err'])) {
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['username'], $data['password']);
          if ($loggedInUser) {
            $this->createUserSession($loggedInUser);
            if ($loggedInUser->user_role === 'user') {
              redirect('pages/index');
            } elseif ($loggedInUser->user_role === 'admin') {
              redirect('admins/index');
            }
          } else {
            $data['password_err'] = 'Password incorrect';
            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }
      }
      // Init data
      $data = [
        'username' => '',
        'password' => '',
        'username_err' => '',
        'password_err' => ''
      ];

      // Load view
      $this->view('users/login', $data);
    } else {
      redirect('pages');
    }
  }

  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->user_id;
    $_SESSION['user_email'] = $user->user_email;
    $_SESSION['user_name'] = $user->user_name;
    $_SESSION['user_role'] = $user->user_role;

    $cartItems = 0;
    $carts = $this->cartModel->getCart($user->user_id);
    if ($carts) {
      foreach ($carts as $cart) {
        $cartItems = $cartItems + $cart->cart_quantity;
        $_SESSION['user_cart'] = $cartItems;
      }
    } else {
      $cartItems = 0;
    }

    $_SESSION['user_cart'] = $cartItems;
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_role']);
    session_destroy();
    redirect('users/login');
  }

  public function profile($user_id)
  {
    if ($_SESSION['user_id'] == $user_id) {
      $users = $this->userModel->getUserByID($user_id);

      $data = [
        'users' => $users,
      ];

      $this->view('users/profile', $data);
    } else {
      redirect('pages');
    }
  }
}
