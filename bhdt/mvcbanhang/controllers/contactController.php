<?php
require_once "./../models/categoryModel.php";

class contactController
{
    private $modelCategory;
    
    public function __construct()
    {
        $this->modelCategory = new categoryModel();
    }

    public function index()
    {
        // Hiển thị danh mục cho header
        $category = $this->modelCategory->getAll();
        include "./../views/client/contact.php";
    }

    public function sendMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $subject = $_POST['subject'] ?? '';
            $message = $_POST['message'] ?? '';
            
            // Ở đây bạn có thể thêm logic lưu tin nhắn vào database
            // hoặc gửi email
            
            // Redirect với thông báo thành công
            header('Location: ./contact.php?success=1');
            exit;
        }
        
        // Nếu không phải POST, redirect về trang liên hệ
        header('Location: ./contact.php');
        exit;
    }
}
?> 