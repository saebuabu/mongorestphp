<?php


require 'vendor/autoload.php';
require dirname(__FILE__).'/../../../keys.php';


class MongoClient {
    var $Client;
    var $Dbstr;
    var $Collection;

    //$db is de database naam
    function __construct($db)
    {
        try{
            $this->Client = new MongoDB\Client(
            'mongodb+srv://'.USRPASS.'@'.MONGOURL.'/family?retryWrites=true&w=majority'
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

     //Alle documents uit een collection ophalen
     function GetAllAsCursor() {
        return $this->Collection->find();
    }

    //Gefilterde lijst ophalen
    function GetAsCursor($searchArr) {
        $cursor = $this->Collection->find($searchArr);

        foreach ($cursor as $doc) {
            $firstdoc = $doc;
            break;
        }
        return $firstdoc;
    }

    //De eerste willekeurige rij ophalen
    function GetFirst($searchArr) {
        $cursor =  $this->Collection->find($searchArr);

        //return first
        foreach ($cursor as $doc) return $doc;

        // or return null;
        return null; 
    }

    // $searchArr is de filter
    // $sortArr is de sortering
    // De  Laatste/eerste rij ophalen gesorteerd op $sortArray
    function GetLast($searchArr = Array(),$sortArray) {

        $cursor =  $this->Collection->find($searchArr);
        //werkt niet?? Nog uitzoeken
        //$cursor->sort($sortArray);

        //return last inserted, niet mooi maar werkt wel
        foreach ($cursor as $doc) {
            $lastdoc = $doc;
        }


        // or
        return $lastdoc;
    }

    //insert into een collection
    function Create($doc) {
        //Empty validation, werkt niet deze validatie
        $assA = [];
        foreach ($doc as $key => $value) {
            $assA[$key] = $value;
        }
        foreach ($doc->requiredFields as $field) {
            if ( empty($assA[$field]) ) {
                return "Insert error: $field is empty";
            }
        } // einde validatie

        try {
            $this->Collection->insertOne($doc);
        }
        catch (Exception $e) {
            return $e->GetMessage();
        }
        return '';
    }

    //update van een collection
    function AddUpdate($doc) {
        try {    
            $this->Collection->ReplaceOne($doc);
        }
        catch (Exception $e) {
            return $e->GetMessage();
        }
        return '';
    }

}