<?php
$host = 'localhost';
$db   = 'student_manager';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Kết nối thất bại: " . $e->getMessage());
}
?>

<?php