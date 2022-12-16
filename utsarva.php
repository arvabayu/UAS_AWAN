<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;
 
try {
    $storage = new StorageClient([
        'keyFilePath' => 'utsawan.json',
    ]);
 
    $bucketName = 'arvabayu';
    // $bucket = $storage->bucket($bucketName);
    // if (!$bucket->exists()) {
    //     $response = $storage->createBucket($bucketName);
    //     echo "Your Bucket $bucketName is created successfully.";
    // }
    $fileName = 'tupai.jpg';
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->upload(
        fopen($fileName, 'r'),
        [
            'predefinedAcl' => 'publicRead'
        ]
    );
    echo "File uploaded successfully. File path is: https://storage.googleapis.com/$bucketName/$fileName";
} catch(Exception $e) {
    echo $e->getMessage();
}

