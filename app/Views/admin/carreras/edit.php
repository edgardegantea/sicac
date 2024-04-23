<form action="<?= base_url('admin/carreras/' . $carrera['id']) ?>" method="post">

	<?= csrf_field() ?>

	<input type="hidden" name="_method" value="PUT">

	<input type="hidden" name="id">

	<div>
		<label for="">Clave de carrera:</label>
		<input type="text" name="clave" id="" value="<?php if ($carrera['clave']): echo $carrera['clave']; else: set_value('clave'); endif; ?>"/>
	</div>
	<div>
		<label for="">Carrera:</label>
		<input type="text" name="nombre" value="<?php if ($carrera['nombre']): echo $carrera['nombre']; else: set_value('nombre'); endif; ?>"/>
	</div>
	<div>
		<input type="submit" value="Guardar">
	</div>

</form>