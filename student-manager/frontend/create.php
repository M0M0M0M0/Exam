<?php
require_once '../backend/db.php'; // Kết nối CSDL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Chuẩn bị câu SQL INSERT với PDO để tránh SQL Injection
    $sql = "INSERT INTO students (fullname, email, phone, address) 
            VALUES (:fullname, :email, :phone, :address)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':fullname' => $fullname,
        ':email' => $email,
        ':phone' => $phone,
        ':address' => $address
    ]);

    // Chuyển hướng về trang danh sách sau khi thêm thành công
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên mới</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; }
        h2 { color: #333; }
        form { background: #fff; padding: 20px; border-radius: 8px; width: 400px; }
        input { width: 100%; padding: 8px; margin: 8px 0; border-radius: 4px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background: #007BFF; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        a { display: inline-block; margin-top: 10px; text-decoration: none; color: #007BFF; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h2>Thêm sinh viên mới</h2>
    <form method="POST">
        Họ tên: <input type="text" name="fullname" required>
        Email: <input type="email" name="email" required>
        Điện thoại: <input type="text" name="phone">
        Địa chỉ: <input type="text" name="address">
        <button type="submit">Thêm</button>
    </form>
    <a href="index.php">Quay lại danh sách</a>
</body>
</html>
