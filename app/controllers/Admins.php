<?php
class Admins extends Controller
{
  public function __construct()
  {
    $this->adminModel = $this->model('Admin');
  }

  public function index()
  {
    $this->view('admins/index');
  }

  public function login()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'username_err' => '',
        'password_err' => '',
      ];

      // Validate Username
      if (empty($data['username'])) {
        $data['username_err'] = 'Pleae enter username';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }

      // Check for user/email
      if ($this->adminModel->findUserByUsername($data['username']) == false) {
        $data['username_err'] = 'No user found';
      }

      // Check if user is an admin
      if ($this->adminModel->findUserByRole($data['username']) == false) {
        $data['username_err'] = 'You do not have admin credentials';
      }

      // Make sure errors are empty
      if (empty($data['username_err']) && empty($data['password_err'])) {
        // Validated
        // Check and set logged in user
        $loggedInUser = $this->adminModel->login($data['username'], $data['password']);

        if ($loggedInUser) {
          // Create Session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect';

          $this->view('admins/login', $data);
        }
      } else {
        // Load view with errors
        $this->view('admins/login', $data);
      }
    } else {
      // Init data
      $data = [
        'username' => '',
        'password' => '',
        'username_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('admins/login', $data);
    }
  }

  public function createUserSession($admin)
  {
    $_SESSION['admin_id'] = $admin->user_id;
    $_SESSION['admin_email'] = $admin->user_email;
    $_SESSION['admin_name'] = $admin->user_name;
    $_SESSION['user_role'] = $admin->user_role;
    redirect('admins/index');
  }

  public function logout()
  {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['user_role']);
    session_destroy();
    redirect('admins/login');
  }
}
