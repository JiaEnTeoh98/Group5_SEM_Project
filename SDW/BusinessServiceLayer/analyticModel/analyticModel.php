<?php
require_once '../../libs/database.php';

class TrackingModel
{
    public
        $TrackID, $Cus_ID, $Ord_ID, $sp_id, $CusStatus, $RunStatus, $Ship_Add, $R_ID;


    // add feedback
    function addFeedback()
    {
        $sql = "insert into Feedback(Cus_ID,sp_id, FeedbackRate,FeedbackMessage, Ord_ID)values(:Cus_ID, :sp_ID, :FeedbackRate,:FeedbackMessage, :ord_ID)";
        $args = [':Cus_ID' => $this->Cus_ID, ':sp_ID' => $this->sp_id, ':FeedbackRate' => $this->FeedbackRate, 'FeedbackMessage' => $this->FeedbackMessage, ':ord_ID' => $this->Ord_ID];
        DB::run($sql, $args);
    }

    //change cusstatus to 1 after giving feedback, this will makes runner job stop showing this tracking status
    function changeCusStatus()
    {
        $sql = "update tracking set FeedbackStatus=:fs where TrackID=:track_id";
        $args = [':fs' => '1', ':track_id' => $this->TrackID];
        return DB::run($sql, $args);
    }

    //service provider view feedback
    function viewFeedback($a)
    {
        $sql = "select Feedback.FeedbackMessage,Feedback.FeedbackRate,customer.Cus_Username,Service.S_Name from Feedback inner join customer on Feedback.Cus_ID = customer.Cus_ID inner join sp on feedback.sp_id = sp.sp_id inner join order1 on order1.Ord_ID = Feedback.Ord_ID inner join Service on order1.Service_ID = Service.Service_ID where sp.sp_id=:sp_id ORDER BY Service.Service_ID";
        $args = [':sp_id' => $a];
        return DB::run($sql, $args);
    }


    //retrieve SP ID so that it can be inserted into feedback
    function getOrder_sp_id()
    {
        $sql = "select * from Tracking inner join order1 on Tracking.Ord_ID=order1.Ord_ID inner join service on service.Service_ID=order1.Service_ID inner join sp on service.sp_id = sp.sp_id where TrackID=:trackID";
        $args = [':trackID' => $this->TrackID];
        return DB::run($sql, $args);
    }
}
