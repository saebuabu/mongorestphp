<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'classes/FamilyMemberClient.php';
require 'classes/JsonIO.php';

// get posted data
$data = json_decode(file_get_contents("php://input"));

// connectie naar database, collectie
$fmember = new FamilyMemberClient('myfamily', 'family');
$fmember->Auth($data->login, $data->password);
if ($fmember->Auth($data->login, $data->password))
{
    family\JsonIO::WriteOk();
} else {
    family\JsonIO::WriteError("Invalid credentials");
}
