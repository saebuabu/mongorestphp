<?php

require 'classes/Mongoclient.php';
require 'classes/Wannabe.php';

$mymongo = new Mongoclient('myfamily');
$mymongo->SetCollection('wannabe');


//filter
$f = Array ("name"=> "Anais");
//set
$setDoc = Array("mother" => "Brechtje Maria", "father" => "Abu");
$mymongo->AddUpdate($f, $setDoc);


$cursor = $mymongo->GetAllAsCursor();
foreach ( $cursor as $id => $value )
{
    echo "$id: ";
    var_dump( $value );
}

