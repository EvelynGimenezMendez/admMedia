<?php
    use Aws\S3\Exception\S3Exception;
    //Para subir las imagenes al local, a la nube y registrarlo en la base de datos
    require 'conexion.php';
    require 'obtener_datos.php';
    $conn = (new Db)->connectDB();
    $r2 = (new R2)->connectR2();

    $bucketName = $r2['bucketName'];
    $s3Client = $r2['s3Client'];

    if(!empty($_FILES))
    {
        $baseFolder = "subidas/"; //carpeta local para 'subir' los archivos
        $fileName = $_FILES['file']['name'];
        $targetFilePath = $baseFolder.$fileName;
        $body = $_FILES['file']['tmp_name'];

        try {
            // sube los archivos al R2
            $s3Client->putObject([
                'Bucket' => $bucketName,
                'Key' => $fileName,
                'Body' => fopen($body, 'rb'),
                'ACL' => 'public-read',
            ]);
            //crea un link publico temporal para el archivo
            $archivo=$s3Client->getCommand('GetObject', [
                'Bucket' => $bucketName,
                'Key' => $fileName
            ]);
            // el segundo parametro indica el tiempo válido de la url publica
            $request = $s3Client->createPresignedRequest($archivo, '+1 hour');
            print_r((string)$request->getUri());
        // manejo de errores
        } catch (S3Exception $e) {
            
            print_r ($e->getMessage());
        }

        if (move_uploaded_file($body, $targetFilePath)) {
            $conn->query("INSERT INTO imagenes_subidas (nombre, fecha_subida) VALUES ('".$fileName."', NOW())");
        }
    }