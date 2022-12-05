<?php
class Admins extends Controller
{
  public function __construct()
  {
    $this->adminModel = $this->model('Admin');
    $this->riderModel = $this->model('Rider');
  }

  public function index()
  {
    if (Auth::adminAuth()) {
      $this->view('admins/index');
    } else {
      redirect('pages');
    }
  }

  public function riders()
  {
    $riders = $this->riderModel->getAllRider();

    $data = [
      'riders' => $riders
    ];

    $this->view('admins/riders', $data);
  }

  public function addRider()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

      if (empty($data['first_name'])) {
        $data['first_name_err'] = 'Please enter first name';
      } elseif (is_numeric($data['first_name'])) {
        $data['first_name_err'] = 'Name cannot contant any number';
      } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['first_name'])) {
        $data['first_name_err'] = 'Name must only contain letters';
      }

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
        if ($this->riderModel->findRiderByUsername($data['username'])) {
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
        if ($this->riderModel->findRiderByEmail($data['email'])) {
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

      if (empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['email_err']) && empty($data['contact_number_err']) && empty($data['address_err']) && empty($data['city_err'])) {

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($this->riderModel->addRider($data)) {
          success('rider_message', '<i class="fa-solid fa-check mr-2"></i>Rider Information Added Successfully!');
          redirect('admins/riders');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('admins/add_rider', $data);
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

      $this->view('admins/add_rider', $data);
    }
  }

  public function editRider($rider_id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'rider_id' => $rider_id,
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

      if (empty($data['username_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['email_err']) && empty($data['contact_number_err']) && empty($data['address_err']) && empty($data['city_err'])) {
        if ($this->riderModel->editRider($data)) {
          success('rider_message', '<i class="fa-solid fa-check mr-2"></i>Rider Information Successfully Updated!');
          redirect('admins/riders');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('admins/edit_rider', $data);
      }
    } else {
      $riders = $this->riderModel->getRiderByID($rider_id);

      $data = [
        'rider_id' => $riders->rider_id,
        'first_name' => $riders->rider_first_name,
        'last_name' => $riders->rider_last_name,
        'username' => $riders->rider_username,
        'email' => $riders->rider_email,
        'contact_number' => $riders->rider_contact,
        'address' => $riders->rider_address,
        'city' => $riders->rider_city,
        'username_err' => '',
        'first_name_err' => '',
        'last_name_err' => '',
        'email_err' => '',
        'contact_err' => '',
        'address_err' => '',
        'city_err' => ''
      ];

      $this->view('admins/edit_rider', $data);
    }
  }

  public function deleteRider($rider_id)
  {
    if (Auth::adminAuth()) {
      if ($this->riderModel->deleteRider($rider_id)) {
        success('rider_message', '<i class="fa-solid fa-check mr-2"></i>Rider Information Successfuly Removed!');
        redirect('admins/riders');
      } else {
        die('Something went wrong');
        redirect('admins/riders');
      }
    } else {
      redirect('pages');
    }
  }
}
