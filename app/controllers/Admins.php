<?php
class Admins extends Controller
{
  public function __construct()
  {
    $this->adminModel = $this->model('Admin');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    if (Auth::adminAuth() || Auth::employeeAuth()) {
      $this->view('admins/index');
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
  }
}
