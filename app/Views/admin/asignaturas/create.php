<?= $this->extend('template/main'); ?>

<?= $this->section('content') ?>

    <div class="row py-2">
        <?php $validation = \Config\Services::validation(); ?>
    </div>


    <form method="POST" action="<?= base_url('admin/asignaturas') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Crear asignatura</h5>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Clave de la asignatura:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('clave')): ?>is-invalid<?php endif ?>"
                                   name="clave" placeholder="IFM1000" value="<?php echo set_value('clave'); ?>"/>
                            <?php if ($validation->getError('clave')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('clave') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Créditos:</label>
                            <!-- Aumento de intervalo -->
                            <input type="number" max="100" min="0"
                                   class="form-control <?php if ($validation->getError('creditos')): ?>is-invalid<?php endif ?>"
                                   name="creditos" placeholder="3" value="<?php echo set_value('creditos'); ?>"/>
                            <?php if ($validation->getError('creditos')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('creditos') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Horas teóricas:</label>
                            <input type="number" min="0" max="50"
                                   class="form-control <?php if ($validation->getError('horas_teoricas')): ?>is-invalid<?php endif ?>"
                                   name="horas_teoricas" placeholder="3" value="<?php echo set_value('horas_teoricas'); ?>"/>
                            <?php if ($validation->getError('horas_teoricas')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('horas_teoricas') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Horas prácticas:</label>
                            <input type="number" min="0" max="50"
                                   class="form-control <?php if ($validation->getError('horas_practicas')): ?>is-invalid<?php endif ?>"
                                   name="horas_practicas" placeholder="3" value="<?php echo set_value('horas_practicas'); ?>"/>
                            <?php if ($validation->getError('horas_practicas')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('horas_practicas') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Asignatura:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" placeholder="Nombre de la asignatura" value="<?php echo set_value('nombre'); ?>"/>
                            <?php if ($validation->getError('nombre')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nombre') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Descripción:</label>
                            <textarea
                                class="form-control <?php if ($validation->getError('descripcion')): ?>is-invalid<?php endif ?>"
                                name="descripcion" placeholder="Resumen de la asignatura (OPCIONAL)"><?php echo set_value('descripcion'); ?></textarea>
                            <?php if ($validation->getError('descripcion')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('descripcion') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Tipo de asignatura:</label>
                            <select class="form-select" name="tipo_asignatura">
                                <option value="Tronco común">Tronco común</option>
                                <option value="Curricular">Curricular</option>
                                <option value="Especialidad">Especialidad</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Archivo del temario de la asignatura:</label>
                            <input type="file" accept="application/pdf"
                                   class="form-control <?php if ($validation->getError('temario_asignatura')): ?>is-invalid<?php endif ?>"
                                   name="temario_asignatura" placeholder="Temario de la asignatura" value="<?php echo set_value('temario_asignatura'); ?>"/>
                            <?php if ($validation->getError('temario_asignatura')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('temario_asignatura') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
            <input class="btn btn-primary" type="submit" value="Guardar">
            <a href="<?= base_url('admin/asignaturas') ?>" class="btn btn-default float-right">Cancelar y regresar</a>
        </div>
    </form>



    <script>
        $(function () {
            <?php if (session()->has('success')) { ?>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Registro realizado con éxito',
                    text: '<?= session('success'); ?>'
                showConfirmButton: false,
                timer: 1500
            })
            <?php } ?>

        });
    </script>

<?= $this->endSection() ?>