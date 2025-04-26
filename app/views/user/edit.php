<section class="content">
  <div class="container-fluid">
    <div class="card card-warning">
      <div class="card-header"><h3 class="card-title">Editar Usuario</h3></div>
      <form method="POST" action="<?= BASE_URL ?>/user/editar/<?= $usuario['id'] ?>">
        <div class="card-body">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="<?= $usuario['email'] ?>">
          </div>
          <div class="form-group">
            <label>Nueva contraseña (opcional)</label>
            <input type="password" name="password" class="form-control">
            <small class="form-text text-muted">Déjalo vacío si no quieres cambiarla.</small>
          </div>
          <?php if (!empty($error)): ?>
            <div class="text-danger"><?= $error ?></div>
          <?php endif; ?>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-warning">Actualizar</button>
          <a href="<?= BASE_URL ?>/user/index" class="btn btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</section>
