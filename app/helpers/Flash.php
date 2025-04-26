<?php

class Flash {
    public static function set($tipo, $mensaje) {
        $_SESSION['flash'] = ['tipo' => $tipo, 'mensaje' => $mensaje];
    }

    public static function mostrar() {
        if (isset($_SESSION['flash'])) {
            $tipo = $_SESSION['flash']['tipo'];
            $mensaje = $_SESSION['flash']['mensaje'];
            $class = match ($tipo) {
                'success' => 'alert-success',
                'error' => 'alert-danger',
                'warning' => 'alert-warning',
                default => 'alert-info',
            };

            echo "<div class='alert $class alert-dismissible fade show' role='alert'>
                    $mensaje
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  </div>";

            unset($_SESSION['flash']);
        }
    }
}
