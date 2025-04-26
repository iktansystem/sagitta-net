<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Panel' ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?= BASE_URL ?>/auth/logout">
        <i class="fas fa-sign-out-alt"></i> Salir
      </a>
    </li>
  </ul>
</nav>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= BASE_URL ?>/home/index" class="brand-link">
    <span class="brand-text font-weight-light">Mi Panel</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
          <a href="<?= BASE_URL ?>/home/index" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>
        <!-- Agrega más enlaces aquí -->
        <li class="nav-item">
  <a href="<?= BASE_URL ?>/user/index" class="nav-link">
    <i class="nav-icon fas fa-users"></i>
    <p>Usuarios</p>
  </a>
</li>

      </ul>
    </nav>
  </div>
</aside>

<!-- Content Wrapper -->
<div class="content-wrapper pt-4 px-4">
<?php 
require_once '../app/helpers/Flash.php';
Flash::mostrar(); ?>