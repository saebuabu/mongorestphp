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
if (isset($_GET['a']) && !empty($_GET['a']))
{
    $res = $userdrawing->GetFrom($_GET['a']);
}
else
{
    $res = $userdrawing->GetLast();
}
JsonIO::WriteOk($res);
