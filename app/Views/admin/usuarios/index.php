<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
    <h2>Usuarios registrados en el sistema</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
        <a class="btn btn-primary me-md-2 mr-1" href="<?= site_url('admin/'); ?>">Regresar</a>
        <a class="btn btn-primary" href="<?= site_url('admin/usuarios/new') ?>">Agregar usuario</a>
    </div>


    
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






    <table id="example" class="display" style="width:100%" class="table table-justify table-bordered table-hovered">
        <thead>
            <tr>
               <th>Nombre del usuario</th>
                <th>Tipo de usuario</th>
                <th>Username</th>
                <th>Correo electrónico</th>
                <!-- <th>Sexo</th> -->
                <th>Acciones</th> 
            </tr>
            
        </thead>
        <tbody>
            
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><span class="text-uppercase"><?= $usuario['nombre'] . ' ' . $usuario['apaterno'] . ' ' . $usuario['amaterno'] ?></span></td>
                    <td>
                        <?php if($usuario['perfil'] == 1): ?>
                            Administrador
                        <?php elseif($usuario['perfil'] == 2): ?>
                            Docente
                        <?php else: ?>
                            Alumno
                        <?php endif; ?>
                    </td>
                    <td><?= $usuario['identificador']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <!-- <td>
                        <?php if($usuario['sexo'] == 'f'): ?>
                            Mujer
                        <?php else: ?>
                            Hombre
                        <?php endif; ?>
                    </td> -->
                    <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="<?= base_url('admin/usuarios/'.$usuario['id'].'/edit'); ?>" class="btn btn-sm btn-light me-md-2 mr-1"><i class="fas fa-edit"></i></a>
                        <form method="post" action="<?= base_url('admin/usuarios/'.$usuario['id']); ?>" id="usuarioDeleteForm<?=$usuario['id']?>">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <a href="javascript:void(0)" onclick="deleteUsuario('usuarioDeleteForm<?=$usuario['id']; ?>')" class="btn btn-sm btn-danger mr-1" title="Eliminar registro"><i class="fas fa-trash"></i></a>
                        </form>
                        <a href="<?php echo base_url('admin/usuarios/edit_password/' . $usuario['id']); ?>" class="btn bt-sm btn-default mr-1"><i class="fas fa-key"></i></a>
                        </div>
                        
                    </td>
                </tr>



                <!-- Modal para editar usuario -->
                <div class="modal" id="editModal<?= $usuario['id']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                                <form action="<?= base_url('admin/usuarios/' . $usuario['id']) ?>" method="post">

                                <?= csrf_field() ?>

                                <input type="hidden" name="_method" value="PUT">

                                <input type="hidden" name="id">

                                <div>
                                    <label class="form-label" for="">Número de huella/control:</label>
                                    <input class="form-control" required type="text" name="identificador" id="" value="<?php if ($usuario['identificador']): echo $usuario['identificador']; else: set_value('identificador'); endif; ?>"/>
                                </div>
                                <div>
                                    <label class="form-label" for="">Carrera:</label>
                                    <input class="form-control" required type="text" name="nombre" value="<?php if ($usuario['nombre']): echo $usuario['nombre']; else: set_value('nombre'); endif; ?>"/>
                                </div>

                    
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form>
                    </div>
                </div>



            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
               <th>Nombre del usuario</th>
                <th>Tipo de usuario</th>
                <th>Username</th>
                <th>Correo electrónico</th>
                <!-- <th>Sexo</th> -->
                <th>Acciones</th> 
            </tr>
            
        </tfoot>
    </table>






<!-- Modal para crear -->
<div class="modal modal-xl fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro de usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/usuarios') ?>" method="post">

            <h5>Información básica del usuario</h5>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="">Número de huella/control:</label>
                        <input class="form-control" required type="text" name="identificador" value="<?= isset($oldData['identificador']) ? $oldData['identificador'] : ''; ?>">
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
                        <input class="form-control" required type="email" name="email" value="<?= isset($oldData['email']) ? $oldData['email'] : ''; ?>">
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
                        <input class="form-control" required type="text" name="nombre" value="<?= isset($oldData['nombre']) ? $oldData['nombre'] : ''; ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('nombre') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Apellido paterno:</label>
                        <input class="form-control" required type="text" name="apaterno" value="<?= isset($oldData['apaterno']) ? $oldData['apaterno'] : ''; ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('apaterno') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Apellido materno:</label>
                        <input class="form-control" required type="text" name="amaterno" value="<?= isset($oldData['amaterno']) ? $oldData['amaterno'] : ''; ?>">
                        <span class="text-danger"><?= isset($validation) ? $validation->getError('amaterno') : ''; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Fecha de nacimiento:</label>
                        <input class="form-control" required type="date" name="fecha_nacimiento" value="<?= isset($oldData['fecha_nacimiento']) ? $oldData['fecha_nacimiento'] : ''; ?>">
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


            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="guardarBtn">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php if (isset($stayInCreateModal) && $stayInCreateModal): ?>
    <script>
        $(document).ready(function () {
            $('#staticBackdrop').modal('show');
            // Evitar que el modal se cierre automáticamente después de un intento fallido de registro
            $('#staticBackdrop').on('hide.bs.modal', function (e) {
                if ($('#guardarBtn').hasClass('disabled')) {
                    e.preventDefault();
                }
            });
        });
    </script>
<?php endif; ?>





<script>
    function deleteUsuario(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>

