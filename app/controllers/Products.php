<?php
class Products extends Controller
{
  public function __construct()
  {
    $this->productModel = $this->model('Product');
    $this->categoryModel = $this->model('Category');
  }

  public function index()
  {
    if (Auth::adminAuth()) {
      $products = $this->productModel->getProduct();

      $data = [
        'products' => $products
      ];

      $this->view('products/index', $data);
    } else {
      redirect('pages');
    }
  }

  public function add()
  {
    if (Auth::adminAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $categories = $this->categoryModel->getCategories();
        $data = [
          'product_name' => trim($_POST['product_name']),
          'product_price' => trim($_POST['product_price']),
          'product_description' => trim($_POST['product_description']),
          'product_image' => $_FILES['image']['name'],
          'product_image_temp' => $_FILES['image']['tmp_name'],
          'category_id' => trim($_POST['category_id']),
          'product_name_err' => '',
          'product_price_err' => '',
          'product_description_err' => '',
          'product_image_err' => '',
          'categories' => $categories
        ];

        if (empty($data['product_name'])) {
          $data['product_name_err'] = 'Please enter category name';
        } elseif ($this->productModel->getProductByName($data) > 0) {
          $data['product_name_err'] = 'This product already exist choose another one';
        }

        if (empty($data['product_price'])) {
          $data['product_price_err'] = 'Please enter product price';
        } elseif (!is_numeric($data['product_price'])) {
          $data['product_price_err'] = 'Please input a valid price';
        } elseif ($data['product_price'] <= 0) {
          $data['product_price_err'] = 'Please input a valid price';
        }

        if (empty($data['product_description'])) {
          $data['product_description_err'] = 'Please enter product description';
        }

        if (empty($data['product_image'])) {
          $data['product_image_err'] = 'You must choose a product image';
        }

        if (empty($data['product_name_err']) && empty($data['product_price_err']) && empty($data['product_description_err']) && empty($data['product_image_err'])) {
          $uploaddir = dirname(APPROOT) . '\public\img\\';
          move_uploaded_file($data['product_image_temp'], $uploaddir . $data['product_image']);
          if ($this->productModel->addProduct($data)) {
            success('product_message', '<i class="fa-solid fa-check mr-2"></i>Product Successfuly Added!');
            redirect('products');
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('products/add', $data);
        }
      } else {
        $categories = $this->categoryModel->getCategories();

        $data = [
          'product_name' => '',
          'product_price' => '',
          'product_description' => '',
          'category_id' => '',
          'product_name_err' => '',
          'product_price_err' => '',
          'product_description_err' => '',
          'category_id_err' => '',
          'categories' => $categories
        ];

        $this->view('products/add', $data);
      }
    } else {
      redirect('pages');
    }
  }

  public function changeProductStatusInactive($id)
  {
    if (Auth::adminAuth()) {
      if ($this->productModel->changeProductStatusInactive($id)) {
        success('product_message', '<i class="fa-solid fa-check mr-2"></i>Category Status Successfuly Changed to Inactive!');
        redirect('products');
      } else {
        die('Something went wrong');
        redirect('products');
      }
    } else {
      redirect('pages');
    }
  }

  public function changeProductStatusActive($id)
  {
    if (Auth::adminAuth()) {
      if ($this->productModel->changeProductStatusActive($id)) {
        success('product_message', '<i class="fa-solid fa-check mr-2"></i>Category Status Successfuly Changed to Active!');
        redirect('products');
      } else {
        die('Something went wrong');
        redirect('products');
      }
    } else {
      redirect('pages');
    }
  }

  public function edit($id)
  {
    if (Auth::adminAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $products = $this->productModel->getProductByID($id);
        $categories = $this->categoryModel->getCategories();

        $data = [
          'id' => $id,
          'product_name' => trim($_POST['product_name']),
          'product_price' => trim($_POST['product_price']),
          'product_description' => trim($_POST['product_description']),
          'category_id' => $_POST['category_id'],
          'category_name' => $products->categoryName,
          'categories' => $categories,
          'product_name_err' => '',
          'product_price_err' => '',
          'product_description_err' => '',
          'category_id_err' => ''
        ];

        if (empty($data['product_name'])) {
          $data['product_name_err'] = 'Please enter category name';
        }

        if (empty($data['product_price'])) {
          $data['product_price_err'] = 'Please enter product price';
        } elseif (!is_numeric($data['product_price'])) {
          $data['product_price_err'] = 'Please input a valid price';
        } elseif ($data['product_price'] <= 0) {
          $data['product_price_err'] = 'Please input a valid price';
        }

        if (empty($data['product_description'])) {
          $data['product_description_err'] = 'Please enter product description';
        }

        if (empty($data['product_image'])) {
          $data['product_image_err'] = 'You must choose a product image';
        }

        if (empty($data['product_name_err']) && empty($data['product_price_err']) && empty($data['product_description_err'])) {
          if ($this->productModel->updateProduct($data)) {
            success('product_message', '<i class="fa-solid fa-check mr-2"></i>Product Successfuly Updated!');
            redirect('products');
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('products/edit', $data);
        }
      } else {
        $categories = $this->categoryModel->getCategories();
        $products = $this->productModel->getProductByID($id);

        $data = [
          'id' => $id,
          'product_name' => $products->product_name,
          'product_price' => $products->product_price,
          'product_description' => $products->product_description,
          'category_id' => $products->category_id,
          'category_name' => $products->categoryName,
          'categories' => $categories,
          'product_name_err' => '',
          'product_price_err' => '',
          'product_description_err' => '',
          'category_id_err' => ''
        ];

        $this->view('products/edit', $data);
      }
    } else {
      redirect('pages');
    }
  }

  public function editProductImage($id)
  {
    if (Auth::adminAuth()) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $products = $this->productModel->getProductByID($id);

        $data = [
          'id' => $id,
          'product' => $products->product_image,
          'product_image' => $_FILES['image']['name'],
          'product_image_temp' => $_FILES['image']['tmp_name'],
          'product_image_err' => ''
        ];

        if (empty($data['product_image'])) {
          $data['product_image_err'] = "Please select an image";
        }

        if (empty($data['product_image_err'])) {
          $uploaddir = dirname(APPROOT) . '\public\img\\';
          move_uploaded_file($data['product_image_temp'], $uploaddir . $data['product_image']);
          if ($this->productModel->editProductImage($data)) {
            success('product_message', '<i class="fa-solid fa-check mr-2"></i>Product Image Successfuly Updated!');
            redirect('products');
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('products/edit_product_image', $data);
        }

        $this->view('products/edit_product_image', $data);
      } else {
        $products = $this->productModel->getProductByID($id);

        $data = [
          'id' => $id,
          'product' => $products->product_image,
          'product_image' => '',
          'product_image_temp' => '',
          'product_image_err' => '',
        ];

        $this->view('products/edit_product_image', $data);
      }
    } else {
      redirect('pages');
    }
  }

  public function delete($id)
  {
    if (Auth::adminAuth()) {
      if ($this->productModel->deleteProduct($id)) {
        success('product_message', '<i class="fa-solid fa-check mr-2"></i>Product Successfuly Removed!');
        redirect('products');
      } else {
        die('Something went wrong');
        redirect('products');
      }
    } else {
      redirect('pages');
    }
  }
}
