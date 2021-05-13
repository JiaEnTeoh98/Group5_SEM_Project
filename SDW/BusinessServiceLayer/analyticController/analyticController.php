<?php
require_once __DIR__ . '/../analyticModel/analyticModel.php';

class analyticController
{
    function addFeedback()
    {
        session_start();
        $Feedback = new TrackingModel();
        $Feedback->TrackID = $_POST['trackid'];
        $Feedback->Cus_ID = $_SESSION['Cus_ID'];
        $Feedback->sp_id = $_POST['sp_id'];
        $Feedback->Ord_ID = $_POST['Ord_ID'];
        $Feedback->FeedbackRate = $_POST['FeedbackRate'];
        $Feedback->FeedbackMessage = $_POST['FeedbackMessage'];
        $Feedback->addFeedback();
        $Feedback->changeCusStatus();
        $message = "Thank You For Using Our Services!";

        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/trackingView/CusTrackList.php';</script>";
    }

    function viewFeedback()
    {
        session_start();
        $Feedback = new TrackingModel();
        return $Feedback->viewFeedback($_SESSION['sp_id']);
    }


    function getOrder_sp_id()
    {
        $Status = new TrackingModel();
        $Status->TrackID = $_SESSION['track_id'];
        return  $Status->getOrder_sp_id();
    }
}
