<?php
require "corsheaders.php";
require 'classes/FamilyMemberClient.php';
require 'classes/JsonIO.php';

// get posted data
$data = json_decode(file_get_contents("php://input"));

// connectie naar database, collectie
$fmember = new FamilyMemberClient('myfamily', 'family');
$res = $fmember->CreateOne($data->username, $data->email, $data->password);

if ($res  == '') {
    JsonIO::WriteOk();
} else {
    JsonIO::WriteError($res);
}
