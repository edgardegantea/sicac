<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>

<div class="mb-5">
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		Agregar carrera
	</button>
</div>




<div>

	<div class="row">

	<?php foreach ($carreras as $carrera): ?>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?= $carrera['clave'] . ' - ' . $carrera['nombre'] ?></h5>
				
					<!-- <a class="card-link" href="<?= base_url('admin/carreras/' . $carrera['id'] . '/edit') ?>">Editar</a> -->

					<div class="row text-center">
						<div class="col">
							<a class="card-link" data-toggle="modal" data-target="#editModal<?= $carrera['id']; ?>">Editar</a>
						</div>
						<div class="col">
							<form class="" method="post"
						          action="<?= base_url('admin/carreras/' . $carrera['id']) ?>"
						          id="carreraDeleteForm<?= $carrera['id'] ?>">
						        <input type="hidden" name="_method" value="DELETE"/>
						        <a href="javascript:void(0)"
						           onclick="deleteCarrera('carreraDeleteForm<?= $carrera['id'] ?>')"
						           class="card-link text-danger" title="Eliminar">Eliminar</a>
						    </form>
				    	</div>
					</div>

					
			    </div>
		    </div>
		</div>
		<br>




		<!-- Modal para editar carrera -->
        <div class="modal" id="editModal<?= $carrera['id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Contenido del modal -->
                    <div class="modal-body">
                        <!-- Formulario de edición de carrera -->
                        <form action="<?= base_url('admin/carreras/' . $carrera['id']) ?>" method="post">

						<?= csrf_field() ?>

						<input type="hidden" name="_method" value="PUT">

						<input type="hidden" name="id">

						<div>
							<label class="form-label" for="">Clave de carrera:</label>
							<input class="form-control" required type="text" name="clave" id="" value="<?php if ($carrera['clave']): echo $carrera['clave']; else: set_value('clave'); endif; ?>"/>
						</div>
						<div>
							<label class="form-label" for="">Carrera:</label>
							<input class="form-control" required type="text" name="nombre" value="<?php if ($carrera['nombre']): echo $carrera['nombre']; else: set_value('nombre'); endif; ?>"/>
						</div>

			
      				</div>
      			<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
      			</div>
      			</form>
            </div>
        </div>


</div>

		

	<?php endforeach; ?>

	</div>

</div>




<!-- Modal para crear -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro de carrera</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/carreras') ?>" method="post">

			<div>
				<label class="form-label" for="">Clave de carrera:</label>
				<input class="form-control" required type="text" name="clave" id="">
			</div>
			<div>
				<label class="form-label" for="">Carrera:</label>
				<input class="form-control" required type="text" name="nombre" id="">
			</div>
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>






<script>
    function deleteCarrera(formId) {
        var confirm = window.confirm('¿Desea eliminar la carrera seleccionada? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>



<?= $this->endSection(); ?>