<?php

require 'classes/Mongoclient.php';
require 'classes/Wannabe.php';

$mymongo = new Mongoclient('myfamily');
$mymongo->SetCollection('wannabe');

$w = new Wannabe("Jamiro","Abuhanifah","Brechtje");

$mymongo->Add((array) $w);


$cursor = $mymongo->GetAllAsCursor();
foreach ( $cursor as $id => $value )
{
    echo "$id: ";
    var_dump( $value );
}


/*
try {
    $dbs = $client->listDatabases();
}
catch(Exception $e) {
    echo $e->getMessage();
}

print_r($dbs);

$collection = $client->mydb->customers;

$result = $collection->find()->toArray();

print_r($result);
*/

