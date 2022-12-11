<?php
class Admins extends Controller
{
  public function __construct()
  {
    $this->adminModel = $this->model('Admin');
    $this->orderModel = $this->model('Order');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $totalSales = $this->orderModel->totalSales();
      $totalPendingOrders = $this->orderModel->pendingOrders();
      $totalCancelledOrders = $this->orderModel->cancelledOrders();
      $totalCompletedOrders = $this->orderModel->completeOrders();
      $orders = $this->orderModel->getAllCompletedOrders();

      //Set Data
      $data = [
        'total_sales' => $totalSales->sum,
        'total_pending_orders' => $totalPendingOrders,
        'total_completed_orders' => $totalCompletedOrders,
        'total_cancelled_orders' => $totalCancelledOrders,
        'orders' => $orders
      ];

      $this->view('admins/index', $data);
    } else {
      redirect('pages');
    }
  }

  public function users()
  {
    if (Auth::adminAuth()) {
      $users = $this->userModel->getAllUsers();

      $data = [
        'users' => $users
      ];

      $this->view('admins/users/index', $data);
    } else {
      redirect('pages');
    }
  }

  public function addUser()
  {
    if (Auth::adminAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'first_name' => ucwords($_POST['first_name']),
          'last_name' => ucwords($_POST['last_name']),
          'username' => $_POST['username'],
          'email' => $_POST['email'],
          'password' => $_POST['password'],
          'confirm_password' => $_POST['confirm_password'],
          'email' => $_POST['email'],
          'contact_number' => $_POST['contact_number'],
          'address' => $_POST['address'],
          'city' => $_POST['city'],
          'role' => $_POST['role'],
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'username_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'email_err' => '',
          'contact_number_err' => '',
          'address_err' => '',
          'city_err' => '',
          'role_err' => ''
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

        // Validate Role
        if (empty($data['role'])) {
          $data['role_err'] = 'Please select user role';
        }

        // Make sure errors are empty
        if (empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['email_err']) && empty($data['contact_number_err']) && empty($data['address_err']) && empty($data['city_err']) && empty($data['role_err'])) {
          // Validated

          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if ($this->userModel->addUser($data)) {
            success('user_message', '<i class="fa-solid fa-check mr-2"></i>You are registered!');
            redirect('admins/users');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('admins/users/add', $data);
        }
      } else {
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
          'role' => '',
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'username_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'email_err' => '',
          'contact_number_err' => '',
          'address_err' => '',
          'city_err' => '',
          'role_err' => ''
        ];

        $this->view('admins/users/add', $data);
      }
    } else {
      redirect('pages');
    }
  }

  public function userDetails($user_id)
  {
    if (Auth::adminAuth()) {
      $users = $this->userModel->getUserByID($user_id);

      $data = [
        'users' => $users
      ];

      $this->view('admins/users/details', $data);
    } else {
      redirect('pages');
    }
  }

  public function editUser($user_id)
  {
    if (Auth::adminAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
          'user_id' => $user_id,
          'first_name' => ucwords($_POST['first_name']),
          'last_name' => ucwords($_POST['last_name']),
          'username' => $_POST['username'],
          'email' => $_POST['email'],
          'contact_number' => $_POST['contact_number'],
          'address' => $_POST['address'],
          'city' => $_POST['city'],
          'role' => $_POST['role'],
          'first_name_err' => '',
          'last_name_err' => '',
          'username_err' => '',
          'email_err' => '',
          'contact_number_err' => '',
          'address_err' => '',
          'city_err' => '',
          'role_err' => ''
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
        }

        // Validate Email
        if (empty($data['email'])) {
          $data['email_err'] = 'Please enter email';
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

        // Validate Role
        if (empty($data['role'])) {
          $data['role_err'] = 'Please select user role';
        }

        if (empty($data['username_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['email_err']) && empty($data['contact_number_err']) && empty($data['address_err']) && empty($data['city_err']) && empty($data['role_err'])) {
          if ($this->userModel->editUserAsAdmin($data)) {
            success('user_message', '<i class="fa-solid fa-check mr-2"></i>User Information Successfully Updated!');
            redirect('admins/users');
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('admins/users/edit', $data);
        }
      } else {
        $users = $this->userModel->getUserByID($user_id);

        $data = [
          'user_id' => $user_id,
          'first_name' => $users->user_first_name,
          'last_name' => $users->user_last_name,
          'username' => $users->user_username,
          'email' => $users->user_email,
          'contact_number' => $users->user_contact,
          'address' => $users->user_address,
          'city' => $users->user_city,
          'role' => $users->user_role,
          'first_name_err' => '',
          'last_name_err' => '',
          'username_err' => '',
          'email_err' => '',
          'contact_number_err' => '',
          'address_err' => '',
          'city_err' => '',
          'role_err' => ''
        ];

        $this->view('admins/users/edit', $data);
      }
    } else {
      redirect('pages');
    }
  }

  public function deleteUser($user_id)
  {
    if (Auth::adminAuth()) {
      if ($this->userModel->deleteUser($user_id)) {
        success('user_message', '<i class="fa-solid fa-check mr-2"></i>User Information Successfuly Removed!');
        redirect('admins/users');
      } else {
        die('Something went wrong');
        redirect('admins/users');
      }
    } else {
      redirect('pages');
    }
  }

  public function editUserImage($id)
  {
    if (Auth::adminAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $users = $this->userModel->getUserByID($id);

        $data = [
          'id' => $id,
          'user' => $users->user_image,
          'user_image' => $_FILES['image']['name'],
          'user_image_temp' => $_FILES['image']['tmp_name'],
          'user_image_err' => ''
        ];

        if (empty($data['user_image'])) {
          $data['user_image_err'] = "Please select an image";
        }

        if (empty($data['user_image_err'])) {
          $uploaddir = dirname(APPROOT) . '\public\img\\';
          move_uploaded_file($data['user_image_temp'], $uploaddir . $data['user_image']);
          if ($this->riderModel->editRiderImage($data)) {
            success('user_message', '<i class="fa-solid fa-check mr-2"></i>User Image Successfuly Updated!');
            redirect('admins/users');
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('admins/users/edit_user_image', $data);
        }
      } else {
        $users = $this->userModel->getUserByID($id);

        $data = [
          'id' => $id,
          'user' => $users->user_image,
          'user_image' => '',
          'user_image_temp' => '',
          'user_image_err' => '',
        ];

        $this->view('admins/users/edit_user_image', $data);
      }
    } else {
      redirect('pages');
    }
  }
}
