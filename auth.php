<?php

require "corsheaders.php";
require 'classes/FamilyMemberClient.php';
require 'classes/JsonIO.php';

// get posted data
//$data = json_decode(file_get_contents("php://input"));

// connectie naar database, collectie
$fmember = new FamilyMemberClient('myfamily', 'family');


//$fmember->Auth($data->login, $data->password);
if ($fmember->Auth($_POST['login'], $_POST['password']))
{
    header("HTTP/1.1 200 OK");
    JsonIO::WriteOk();
} else {
    header("HTTP/1.1 201 OK");
    JsonIO::WriteError("Invalid credentials");
}
