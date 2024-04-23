<?= $this->extend('admin/template/layout');
$this->section('title') ?>Editar asignatura<?= $this->endSection();
?>

<?= $this->section('content') ?>

    <div class="">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="row py-4">
            <div class="col-xl-12 text-end">
                <a href="<?= base_url('admin/asignaturas') ?>" class="btn btn-danger">Cancelar y regresar</a>
            </div>
        </div>
    </div>


    <form method="POST" action="<?= base_url('admin/asignaturas/' . $asignatura['id']); ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card primary">
            <div class="card-header">
                <h5 class="card-title">Actualizar datos de la asignatura</h5>
            </div>

            <input type="hidden" name="_method" value="PUT">

            <div class="card-body">


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Clave de la asignatura:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('clave')): ?>is-invalid<?php endif ?>"
                                   name="clave" placeholder="AA02X"
                                   value="<?php if ($asignatura['clave']): echo $asignatura['clave']; else: set_value('clave'); endif; ?>"/>
                            <?php if ($validation->getError('clave')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('clave') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Créditos:</label>
                            <input type="number" max="20" min="0"
                                   class="form-control <?php if ($validation->getError('creditos')): ?>is-invalid<?php endif ?>"
                                   name="creditos" placeholder="3"
                                   value="<?php if ($asignatura['creditos']): echo $asignatura['creditos']; else: set_value('creditos'); endif; ?>"/>
                            <?php if ($validation->getError('creditos')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('creditos') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Horas S/D/M:</label>
                            <input type="number" min="0" max="10"
                                   class="form-control <?php if ($validation->getError('horasSemana')): ?>is-invalid<?php endif ?>"
                                   name="horasSemana" placeholder="3"
                                   value="<?php if ($asignatura['horasSemana']): echo $asignatura['horasSemana']; else: set_value('horasSemana'); endif; ?>"/>
                            <?php if ($validation->getError('horasSemana')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('horasSemana') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Asignatura:</label>
                            <input type="text"
                                   class="form-control <?php if ($validation->getError('nombre')): ?>is-invalid<?php endif ?>"
                                   name="nombre" placeholder="Tu nombre"
                                   value="<?php if ($asignatura['nombre']): echo $asignatura['nombre']; else: set_value('nombre'); endif; ?>"/>
                            <?php if ($validation->getError('nombre')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nombre') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Descripción:</label>
                            <textarea
                                class="form-control <?php if ($validation->getError('descripcion')): ?>is-invalid<?php endif; ?>"
                                name="descripcion" placeholder="Resumen de la asignatura">
                                <?php // if ($asignatura['descripcion']): echo $asignatura['descripcion']; else: set_value('descripcion'); endif; // ?>
                                <?php echo trim($asignatura['descripcion']); ?>
                            </textarea>
                            <?php if ($validation->getError('descripcion')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('descripcion') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-label">Temario de la asignatura:</label>
                            <textarea
                                class="form-control <?php if ($validation->getError('temario')): ?>is-invalid<?php endif ?>"
                                name="temario" placeholder="Temario de la asignatura">
                                <?php if ($asignatura['temario']): echo $asignatura['temario']; else: set_value('temario'); endif; ?>
                            </textarea>
                            <?php if ($validation->getError('temario')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('temario') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3 has-validation">
                            <label class="form-label">Archivo del temario de la asignatura:</label>
                            <input type="file" accept="application/pdf"
                                   class="form-control <?php if ($validation->getError('temarioArchivo')): ?>is-invalid<?php endif ?>"
                                   name="temarioArchivo" placeholder="Temario de la asignatura"
                                   value="<?php if ($asignatura['temarioArchivo']): echo $asignatura['temarioArchivo']; else: set_value('temarioArchivo'); endif; ?>"/>
                            <?php if ($validation->getError('temarioArchivo')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('temarioArchivo') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


        <div class="card-footer">
            <input type="reset" value="Restablecer" class="btn btn-default">
            <button type="submit" class="btn btn-primary float-right">Actualizar</button>
        </div>
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