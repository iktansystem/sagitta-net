<?php

class Database {
    private static $pdo;

    public static function connect() {
        if (!self::$pdo) {
            self::$pdo = new PDO(
                'mysql:host=database:3306;dbname=sagitta_db;charset=utf8mb4', // Cambia `mi_db` por el nombre real de tu base
                'root', // Cambia por tu usuario
                'tiger'    // Cambia por tu contraseña
            );
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}
