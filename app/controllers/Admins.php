<?php
class Admins extends Controller
{
  public function __construct()
  {
    $this->adminModel = $this->model('Admin');
  }

  public function index()
  {
    if (Auth::adminAuth()) {
      $this->view('admins/index');
    } else {
      redirect('pages');
    }
  }
}
