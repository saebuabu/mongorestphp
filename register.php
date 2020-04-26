<?php
/*************
 * bestand : register.php
 * auteur  : Abu
 * datum   : 26-4-2020 16:15
 **************/
require "corsheaders.php";
require 'classes/WannabeClient.php';
require 'classes/JsonIO.php';

// connectie naar database, collectie
$wannabe = new WannabeClient('myfamily', 'wannabe');
if (empty($wannabe->Add($_POST['name'], $_POST['father'], $_POST['mother'], $_POST['email'])))
{
    JsonIO::WriteOk();
} else {
    JsonIO::WriteError("Failed : " + $wannabe);
}
