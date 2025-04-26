<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header"><h3 class="card-title">Nuevo Usuario</h3></div>
      <form method="POST" action="<?= BASE_URL ?>/user/crear">
        <div class="card-body">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <?php if (!empty($error)): ?>
            <div class="text-danger"><?= $error ?></div>
          <?php endif; ?>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <a href="<?= BASE_URL ?>/user/index" class="btn btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</section>
