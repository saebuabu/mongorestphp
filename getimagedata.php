<?php
/*************
 * bestand : getimagedata.php
 * auteur  : Abu
 * datum   : 23-5-2020 17:16
 **************/

require "corsheaders.php";
require 'classes/ImageFile.php';
require 'classes/JsonIO.php';
require 'classes/ArtClient.php';

$img = new ImageFile(dirname(__FILE__)."\\images", $_GET['u']);
$imgdata = $img->getImage();

if ($imgdata) {
    JsonIO::WriteOk(array("imagedata" => $imgdata));
}
else {
    //Niet gevonden als file, dan maar uit de database
    $userdrawing = new ArtClient('art', 'userdrawing');
    $res = $userdrawing->GetFrom($_GET['u']);
    JsonIO::WriteOk($res);
}