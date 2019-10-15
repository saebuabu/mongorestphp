<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client(
    'mongodb+srv://asaebu:testmongooldb@cluster0-2d82g.azure.mongodb.net/sample_mflix?retryWrites=true&w=majority'
);

$collection = $client->mydb->customers;

$result = $collection->find()->toArray();

print_r($result);
