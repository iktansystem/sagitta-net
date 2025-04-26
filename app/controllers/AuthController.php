<?php
session_start();

class AuthController {
    public function login() {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = Usuario::autenticar($email, $password);

            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header('Location: ' . BASE_URL . '/home/index');
                exit;
            } else {
                $error = "Correo o contraseña incorrectos";
            }
        }

        include '../app/views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
    }
}
