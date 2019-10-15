<?php

require 'vendor/autoload.php';

require dirname(__FILE__).'/../keys.php';

$client = new MongoDB\Client(
    'mongodb+srv://'.USRPASS.'@cluster0-2d82g.azure.mongodb.net/sample_mflix?retryWrites=true&w=majority'
);


try {
    $dbs = $client->listDatabases();
}
catch(Exception $e) {
    echo $e->getMessage();
}

print_r($dbs);

/*
$collection = $client->mydb->customers;

$result = $collection->find()->toArray();

print_r($result);
*/

