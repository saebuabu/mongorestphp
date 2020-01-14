<?php


require 'vendor/autoload.php';
require dirname(__FILE__).'/../../../keys.php';


class Mongoclient {
    var $Client;
    var $Dbstr;
    var $Collection;

    //$db is de database naam
    function __construct($db)
    {
        try{
            $this->Client = new MongoDB\Client(
            'mongodb+srv://'.USRPASS.'@cluster0-2d82g.azure.mongodb.net/family?retryWrites=true&w=majority'
            );
        } catch (Exception $e) {
            die($e->GetMessage());
        }

        $this->Dbstr = $db;
     }

     //set collection (table)
     function SetCollection($coll) {
         try {
            $this->Collection = $this->Client->{$this->Dbstr}->{$coll};
         }
         catch (Exception $e) {
            die($e->GetMessage());
        }

        //return $this->Collection;
     }

     function GetAllAsCursor() {
        return $this->Collection->find();
    }

    function GetAsCursor($searchArr) {
        return $this->Collection->find($searchArr);
    }

    function GetFirst($searchArr) {
        $cursor =  $this->Collection->find($searchArr);

        //return first
        foreach ($cursor as $doc) return $doc;

        // or return null;
        return null; 
    }

    function Create($doc) {
        try {    
            $this->Collection->insertOne($doc);
        }
        catch (Exception $e) {
            return $e->GetMessage();
        }
        return '';
    }

    function AddUpdate($doc) {
        try {    
            $this->Collection->ReplaceOne($doc);
        }
        catch (Exception $e) {
            die($e->GetMessage());
        }
    }

}