<?php
/*************
 * bestand : checkin.php
 * auteur  : Abu
 * datum   : 10-3-2020 14:56
 **************/
require "corsheaders.php";
require 'classes/ArtClient.php';
require 'classes/JsonIO.php';

// connectie naar database, collectie
$userdrawing = new ArtClient('art', 'userdrawing');
$res = $userdrawing->GetAllNames();
JsonIO::WriteOk($res);
