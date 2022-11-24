<?php
class Users extends Controller
{
  public function __construct()
  {
  }

  public function login()
  {
    $this->view('users/login');
  }

  public function signup()
  {
    $this->view('users/signup');
  }

  public function signup2()
  {
    $this->view('users/signup2');
  }
}
