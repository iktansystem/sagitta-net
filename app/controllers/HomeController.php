<?php
session_start();

class HomeController {
    public function index() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $title = "Dashboard";
        include '../app/views/layouts/header.php';
        include '../app/views/home.php';
        include '../app/views/layouts/footer.php';
        
    }
}

