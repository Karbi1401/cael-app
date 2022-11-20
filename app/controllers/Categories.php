<?php
class Categories extends Controller
{
  public function __construct()
  {
    $this->categoryModel = $this->model('Category');
  }

  public function index()
  {
    $categories = $this->categoryModel->getCategories();

    $data = [
      'categories' => $categories
    ];
    $this->view('categories/index', $data);
  }

  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'category_name' => trim($_POST['category_name']),
        'category_name_err' => ''
      ];

      if (empty($data['category_name'])) {
        $data['category_name_err'] = 'Please enter category name';
      } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['category_name'])) {
        $data['category_name_err'] = 'Category name must only contain letters';
      } elseif ($this->categoryModel->findCategoryName($data) > 0) {
        $data['category_name_err'] = 'Category name already exist please choose another one';
      }

      if (empty($data['category_name_err'])) {
        if ($this->categoryModel->addCategory($data)) {
          success('category_message', '<i class="fa-solid fa-check mr-2"></i>Category Added Successfuly!');
          redirect('categories');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('categories/add', $data);
      }
    } else {
      $data = [
        'category_name' => '',
        'category_name_err' => ''
      ];
      $this->view('categories/add', $data);
    }
  }

  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'id' => $id,
        'category_name' => $_POST['category_name'],
        'category_name_err' => ''
      ];

      if (empty($data['category_name'])) {
        $data['category_name_err'] = 'Please enter category name';
      } elseif (is_numeric($data['category_name'])) {
        $data['category_name_err'] = 'Category name could not contain any numeric value';
      }

      if (empty($data['category_name_err'])) {
        if ($this->categoryModel->updateCategory($data)) {
          success('category_message', '<i class="fa-solid fa-check mr-2"></i>Category Successfuly Updated!');
          redirect('categories');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('categories/edit', $data);
      }
    } else {
      $categories = $this->categoryModel->getCategoryByID($id);
      $data = [
        'id' => $id,
        'category_name' => $categories->category_name,
        'category_name_err' => ''
      ];

      $this->view('categories/edit', $data);
    }
  }

  public function changeCategoryStatusInactive($id)
  {
    if ($this->categoryModel->changeCategoryStatusInactive($id)) {
      success('category_message', '<i class="fa-solid fa-check mr-2"></i>Category Status Successfuly Changed to Inactive!');
      redirect('categories');
    } else {
      die('Something went wrong');
      redirect('categories');
    }
  }

  public function changeCategoryStatusActive($id)
  {
    if ($this->categoryModel->changeCategoryStatusActive($id)) {
      success('category_message', '<i class="fa-solid fa-check mr-2"></i>Category Status Successfuly Changed to Active!');
      redirect('categories');
    } else {
      die('Something went wrong');
      redirect('categories');
    }
  }

  public function delete($id)
  {
    if ($this->categoryModel->deleteCategory($id)) {
      success('category_message', '<i class="fa-solid fa-check mr-2"></i>Category Successfuly Removed!');
      redirect('categories');
    } else {
      die('Something went wrong');
      redirect('categories');
    }
  }
}
