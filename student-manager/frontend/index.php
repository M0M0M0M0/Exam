<?php
require_once '../backend/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        a.button {
            display: inline-block;
            margin-bottom: 10px;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.button:hover {
            background-color: #45a049;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #f9f9f9;
        }
        a.edit {
            color: #2196F3;
            text-decoration: none;
        }
        a.delete {
            color: #f44336;
            text-decoration: none;
        }
        a.edit:hover { text-decoration: underline; }
        a.delete:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    <a class="button" href="create.php">+ Thêm sinh viên</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Địa chỉ</th>
            <th>Thời gian tạo</th>
            <th>Hành động</th>
        </tr>

        <?php
        $stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['fullname']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <a class="edit" href="edit.php?id=<?= $row['id'] ?>">Sửa</a> |
                <a class="delete" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
