<?php
require_once '../core/Database.php';

$password = password_hash('123456', PASSWORD_DEFAULT);
$email = 'admin1@admin.com';

$db = Database::connect();
$stmt = $db->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
$stmt->execute([$email, $password]);

echo "Usuario creado correctamente";
