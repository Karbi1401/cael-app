<?php
class Admins extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $this->view('admins/index');
  }
}
