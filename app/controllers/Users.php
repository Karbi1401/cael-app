<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->cartModel = $this->model('Cart');
    $this->orderModel = $this->model('Order');
  }

  public function signup()
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif (Auth::adminGuest() || Auth::userGuest() || Auth::employeeGuest()) {
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
            success('user_message', '<i class="fa-solid fa-check mr-2"></i>You are registered!');
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
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif (Auth::adminGuest() || Auth::userGuest() || Auth::employeeGuest()) {
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
            if ($loggedInUser->user_role == 'employee') {
              redirect('admins/index');
            } elseif ($loggedInUser->user_role == 'user') {
              redirect('pages/index');
            } elseif ($loggedInUser->user_role == 'admin') {
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
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif ($_SESSION['user_id'] == $user_id) {
      $users = $this->userModel->getUserByID($user_id);
      $orders = $this->orderModel->getAllOrderDetailsUser($user_id);

      $data = [
        'users' => $users,
        'orders' => $orders
      ];

      $this->view('users/profile', $data);
    } else {
      redirect('pages');
    }
  }

  public function avatar($user_id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif ($_SESSION['user_id'] == $user_id) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $users = $this->userModel->getUserByID($user_id);

        $data = [
          'users' => $users,
          'user_image' => $_FILES['user_image']['name'],
          'user_image_tmp' => $_FILES['user_image']['tmp_name'],
          'user_image_err' => ''
        ];

        // Validation
        if (empty($data['user_image'])) {
          $data['user_image_err'] = "Please input an image";
        }

        if (empty($data['user_image_err'])) {
          $uploaddir = dirname(APPROOT) . '\public\img\\';
          move_uploaded_file($data['user_image_tmp'], $uploaddir . $data['user_image']);
          if ($this->userModel->avatar($user_id, $data['user_image'])) {
            success('user_message', '<i class="fa-solid fa-check mr-2"></i>Profile Picture Successfully Updated');
            redirect('users/profile/' . $user_id);
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('users/avatar', $data);
        }
      } else {
        $users = $this->userModel->getUserByID($user_id);

        $data = [
          'users' => $users,
          'user_image' => '',
          'user_image_tmp' => '',
          'user_image_err' => ''
        ];

        $this->view('users/avatar', $data);
      }
    } else {
      redirect('pages');
    }
  }

  public function edit($user_id)
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      redirect('admins/index');
    } elseif ($_SESSION['user_id'] == $user_id) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'user_id' => $user_id,
          'first_name' => trim($_POST['first_name']),
          'last_name' => trim($_POST['last_name']),
          'username' => trim($_POST['username']),
          'email' => trim($_POST['email']),
          'contact_number' => trim($_POST['contact_number']),
          'address' => trim($_POST['address']),
          'city' => trim($_POST['city']),
          'username_err' => '',
          'first_name_err' => '',
          'last_name_err' => '',
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
          if (!$this->userModel->findUserByUsernameAndID($data['username'], $data['user_id'])) {
            $data['username_err'] = 'Username is already taken';
          }
        }

        // Validate Email
        if (empty($data['email'])) {
          $data['email_err'] = 'Please enter email';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $data['email_err'] = 'Enter valid email.';
        } else {
          // Check email
          if (!$this->userModel->findUserByEmailAndID($data['email'], $data['user_id'])) {
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

        if (empty($data['username_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['email_err']) && empty($data['contact_number_err']) && empty($data['address_err']) && empty($data['city_err'])) {
          if ($this->userModel->editUser($data)) {
            success('user_message', '<i class="fa-solid fa-check mr-2"></i>User Information Successfully Updated!');
            redirect('users/profile/' . $_SESSION['user_id']);
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('users/edit', $data);
        }
      } else {
        $users = $this->userModel->getUserByID($user_id);

        $data = [
          'user_id' => $users->user_id,
          'first_name' => $users->user_first_name,
          'last_name' => $users->user_last_name,
          'username' => $users->user_username,
          'email' => $users->user_email,
          'contact_number' => $users->user_contact,
          'address' => $users->user_address,
          'city' => $users->user_city,
          'username_err' => '',
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'contact_err' => '',
          'address_err' => '',
          'city_err' => ''
        ];

        $this->view('users/edit', $data);
      }
    } else {
      redirect('pages');
    }
  }

  public function forgot()
  {
    if (Auth::adminAuth()) {
      redirect('admin/dashboard');
    } else {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));
        $data = [
          'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
          'token' => $token,
          'email_err' => ''
        ];

        if (empty($data['email'])) {
          $data['email_err'] = 'Please input you email';
        }

        if (empty($data['email_err'])) {
          if ($this->userModel->forgotPassword($data['email'], $data['token'])) {
            Email::sendPass($data['email'], $data['token']);
            success('user_message', '<i class="fa-solid fa-check mr-2"></i>Please check your email for password reset instructions');
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('users/forgot', $data);
        }
      } else {
        $data = [
          'email' => '',
          'email_err' => ''
        ];

        $this->view('users/forgot', $data);
      }
    }
  }

  public function reset($token)
  {
    if (Auth::adminAuth()) {
      redirect('admin/dashboard');
    } else {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'password' => $_POST['password'],
          'password_err' => '',
          'confirm_password' => $_POST['confirm_password'],
          'confirm_password_err' => '',
          'token' => $token
        ];

        if (empty($data['password'])) {
          $data['password_err'] = 'Please new password';
        }

        if (empty($data['confirm_password'])) {
          $data['confirm_password_err'] = 'Please new confirm password';
        }

        if ($data['password'] !== $data['confirm_password']) {
          $data['password_err'] = 'Passwords do not match';
          $data['confirm_password_err'] = 'Passwords do not match';
        }

        if (empty($data['password_err'] && $data['confirm_password_err'])) {
          $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
          if ($this->userModel->resetPassword($hashed_password, $data['token'])) {
            success('user_message', 'Password reset successfully');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
        }
      } else {
        $data = [
          'password' => '',
          'password_err' => '',
          'confirm_password' => '',
          'confirm_password_err' => '',
          'token' => $token
        ];
        $this->view('users/reset', $data);
      }
    }
  }
}
