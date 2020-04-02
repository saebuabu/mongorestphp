<?php
/*************
 * bestand : checkin.php
 * auteur  : Abu
 * datum   : 10-3-2020 14:56
 **************/
require "corsheaders.php";
require 'classes/CheckinClient.php';
require 'classes/JsonIO.php';

// get posted data, WERKT NIET
// $data = json_decode(file_get_contents("php://input"));

// connectie naar database, collectie
$fmember = new CheckinClient('wtfaq', 'checkins');

$res = $fmember->Checkin($_GET['g'], $_POST['bar'], $_POST['dweller'], $_POST['latitude'], $_POST['longitude']);

if ($res  == '') {
    JsonIO::WriteOk(array($fmember->lastid));
} else {
    JsonIO::WriteError($res);
}