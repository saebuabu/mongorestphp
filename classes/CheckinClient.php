<?php
require 'classes/MongoClient.php';
require 'classes/CheckinModel.php';

class CheckinClient extends MongoClient
{
    private $checkin;
    public $lastid;

    function __construct($db, $coll)
    {
        parent::__construct($db);
        parent::SetCollection($coll);
        date_default_timezone_set('Europe/Amsterdam');
    }

    // Group(Vriendengroepje), Bar(naam cafe), Dweller (de zatlap), latitude en longitude(locatie cafe)
    public function Checkin($g,$b,$d,$lat,$lon)
    {
            $this->checkin = new CheckinModel($g,$b,$d,$lat,$lon);
            $this->checkin->checkIn();

            parent::Create($this->checkin);

            $this->lastid = $this->checkin->_id;
    }

    public function Checkout($g,$b,$d)
    {
        //ophalen op basis van
        $this->checkin = new CheckinModel($g,$b,$d);

        $retrievedDoc = parent::GetFirst($this->checkin);

        $this->checkin->checkOutTime();
        $this->checkin->_id = $retrievedDoc->_id;

        parent::AddUpdate($this->checkin);
    }

    public function AllCheckins($g,$b)
    {

        $utimenow = strtotime("now");
        $searchArr = array('group'=> $g, 'bar'=> $b, 'checkInTime' => array( '$gt' => $utimenow - 4 * 60 *60)) ;

        $cursor = parent::GetAsCursor($searchArr);

        $dwellers = array();
        foreach($cursor as $document) {
            $dwellers[] = array("dweller" => $document['dweller'],"in" => date('d-m-Y H:i',$document['checkInTime'])
                                       , "out"=> empty($document['checkOutTime']) ? '-' : date('H:i',$document['checkOutTime']));
        }

        return $dwellers;
    }


}