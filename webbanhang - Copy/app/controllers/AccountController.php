<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');
require_once('app/helpers/SessionHelper.php');

class AccountController {
    private $accountModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    public function register() {
        include_once 'app/views/account/register.php';
    }

    public function login() {
        include_once 'app/views/account/login.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullName = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $role = 'user'; // Mặc định role là user

            $errors = [];

            // Validate input
            if (empty($username)) {
                $errors['username'] = "Vui lòng nhập tên đăng nhập!";
            } elseif (strlen($username) < 3) {
                $errors['username'] = "Tên đăng nhập phải có ít nhất 3 ký tự!";
            }

            if (empty($fullName)) {
                $errors['fullname'] = "Vui lòng nhập họ tên!";
            }

            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập mật khẩu!";
            } elseif (strlen($password) < 6) {
                $errors['password'] = "Mật khẩu phải có ít nhất 6 ký tự!";
            }

            if ($password !== $confirmPassword) {
                $errors['confirmpassword'] = "Mật khẩu xác nhận không khớp!";
            }

            // Kiểm tra username đã tồn tại chưa
            if ($this->accountModel->getAccountByUsername($username)) {
                $errors['username'] = "Tên đăng nhập này đã được sử dụng!";
            }

            if (count($errors) > 0) {
                // Nếu có lỗi, hiển thị form với thông báo lỗi
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = [
                    'username' => $username,
                    'fullname' => $fullName
                ];
                header('Location: /Account/register');
                exit;
            }

            // Thực hiện đăng ký
            $result = $this->accountModel->save($username, $fullName, $password, $role);
            
            if ($result) {
                $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập.";
                header('Location: /Account/login');
                exit;
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi đăng ký. Vui lòng thử lại!";
                header('Location: /Account/register');
                exit;
            }
        }
    }

    public function checkLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $errors = [];
            
            if (empty($username)) {
                $errors['username'] = "Vui lòng nhập tên đăng nhập!";
            }
            
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập mật khẩu!";
            }
            
            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = ['username' => $username];
                header('Location: /Account/login');
                exit;
            }

            $account = $this->accountModel->getAccountByUsername($username);
            
            if ($account && password_verify($password, $account->password)) {
                $_SESSION['user_id'] = $account->id;
                $_SESSION['username'] = $account->username;
                $_SESSION['fullname'] = $account->fullname;
                $_SESSION['role'] = $account->role;
                
                header('Location: /Product');
                exit;
            } else {
                $_SESSION['error'] = "Tên đăng nhập hoặc mật khẩu không đúng!";
                $_SESSION['old'] = ['username' => $username];
                header('Location: /Account/login');
                exit;
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /Product');
        exit;
    }
}
?>