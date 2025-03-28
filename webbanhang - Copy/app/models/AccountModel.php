<?php
class AccountModel {
private $conn;
private $table_name = "account";
public function __construct($db) {
$this->conn = $db;
}


public function getAccountByUsername($username) {
$query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 1";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(":username", $username);
$stmt->execute();
return $stmt->fetch(PDO::FETCH_OBJ);
}
public function save($username, $fullName, $password, $role = 'user') {
try {
// Kiểm tra username đã tồn tại
if ($this->getAccountByUsername($username)) {
return false;
}

$query = "INSERT INTO " . $this->table_name . " 
(username, fullname, password, role, created_at) 
VALUES (:username, :fullname, :password, :role, NOW())";

$stmt = $this->conn->prepare($query);

// Làm sạch dữ liệu
$username = htmlspecialchars(strip_tags($username));
$fullName = htmlspecialchars(strip_tags($fullName));
$password = password_hash($password, PASSWORD_BCRYPT);
$role = htmlspecialchars(strip_tags($role));

// Bind các giá trị
$stmt->bindParam(":username", $username);
$stmt->bindParam(":fullname", $fullName);
$stmt->bindParam(":password", $password);
$stmt->bindParam(":role", $role);

// Thực thi câu lệnh
if($stmt->execute()) {
return true;
}
return false;
} catch(PDOException $e) {
return false;
}
}

public function updateProfile($id, $fullName, $currentPassword, $newPassword = null) {
try {
// Lấy thông tin tài khoản hiện tại
$query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->execute();
$account = $stmt->fetch(PDO::FETCH_OBJ);

if (!$account || !password_verify($currentPassword, $account->password)) {
return false;
}

// Cập nhật thông tin
$query = "UPDATE " . $this->table_name . " 
SET fullname = :fullname" . 
($newPassword ? ", password = :password" : "") . 
" WHERE id = :id";

$stmt = $this->conn->prepare($query);

$fullName = htmlspecialchars(strip_tags($fullName));
$stmt->bindParam(":fullname", $fullName);
$stmt->bindParam(":id", $id);

if ($newPassword) {
$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
$stmt->bindParam(":password", $hashedPassword);
}

return $stmt->execute();
} catch(PDOException $e) {
return false;
}
}
}
?>