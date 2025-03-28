<?php
class CategoryModel
{
private $conn;
private $table_name = "category";


public function __construct($db)
{
$this->conn = $db;
}
public function getCategories()
{
$query = "SELECT id, name, description FROM " . $this->table_name;
$stmt = $this->conn->prepare($query);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ);
}

public function getCategoryById($id)
{
$query = "SELECT id, name, description FROM " . $this->table_name . " WHERE id = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
return $stmt->fetch(PDO::FETCH_OBJ);
}

public function addCategory($name, $description)
{
$query = "INSERT INTO " . $this->table_name . " (name, description) VALUES (:name, :description)";
$stmt = $this->conn->prepare($query);

// Sanitize input
$name = htmlspecialchars(strip_tags($name));
$description = htmlspecialchars(strip_tags($description));

// Bind parameters
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);

try {
return $stmt->execute();
} catch (PDOException $e) {
return false;
}
}

public function updateCategory($id, $name, $description)
{
$query = "UPDATE " . $this->table_name . " SET name = :name, description = :description WHERE id = :id";
$stmt = $this->conn->prepare($query);

// Sanitize input
$name = htmlspecialchars(strip_tags($name));
$description = htmlspecialchars(strip_tags($description));
$id = htmlspecialchars(strip_tags($id));

// Bind parameters
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':id', $id);

try {
return $stmt->execute();
} catch (PDOException $e) {
return false;
}
}

public function deleteCategory($id)
{
// First check if category has any products
$query = "SELECT COUNT(*) as count FROM product WHERE category_id = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);

if ($result->count > 0) {
return false; // Cannot delete category with products
}

$query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $id);

try {
return $stmt->execute();
} catch (PDOException $e) {
return false;
}
}
}
?>