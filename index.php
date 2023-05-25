<?php
    //Definimos formato horario para la página
    date_default_timezone_set('America/Asuncion');
    require 'obtener_datos.php';
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        <!-- Titulo definido en cada página -->
        <title> Imagenes </title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.4/font/bootstrap-icons.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
        <!--Custom CSS -->
        <link href="main.css" rel="stylesheet">
        <!-- Dropzone -->
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
    </head>

    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0 abs-center">
            <div class="row d-flex divP justify-content-between p-4">
                <div class="container">
                    <h2 class="titulo"><strong>Administracion de media</strong></h2>
                </div>
            </div>
            <div class="container">
                <div class="contenido row d-flex justify-content-between">
                    <div class="col_pag col-4 align-self-center">
                        <h4 class="titulo_tabla">Previsualización</h4>
                        <div class="container" id="previ">
                            
                        </div>
                    </div>
                    <div class="col_pag col-7 align-self-center">
                        <h4 class="titulo_tabla">Imágenes</h4>
                        <div class="table-responsive">
                            <table id="tabla" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Nombre </th>
                                        <th> Formato </th>
                                        <th> Path </th>
                                        <th> Fecha carga </th>
                                        <th> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>
                                            <button class="btn btn-secondary acciones editar" id='ver'> <span> <i class="fa fa-solid fa-eye"></i></span></button>
                                            <button class="btn btn-danger acciones eliminar" id='eliminar'> <span> <i class="fa fa-solid fa-trash"></i></span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" id="subir_imagen" class="btn btn-primary mt-3" data-toggle="modal" data-target="#dropzoneModal"> Subir imagen </button>
                        <div class='modal fade' id='modal' tabindex='-1' role='dialog' aria-labelledby='modalLabel'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h4 class='modal-title'>Subir imagen</h4>
                                    </div>
                                    <div class='modal-body'>
                                        <form id= "myForm" class="dropzone"></form>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-success subir' data-dismiss='modal'>Subir</button>
                                        <button type='button' class='btn btn-danger cerrar' data-dismiss='modal'>Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Inicio pie de página -->
        <footer class="footer mt-auto py-3 text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3 bg-light fixed-bottom">
            © 2023 EvelynG
            </div>
            <!-- Copyright -->
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha256/0.9.0/sha256.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.3/sweetalert2.all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>
        <!-- Dropzone -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>        <!-- Custom JS -->
        <script src="subir_imagen.js"></script>
    </body>
</html>
