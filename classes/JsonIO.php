<?php

class JsonIO 
{

    public static function WriteOk($arr = Array()) 
    {

         // set response code - 201 OK
        http_response_code(201);

        $arr['status'] = 'ok';
        $arr['response'] = $arr;
        echo json_encode($arr);
        
    }

    public static function WriteError($msg) 
    {

         // set response code - 200 OK
        http_response_code(503);

        $arr['status'] = 'error';
        $arr['response'] = $msg;
        echo json_encode($arr);
        
    }

}