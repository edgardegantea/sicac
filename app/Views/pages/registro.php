<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Edgar Degante Aguilar">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Competencias</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/dash.css') ?>">


    <style {csp-style-nonce}>
        body {
            background-color: #10312B;
            color: #ffffff;
        }
    </style>

</head>

<body class="d-flex flex-column h-100">
    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container text-center">

            <h3 class="mt-5">INSTITUTO TECNOLÓGICO SUPERIOR DE TEZIUTLÁN</h3>
            <h1 class="mt-1">Sistema de Competencias</h1>

            <img src="<?php echo base_url(''); ?>" alt="">
        </div>
    </main>

    <article class="container">

        <div class="text-center mb-3">
            <h2>Formulario de registro</h2>
        </div>



        <div>


            
            <form action="<?= base_url('registro') ?>" method="post">

            <h5>Información básica del usuario</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="">Número de control:</label>
                        <input class="form-control" min="3" max="30" required type="text" name="identificador">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="">Correo electrónico institucional:</label>
                        <input class="form-control" required type="email" name="email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="">Contraseña:</label>
                        <input class="form-control" required type="password" name="password" min="8" max="30">
                    </div>
                </div>

            </div>
            

            <h5 class="mt-5">Datos personales</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Nombre(s):</label>
                        <input class="form-control" required type="text" name="nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Apellido paterno:</label>
                        <input class="form-control" required type="text" name="apaterno">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Apellido materno:</label>
                        <input class="form-control" required type="text" name="amaterno">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Fecha de nacimiento:</label>
                        <input class="form-control" required type="date" name="fecha_nacimiento">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="">Sexo:</label>
                        <select name="sexo" id="" class="form-select">
                            <option value="f">Mujer</option>
                            <option value="m">Hombre</option>
                        </select>
                    </div>
                </div>


            </div>


    <div class="mb-5 d-grid gap-2 d-md-flex justify-content-md-end">
        <a type="button" href="login" class="btn btn-secondary" data-bs-dismiss="modal" id="guardarBtn">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>



        </div>



    </article>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            Developed for Ingeniería Informática ITST. <?= date('Y') . '.'; ?>
        </div>
    </footer>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.4/jquery.inputmask.min.js"></script>

    <script>
    // Agregar la máscara al campo de entrada de teléfono
    $(document).ready(function() {
        $('#telefono').inputmask('(999) 999-9999');
    });
    </script>


    <script>
    // Agregar la máscara al campo de entrada de CURP
    $(document).ready(function() {
        $('#curp').inputmask('aaaA999999HAA999AA9', {
            placeholder: " "
        });
    });
    </script>

</body>

</html>