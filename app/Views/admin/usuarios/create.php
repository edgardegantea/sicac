<?= $this->extend('template/main') ?>



<?= $this->section('content') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (session()->has('error')): ?>
        <script>
            // Muestra un toast de SweetAlert con el mensaje de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= session('error') ?>',
            });

            // Limpia la sesión después de mostrar el mensaje
            <?php session()->remove('error'); ?>
        </script>
    <?php endif; ?>




<form action="<?= base_url('admin/usuarios') ?>" method="post">

            <h5>Información básica del usuario</h5>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="">Número de huella/control:</label>
                        <input class="form-control" required type="text" name="identificador" value="<?= set_value('identificador') ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('identificador') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="">Seleccionar el tipo de usuario:</label>
                        <select class="form-select" name="perfil" id="">
                            <?php foreach($perfiles as $perfil): ?>
                            <option value="<?= $perfil['id'] ?>"><?= $perfil['nombre'] ?></option>
                            <?php endforeach; ?>
                            <span class="text-danger"><?= isset($validation) ? $validation->getError('perfil') : ''; ?></span>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="" class="form-label">Estado del usuario:</label>
                        <select name="status" id="" class="form-select">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('status') : ''; ?></span>
                    </div>
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Correo electrónico institucional:</label>
                        <input class="form-control" required type="email" name="email" value="<?= set_value('email') ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('email') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Contraseña:</label>
                        <input class="form-control" required type="password" name="password" min="8" max="30">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('password') : ''; ?></span>
                    </div>
                </div>

            </div>
            

            <h5 class="mt-5">Datos personales</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Nombre(s):</label>
                        <input class="form-control" required type="text" name="nombre" value="<?= set_value('nombre') ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('nombre') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Apellido paterno:</label>
                        <input class="form-control" required type="text" name="apaterno" value="<?= set_value('apaterno') ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('apaterno') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Apellido materno:</label>
                        <input class="form-control" required type="text" name="amaterno" value="<?= set_value('amaterno') ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('amaterno') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Fecha de nacimiento:</label>
                        <input class="form-control" required type="date" name="fecha_nacimiento" value="<?= set_value('fecha_nacimiento') ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('fecha_nacimiento') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Sexo:</label>
                        <select name="sexo" id="" class="form-select">
                            <option value="f">Mujer</option>
                            <option value="m">Hombre</option>
                        </select>
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('sexo') : ''; ?></span>
                    </div>
                </div>


            </div>


    <div class="mb-5 d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="guardarBtn">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>


      <?= $this->endSection() ?>