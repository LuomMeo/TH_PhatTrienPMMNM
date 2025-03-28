<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');

class ProductApiController
{
private $productModel;
private $db;
public function __construct()
{
$this->db = (new Database())->getConnection();
$this->productModel = new ProductModel($this->db);
}
// Lấy danh sách sản phẩm
public function index()
{
header('Content-Type: application/json');
$products = $this->productModel->getProducts();
echo json_encode($products);
}
// Lấy thông tin sản phẩm theo ID
public function show($id)
{
header('Content-Type: application/json');
$product = $this->productModel->getProductById($id);
if ($product) {
echo json_encode($product);
} else {
http_response_code(404);
echo json_encode(['message' => 'Product not found']);
}
}
// Thêm sản phẩm mới
public function store()
{
    header('Content-Type: application/json');
    
    try {
        // Đọc và kiểm tra dữ liệu JSON
        $json = file_get_contents("php://input");
        if (!$json) {
            throw new Exception('No data received');
        }
        
        $data = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid JSON data');
        }

        // Validate và sanitize dữ liệu đầu vào
        $name = isset($data['name']) ? trim($data['name']) : '';
        $description = isset($data['description']) ? trim($data['description']) : '';
        $price = isset($data['price']) ? floatval($data['price']) : 0;
        $category_id = isset($data['category_id']) ? intval($data['category_id']) : null;

        // Kiểm tra dữ liệu bắt buộc
        if (empty($name)) {
            throw new Exception('Product name is required');
        }

        // Thêm sản phẩm
        $result = $this->productModel->addProduct($name, $description, $price, $category_id, null);

        if (is_array($result)) {
            // Có lỗi validation từ model
            http_response_code(400);
            echo json_encode(['errors' => $result]);
        } else {
            // Thêm thành công
            http_response_code(201);
            echo json_encode(['message' => 'Product created successfully']);
        }
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode([
            'error' => true,
            'message' => $e->getMessage()
        ]);
    }
}
// Cập nhật sản phẩm theo ID
public function update($id)
{
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'] ?? '';
$description = $data['description'] ?? '';
$price = $data['price'] ?? '';
$category_id = $data['category_id'] ?? null;
$result = $this->productModel->updateProduct($id, $name, $description, $price,
$category_id, null);
if ($result) {
echo json_encode(['message' => 'Product updated successfully']);
} else {
http_response_code(400);
echo json_encode(['message' => 'Product update failed']);
}
}
// Xóa sản phẩm theo ID
public function destroy($id)
{
header('Content-Type: application/json');
$result = $this->productModel->deleteProduct($id);
if ($result) {
echo json_encode(['message' => 'Product deleted successfully']);
} else {
http_response_code(400);
echo json_encode(['message' => 'Product deletion failed']);
}
}

// Tìm kiếm sản phẩm
public function search()
{
    header('Content-Type: application/json');
    $searchTerm = $_GET['q'] ?? '';
    
    if (empty($searchTerm)) {
        http_response_code(400);
        echo json_encode(['message' => 'Search term is required']);
        return;
    }

    $products = $this->productModel->searchProducts($searchTerm);
    echo json_encode($products);
}
}
?>