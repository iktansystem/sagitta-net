<?php
require_once '../app/helpers/Flash.php';

class UserController {
    public function index() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    
        $db = Database::connect();
        $usuarios = $db->query("SELECT id, email FROM usuarios ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    
        $title = "Usuarios";
        include '../app/views/layouts/header.php';
        include '../app/views/user/index.php';
        include '../app/views/layouts/footer.php';
    }

    public function crear() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    
        $error = null;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
    
            $db = Database::connect();
            $stmt = $db->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
    
            try {
                $stmt->execute([$email, $hash]);
                header('Location: ' . BASE_URL . '/user/index');
                exit;
            } catch (PDOException $e) {
                if ($e->getCode() === '23000') {
                    $error = "⚠️ El correo ya está registrado.";
                } else {
                    $error = "❌ Error: " . $e->getMessage();
                }
            }
        }
    
        $title = "Crear usuario";
        include '../app/views/layouts/header.php';
        include '../app/views/user/create.php';
        include '../app/views/layouts/footer.php';
    }
    

    public function editar($id) {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$usuario) {
            echo "Usuario no encontrado.";
            return;
        }
    
        $error = null;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $params = [$email];
    
            $query = "UPDATE usuarios SET email = ?";
            if (!empty($password)) {
                $query .= ", password = ?";
                $params[] = password_hash($password, PASSWORD_DEFAULT);
            }
            $query .= " WHERE id = ?";
            $params[] = $id;
    
            $stmt = $db->prepare($query);
            try {
                $stmt->execute($params);
                header('Location: ' . BASE_URL . '/user/index');
                exit;
            } catch (PDOException $e) {
                $error = "❌ Error al actualizar: " . $e->getMessage();
            }
        }
    
        $title = "Editar usuario";
        include '../app/views/layouts/header.php';
        include '../app/views/user/edit.php';
        include '../app/views/layouts/footer.php';
    }

    public function eliminar($id) {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    
        // ⚠️ Protección: evitar que se elimine a sí mismo
        if ($_SESSION['usuario']['id'] == $id) {
            Flash::set('warning', 'No puedes eliminar tu propio usuario.');
            header('Location: ' . BASE_URL . '/user/index');
            return;
        }
    
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
        try {
            $stmt->execute([$id]);
            Flash::set('success', 'Usuario eliminado correctamente.');
            header('Location: ' . BASE_URL . '/user/index');
            exit;
        } catch (PDOException $e) {
            echo "❌ Error al eliminar: " . $e->getMessage();
        }
    }
    
}
