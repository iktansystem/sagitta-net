# 🧩 Proyecto MVC con AdminLTE 3.2 + Login + CRUD de Usuarios

Este proyecto PHP implementa un sistema de login con CRUD de usuarios, utilizando el patrón MVC, AdminLTE 3.2 como plantilla visual, rutas limpias mediante `.htaccess`, y base de datos MariaDB.

---

## 🚀 Características

- Arquitectura MVC
- Login con validación de credenciales y sesiones
- CRUD de usuarios (crear, leer, actualizar, eliminar)
- Interfaz moderna usando AdminLTE 3.2
- Manejo de rutas limpias con `.htaccess`
- Configuración global centralizada
- Uso de clases `Flash` para notificaciones temporales

---

## 🛠️ Requisitos

- PHP 7.4 o superior
- Apache con `mod_rewrite` habilitado
- MariaDB / MySQL
- Servidor local como XAMPP, WAMP, Laragon, etc.

---

## 📂 Estructura del Proyecto

```
sagitta-net/
├── app/
│   ├── controllers/
│       ├── AuthController.php
│       ├── HomeController.php
│       └── UserController.php
│   ├── helpers/
│       └── Flash.php
│   ├── models/
│       └── Usuario.php
│   ├── views/
│   │   ├── auth/
│           └── login.php
│   │   ├── layouts/
│           ├── footer.php
│           └── header.php
│   │   └── user/
│           ├── create.php
│           ├── edit.php
│           └── index.php
│   │   └── home.php
├── core/
│   ├── Database.php
│   └── Router.php
├── public/
│   ├── assets/
│   │   └── adminlte/
│           ├── dist/
│           ├── pages/
│           └── plugins/
│   └── custom/
│           ├── css/
│           ├── js/
│           └── img/
├── config.php
├── .htaccess
└── README.md
```

---

## 🧮 Base de Datos

### Script SQL de ejemplo:

```sql
CREATE DATABASE IF NOT EXISTS mi_proyecto CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE mi_proyecto;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Usuario de prueba
INSERT INTO usuarios (email, password)
VALUES ('admin@demo.com', SHA2('admin123', 256));
```

> También puedes usar `password_hash()` y `password_verify()` en PHP para mayor seguridad.

---

## ⚙️ Configuración `config.php`

```php
<?php
define('BASE_URL', 'http://localhost/mi-proyecto');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mi_proyecto');
define('DB_USER', 'root');
define('DB_PASS', '');

function autoload($clase) {
    $ruta = __DIR__ . '/libs/' . $clase . '.php';
    if (file_exists($ruta)) require_once $ruta;
}
spl_autoload_register('autoload');
```

Este archivo centraliza la configuración de la base de datos y define una función `autoload` para cargar clases automáticamente desde la carpeta `libs`.

---

## 🌐 Configuración `.htaccess`

```apache
RewriteEngine On
RewriteBase /mi-proyecto/

# Redireccionar todo hacia index.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
```

Este archivo permite rutas limpias como `/user/crear` en lugar de `index.php?url=user/crear`.

---

## 🖥️ Instalación y uso

1. Clona o descarga este repositorio.
2. Copia los archivos de AdminLTE en `public/` (dist y plugins).
3. Importa el SQL a tu base de datos MariaDB.
4. Configura `app/config.php` con tus credenciales.
5. Asegúrate de que Apache tiene habilitado `mod_rewrite`.
6. Accede desde tu navegador: `http://localhost/mi-proyecto`.

---

## 👤 Acceso de prueba

| Usuario        | Contraseña |
|----------------|------------|
| admin@demo.com | admin123   |

---

## 📋 Mejoras futuras

- Soporte de roles y permisos
- Avatar de usuario
- Restablecimiento de contraseña
- Buscador y paginación en lista de usuarios

---

## 🧑‍💻 Autor

Desarrollado por Kurt González
