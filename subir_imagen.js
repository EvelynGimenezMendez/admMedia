$(document).ready(function () {
    
    myDropzone.on("addedfile", file => { //imprime en consola cada archivo ingresado en dropzone. Solo para visualizacion
        console.log(`File added: ${file.name}`);
    });

    $('#modal .cerrar').click(function() { //cierra el modal del dropzone
        $('#modal').modal('hide');
    });

    $('#subir_imagen').click(function() { //vacía el dropzone y abre el modal
        myDropzone.removeAllFiles();
        $('#modal').modal('show');
        
    });

});

//Creación de dropzone
Dropzone.autoDiscover = false;
Dropzone.options.myForm = {
    url: "subir_imagen.php", //controlador
    addRemoveLinks: true, //para poder eliminar la imagen antes de subirlo
    autoProcessQueue: false, //para que no suba las imagenes automaticamente sino con el boton
    acceptedFiles: "image/*,video/*,audio/*",
    maxFilesize: 10, //maximo tamaño 10MiB
    dictDefaultMessage: "Arrastra tus archivos aquí o haz clic para subirlos",
    dictFallbackMessage: "Tu navegador no soporta la carga de archivos arrastrando y soltando.",
    dictFallbackText: "Por favor, utiliza el formulario de reserva que se muestra a continuación para cargar tus archivos, como en los viejos tiempos.",
    dictFileTooBig: "El archivo es demasiado grande ({{filesize}}MiB). Tamaño máximo de archivo: {{maxFilesize}}MiB.",
    dictInvalidFileType: "Este formato no es válido.",
    dictResponseError: "Servidor respondio con codigo {{statusCode}}.",
    dictCancelUpload: "Cancelar subida",
    dictCancelUploadConfirmation: "¿Estás seguro de que quieres cancelar esta subida?",
    dictRemoveFile: "Eliminar archivo",
    dictMaxFilesExceeded: "No puedes subir más archivos.",
    init: function() {
        var myDropzone = this;
        var input = 'Null';

        $(".subir").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            input = 'separate_file';
            $.ajax(
            {
                type: 'POST',
                dataType: 'json',
                data: { }
                
            }).done(function (response) 
            {
                if (response.status)
                {
                    Swal.fire({ 
                        icon: 'success', 
                        title: '¡Nais!', 
                        text: 'Todo bien todo correcto.', 
                    })
                }
                else
                {
                    Swal.fire({ 
                        icon: 'error', 
                        title: '¿Qué ha pasao?', 
                        text: 'Todo mal todo incorrecto.', 
                    })
                }     
                
            }).fail(function () 
            {
                Swal.fire({ 
                    icon: 'warning', 
                    title: '¡Ups!', 
                    text: 'Ha ocurrido un error. Recargaremos la página.', 
                    buttons: false, 
                    closeOnClickOutside: false, 
                    timer:2000
                }).then((result) => 
                {
                    //location.reload();
                });
            });
            console.log(input);
            myDropzone.processQueue(); //se procesan los archivos 
        }); 
    }
}

let myDropzone = new Dropzone("#myForm");
var myModal = document.getElementById("modal");



//Creación de datatables
var tabla = new DataTable('#tabla',
{
    columns: [
        { data: 'id' },
        { data: 'nombre' },
        { data: 'formato' },
        { data: 'path' },
        { data: 'fecha_carga' },
        { data: 'acciones', orderable: false },
    ],
    language:
    {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
    },
});






