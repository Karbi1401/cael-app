<?php
class Pages extends Controller
{
  public function __construct()
  {
    $this->productModel = $this->model('Product');
    $this->categoryModel = $this->model('Category');
  }

  public function index()
  {
    $this->view('pages/index');
  }

  public function menu()
  {
    $products = $this->productModel->getProductByStatus();
    $categories = $this->categoryModel->getCategoryByStatus();

    $data = [
      'categories' => $categories,
      'products' => $products,
    ];

    $this->view('pages/menu', $data);
  }

  public function category($id)
  {
    $categories = $this->categoryModel->getCategoryByStatus();
    $products = $this->productModel->getProductByCategory($id);

    $data = [
      'categories' => $categories,
      'products' => $products
    ];

    $this->view('pages/category', $data);
  }

  public function details($id)
  {
    $products = $this->productModel->getProductByID($id);

    $data = [
      'products' => $products
    ];

    $this->view('pages/details', $data);
  }
}
