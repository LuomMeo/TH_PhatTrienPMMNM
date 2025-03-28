<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');
require_once('app/helpers/SessionHelper.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    private function checkAdminAccess()
    {
        if (!SessionHelper::isAdmin()) {
            header('Location: /');
            exit;
        }
    }

    public function list()
    {
        $this->checkAdminAccess();
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    public function add()
    {
        $this->checkAdminAccess();
        include 'app/views/category/add.php';
    }

    public function save()
    {
        $this->checkAdminAccess();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            
            $errors = [];
            
            // Validate input
            if (empty($name)) {
                $errors['name'] = "Vui lòng nhập tên danh mục!";
            }
            
            if (empty($description)) {
                $errors['description'] = "Vui lòng nhập mô tả danh mục!";
            }
            
            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = [
                    'name' => $name,
                    'description' => $description
                ];
                header('Location: /Category/add');
                exit;
            }
            
            if ($this->categoryModel->addCategory($name, $description)) {
                $_SESSION['success'] = "Thêm danh mục thành công!";
                header('Location: /Category/list');
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi thêm danh mục!";
                header('Location: /Category/add');
            }
            exit;
        }
    }

    public function edit($id)
    {
        $this->checkAdminAccess();
        
        $category = $this->categoryModel->getCategoryById($id);
        if (!$category) {
            $_SESSION['error'] = "Không tìm thấy danh mục!";
            header('Location: /Category/list');
            exit;
        }
        
        include 'app/views/category/edit.php';
    }

    public function update()
    {
        $this->checkAdminAccess();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            
            $errors = [];
            
            if (empty($name)) {
                $errors['name'] = "Vui lòng nhập tên danh mục!";
            }
            
            if (empty($description)) {
                $errors['description'] = "Vui lòng nhập mô tả danh mục!";
            }
            
            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = [
                    'name' => $name,
                    'description' => $description
                ];
                header("Location: /Category/edit/$id");
                exit;
            }
            
            if ($this->categoryModel->updateCategory($id, $name, $description)) {
                $_SESSION['success'] = "Cập nhật danh mục thành công!";
                header('Location: /Category/list');
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi cập nhật danh mục!";
                header("Location: /Category/edit/$id");
            }
            exit;
        }
    }

    public function delete($id)
    {
        $this->checkAdminAccess();
        
        if ($this->categoryModel->deleteCategory($id)) {
            $_SESSION['success'] = "Xóa danh mục thành công!";
        } else {
            $_SESSION['error'] = "Không thể xóa danh mục này vì có sản phẩm đang sử dụng!";
        }
        
        header('Location: /Category/list');
        exit;
    }
}
?>