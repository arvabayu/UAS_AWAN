<?php
require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;
 
try {
    $storage = new StorageClient([
        'keyFilePath' => 'utsawan.json',
    ]);
 
    $bucket = $storage->bucket('arvabayu');
    $object = $bucket->object('tupai.jpg');
 
    $object->delete();
    echo "File uploaded delete.";
} catch(Exception $e) {
    echo $e->getMessage();
}