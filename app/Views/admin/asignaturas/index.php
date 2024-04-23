<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="">

    <div class="row">
        <div class="col-xl-12">
            <?php
            if (session()->getFlashdata('success')):?>
                <div class="alert alert-success alert-dismissible" id="success-alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php elseif (session()->getFlashdata('failed')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <?php echo session()->getFlashdata('failed') ?>
                </div>
            <?php endif; ?>


            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Asignaturas</h5>
                        </div>


                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">

                            <a href="<?= base_url('admin/') ?>" class="btn btn-default float-right ml-2 me-md-2">Regresar</a>
                            <a href="<?= base_url('admin/asignaturas/new') ?>" class="btn btn-primary float-right">Nueva
                                asignatura</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ASIGNATURA</th>
                            <th>INFORMACIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($asignaturas) > 0):
                            foreach ($asignaturas as $asignatura): ?>
                                <tr>
                                    <td><?= $asignatura['clave'] . ' ' . $asignatura['nombre']; ?> </td>
                                    <td>
                                        SATCA: <?= $asignatura['horas_teoricas'] . ' - ' . $asignatura['horas_practicas'] . ' - ' . $asignatura['horas_totales'] ?> </td>

                                    <td class="d-flex">
                                        <a href="<?= base_url('admin/asignaturas/' . $asignatura['id']) ?>"
                                           class="btn btn-default" title="Ver"><i
                                                    class="fas fa-eye"></i></a>
                                        <a href="<?= base_url('admin/asignaturas/' . $asignatura['id'] . '/edit') ?>"
                                           class="btn btn-default" title="Editar"><i
                                                    class="fas fa-edit"></i></a>
                                        <form class="display-none" method="post"
                                              action="<?= base_url('admin/asignaturas/' . $asignatura['id']) ?>"
                                              id="asignaturaDeleteForm<?= $asignatura['id'] ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deleteAsignatura('asignaturaDeleteForm<?= $asignatura['id'] ?>')"
                                               class="btn btn-default" title="Eliminar"><i
                                                        class="fas fa-trash text-red"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="5">
                                    <h6 class="text-danger text-center">No hay información de asignaturas
                                        registradas</h6>
                                </td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ASIGNATURA</th>
                            <th>INFORMACIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteAsignatura(formId) {
        var confirm = window.confirm('¿Desea eliminar la asignatura seleccionada? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>
