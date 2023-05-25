<?php
    require 'vendor/autoload.php';
    class R2
    {
        public function connectR2()
        {
            //Datos obtenidos en cloudflare R2 al crear un bucket
            $bucketName       = "nombreBucket";
            $accountId        = "idCuenta";
            $accessKeyId      = "publicKey";
            $accessKeySecret  = "privateKey";
        
            $credentials = new Aws\Credentials\Credentials($accessKeyId, $accessKeySecret);
        
            $options = [
                'region' => 'auto',
                'endpoint' => "https://$accountId.r2.cloudflarestorage.com",
                'version' => 'latest',
                'credentials' => $credentials
            ];
            $s3Client = new Aws\S3\S3Client($options);
            return [
                'bucketName' => $bucketName,
                's3Client' => $s3Client
            ];
            //Para obtener e imprimir los archivos en el bucket
            /*$contents = $this->s3Client->listObjectsV2 ([
                'Bucket' => $this->bucketName
            ]);
            echo "<pre>";
                print_r($contents['Contents']);
            echo "</pre>";
            $buckets = $this->s3Client->listBuckets();
            var_dump($buckets['Buckets']);*/
        }
    }    
 