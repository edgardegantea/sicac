<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>

    <h3>Actualizar contraseña</h3>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">


    </div>

    <div class="row g-3 mt-5">
        <div class="col"></div>
        <div class="col text-center">
            <form method="post" action="<?php echo base_url('admin/usuarios/update_password/' . $usuario['id']); ?>">
                <label class="form-label">Ingrese la nueva contraseña:</label>
                <input min="8" max="30" class="form-control" type="password" name="new_password" required>

                <button class="mt-3 btn btn-primary" type="submit">Actualizar Contraseña</button>
                <a href="<?= base_url('admin/usuarios') ?>" class="mt-3 btn btn-default float-right">Cancelar y regresar</a>
            </form>
        </div>
        <div class="col"></div>

    </div>



<?= $this->endsection(); ?>