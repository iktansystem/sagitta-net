<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuarios registrados</h3>
            </div>
            <div class="card-body">
                <a href="<?= BASE_URL ?>/user/crear" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i> Nuevo Usuario
                </a>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td><?= $u['id'] ?></td>
                            <td><?= $u['email'] ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/user/editar/<?= $u['id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                            </td>
                            <td>                              
                            <a href="<?= BASE_URL ?>/user/eliminar/<?= $u['id'] ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                                    <i class="fas fa-trash"></i>Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>