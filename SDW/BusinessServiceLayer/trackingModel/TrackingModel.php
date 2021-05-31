<?php
require_once '../../libs/database.php';

class TrackingModel
{
    public
        $TrackID, $Cus_ID, $Ord_ID, $sp_id, $CusStatus, $RunStatus, $Ship_Add, $R_ID;

    function viewOnD()
    {
        $sql = "select Service.S_Name, Tracking.Ship_Add, Tracking.TrackID from Tracking inner join order1 on Tracking.Ord_ID=order1.Ord_ID inner join service on Order1.Service_ID=Service.Service_ID where Tracking.CusStatus LIKE 'On Delivery' and Tracking.Cus_ID=:cus_ID and order1.Cus_ID=:cus_ID ";
        $args = [':cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }

    function viewComp()
    {
        $sql = "select * from Tracking inner join order1 on Tracking.Ord_ID=order1.Ord_ID inner join service on Order1.Service_ID=Service.Service_ID  where Tracking.CusStatus LIKE 'Completed' and Tracking.Cus_ID=:cus_ID and order1.Cus_ID=:cus_ID and Tracking.FeedbackStatus=0 ";

        $args = [':cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }

    function viewProgress()
    {
        $sql = "select * from Status where TrackID=:TrackID";
        $args = [':TrackID' => $this->TrackID];
        return DB::run($sql, $args);
    }

    function viewUnaccepted()
    {
        $sql = "select * from Tracking join customer on(Tracking.Cus_ID = customer.Cus_ID) inner join order1 on Tracking.Ord_ID=order1.Ord_ID inner join service on order1.Service_ID=service.Service_ID inner join sp on sp.sp_id=service.sp_id where RunStatus='unaccepted' and CusStatus LIKE 'On Delivery'";
        return DB::run($sql);
    }

    function viewAccepted()
    {
        $sql = "select * from Tracking join customer on(Tracking.Cus_ID = customer.Cus_ID) inner join order1 on Tracking.Ord_ID=order1.Ord_ID inner join service on order1.Service_ID=service.Service_ID inner join sp on sp.sp_id=service.sp_id where RunStatus='accepted' AND R_ID=:rid and CusStatus NOT LIKE 'Completed'";
        $args = [':rid' => $this->R_ID];
        return DB::run($sql, $args);
    }

    function viewCompleted()
    {
        $sql = "select * from Tracking join customer on(Tracking.Cus_ID = customer.Cus_ID) inner join order1 on Tracking.Ord_ID=order1.Ord_ID inner join service on order1.Service_ID=service.Service_ID inner join sp on sp.sp_id=service.sp_id where RunStatus='accepted' AND R_ID=:rid and CusStatus LIKE 'Completed'";
        $args = [':rid' => $this->R_ID];
        return DB::run($sql, $args);
    }

    function runAccept()
    {
        $sql = "update Tracking set RunStatus=:RunStatus, R_ID=:rid where TrackID=:TrackID";
        $args = [':TrackID' => $this->TrackID, ':RunStatus' => $this->RunStatus, ':rid' => $this->R_ID];
        return DB::run($sql, $args);
    }

    function viewStatus()
    {
        $sql = "select * from Tracking where TrackID=:TrackID";
        $args = [':TrackID' => $this->TrackID];
        return DB::run($sql, $args);
    }

    function updateProgress()
    {
        $sql = "insert into Status(TrackID, StatID, TrackDate, TrackProcess,TrackTime) values(:TrackID, :StatID, :TrackDate, :TrackProcess,:TrackTime)";
        $args = [':TrackID' => $this->TrackID, ':StatID' => $this->StatID, ':TrackDate' => $this->TrackDate, ':TrackProcess' => $this->TrackProcess, ':TrackTime' => $this->TrackTime];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function checkProgress()
    {
        $sql = "select * from Status where TrackID=:TrackID and TrackProcess=:TrackProcess" ;
        $args = [':TrackID' => $this->TrackID, ':TrackProcess' => $this->TrackProcess];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function initialUpdate()
    {
        $sql = "select * from Status where TrackID=:TrackID" ;
        $args = [':TrackID' => $this->TrackID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function updateDeliveryStatus()
    {
        $sql = "update Tracking set CusStatus='Completed' where TrackID=:trackID";
        $args = [':trackID' => $this->TrackID];
        return DB::run($sql, $args);
    }

    function viewRunner()
    {
        $sql = "select * from Tracking inner join runner on Tracking.R_ID = Runner.R_ID where Tracking.TrackID=:trackID";
        $args = [':trackID' => $this->TrackID];
        return DB::run($sql, $args);
    }
}
