<?php
/*************
 * bestand : checkin.php
 * auteur  : Abu
 * datum   : 10-3-2020 14:56
 **************/
require "corsheaders.php";
require 'classes/ArtClient.php';
require 'classes/JsonIO.php';

// get posted data, WERKT NIET
// $data = json_decode(file_get_contents("php://input"));

// connectie naar database, collectie
$userdrawing = new ArtClient('art', 'userdrawing');

$res = $userdrawing->Save( $_POST['username'], $_POST['imagedata']);

if ($res  == '') {
    JsonIO::WriteOk(array($userdrawing->lastid));
} else {
    JsonIO::WriteError($res);
}