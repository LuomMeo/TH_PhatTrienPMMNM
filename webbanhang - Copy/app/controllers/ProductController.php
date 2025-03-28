<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
require_once('app/helpers/SessionHelper.php');

class ProductController
{
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    // Kiểm tra quyền Admin
    private function isAdmin() {
        return SessionHelper::isAdmin();
    }

    // Hiển thị danh sách sản phẩm (mở cho tất cả)
    public function index() {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }

    // Xem chi tiết sản phẩm (mở cho tất cả)
    public function show($id) {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'app/views/product/show.php';
        } else {
            $_SESSION['error'] = "Không tìm thấy sản phẩm.";
            header('Location: /Product');
            exit;
        }
    }

    // Thêm sản phẩm (chỉ Admin)
    public function add() {
        if (!$this->isAdmin()) {
            $_SESSION['error'] = "Bạn không có quyền truy cập chức năng này!";
            header('Location: /Product');
            exit;
        }
        $categories = (new CategoryModel($this->db))->getCategories();
        include 'app/views/product/add.php';
    }

    // Lưu sản phẩm mới (chỉ Admin)
    public function save() {
        if (!$this->isAdmin()) {
            $_SESSION['error'] = "Bạn không có quyền truy cập chức năng này!";
            header('Location: /Product');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = "";
            }

            $result = $this->productModel->addProduct($name, $description, $price, $category_id, $image);

            if (is_array($result)) {
                // Có lỗi validation
                $_SESSION['errors'] = $result;
                $_SESSION['old'] = [
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'category_id' => $category_id
                ];
                header('Location: /Product/add');
            } else {
                // Thêm thành công
                $_SESSION['success'] = "Thêm sản phẩm thành công!";
                header('Location: /Product');
            }
            exit;
        }
    }

    // Sửa sản phẩm (chỉ Admin)
    public function edit($id) {
        if (!$this->isAdmin()) {
            $_SESSION['error'] = "Bạn không có quyền truy cập chức năng này!";
            header('Location: /Product');
            exit;
        }

        $product = $this->productModel->getProductById($id);
        if (!$product) {
            $_SESSION['error'] = "Không tìm thấy sản phẩm.";
            header('Location: /Product');
            exit;
        }

        $categories = (new CategoryModel($this->db))->getCategories();
        include 'app/views/product/edit.php';
    }

    // Cập nhật sản phẩm (chỉ Admin)
    public function update() {
        if (!$this->isAdmin()) {
            $_SESSION['error'] = "Bạn không có quyền truy cập chức năng này!";
            header('Location: /Product');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            } else {
                $image = $_POST['existing_image'];
            }

            if ($this->productModel->updateProduct($id, $name, $description, $price, $category_id, $image)) {
                $_SESSION['success'] = "Cập nhật sản phẩm thành công!";
                header('Location: /Product');
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi cập nhật sản phẩm.";
                header("Location: /Product/edit/$id");
            }
            exit;
        }
    }

    // Xóa sản phẩm (chỉ Admin)
    public function delete($id) {
        if (!$this->isAdmin()) {
            $_SESSION['error'] = "Bạn không có quyền truy cập chức năng này!";
            header('Location: /Product');
            exit;
        }

        if ($this->productModel->deleteProduct($id)) {
            $_SESSION['success'] = "Xóa sản phẩm thành công!";
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi xóa sản phẩm.";
        }
        header('Location: /Product');
        exit;
    }

    public function category($categoryId)
    {
        // Lấy thông tin danh mục
        $categoryModel = new CategoryModel($this->db);
        $category = $categoryModel->getCategoryById($categoryId);
        
        if (!$category) {
            $_SESSION['error'] = "Không tìm thấy danh mục.";
            header('Location: /Product');
            exit;
        }

        // Lấy sản phẩm theo danh mục
        $products = $this->productModel->getProductsByCategory($categoryId);
        
        // Truyền thêm thông tin danh mục để hiển thị
        $categoryInfo = $category;
        
        include 'app/views/product/list.php';
    }

    private function uploadImage($file)
    {
        $target_dir = "uploads/";
        // Kiểm tra và tạo thư mục nếu chưa tồn tại
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem file có phải là hình ảnh không
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            throw new Exception("File không phải là hình ảnh.");
        }

        // Kiểm tra kích thước file (10 MB = 10 * 1024 * 1024 bytes)
        if ($file["size"] > 10 * 1024 * 1024) {
            throw new Exception("Hình ảnh có kích thước quá lớn.");
        }

        // Chỉ cho phép một số định dạng hình ảnh nhất định
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            throw new Exception("Chỉ cho phép các định dạng JPG, JPEG, PNG và GIF.");
        }

        // Lưu file
        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new Exception("Có lỗi xảy ra khi tải lên hình ảnh.");
        }

        return $target_file;
    }

    public function addToCart($id)
    {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            echo "Không tìm thấy sản phẩm.";
            return;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }

        header('Location: /Product/cart');
    }

    public function cart()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }

    public function checkout()
    {
        include 'app/views/product/checkout.php';
    }

    public function processCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            // Kiểm tra giỏ hàng
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "Giỏ hàng trống.";
                return;
            }

            // Bắt đầu giao dịch
            $this->db->beginTransaction();
            try {
                // Lưu thông tin đơn hàng vào bảng orders
                $query = "INSERT INTO orders (name, phone, address) VALUES (:name, :phone, :address)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':address', $address);
                $stmt->execute();
                $order_id = $this->db->lastInsertId();

                // Lưu chi tiết đơn hàng vào bảng order_details
                $cart = $_SESSION['cart'];
                foreach ($cart as $product_id => $item) {
                    $query = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
                    $stmt = $this->db->prepare($query);
                    $stmt->bindParam(':order_id', $order_id);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $item['quantity']);
                    $stmt->bindParam(':price', $item['price']);
                    $stmt->execute();
                }

                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['cart']);

                // Commit giao dịch
                $this->db->commit();

                // Chuyển hướng đến trang xác nhận đơn hàng
                header('Location: /Product/orderConfirmation');
            } catch (Exception $e) {
                // Rollback giao dịch nếu có lỗi
                $this->db->rollBack();
                echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage();
            }
        }
    }

    public function orderConfirmation()
    {
        include 'app/views/product/orderConfirmation.php';
    }
}
?>