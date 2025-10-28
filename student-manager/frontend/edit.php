<?php
require_once '../backend/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$stmt->execute([':id' => $id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE students SET fullname=:fullname, email=:email, phone=:phone, address=:address WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':fullname' => $_POST['fullname'],
        ':email' => $_POST['email'],
        ':phone' => $_POST['phone'],
        ':address' => $_POST['address'],
        ':id' => $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 6px;
            width: 400px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
        a.back {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #2196F3;
        }
        a.back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Chỉnh sửa sinh viên</h2>
    <form method="POST">
        Họ tên: <input type="text" name="fullname" value="<?= htmlspecialchars($student['fullname']) ?>" required>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
        Điện thoại: <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']) ?>">
        Địa chỉ: <input type="text" name="address" value="<?= htmlspecialchars($student['address']) ?>">
        <button type="submit">Cập nhật</button>
    </form>
    <a class="back" href="index.php">Quay lại danh sách</a>
</body>
</html>
