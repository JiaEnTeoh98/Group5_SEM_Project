<?php
require_once __DIR__ . '/../trackingModel/TrackingModel.php';

class TrackingController
{

    function viewOnD()
    {
        session_start();
        $Tracking = new TrackingModel();
        $Tracking->Cus_ID = $_SESSION['Cus_ID'];
        return $Tracking->viewOnD();
    }

    function viewComp()
    {
        $Tracking = new TrackingModel();
        $Tracking->Cus_ID = $_SESSION['Cus_ID'];
        return $Tracking->viewComp();
    }

    function viewProgress($TrackID)
    {
        $Status = new TrackingModel();
        $Status->TrackID = $TrackID;
        return $Status->viewProgress();
    }

    function viewUnaccepted()
    {
        $Tracking = new TrackingModel();
        return $Tracking->viewUnaccepted();
    }

    function viewAccepted()
    {
        session_start();
        $Tracking = new TrackingModel();
        $Tracking->R_ID = $_SESSION['Runner_ID'];
        return $Tracking->viewAccepted();
    }

    function viewCompleted()
    {
        $Tracking = new TrackingModel();
        $Tracking->R_ID = $_SESSION['Runner_ID'];
        return $Tracking->viewCompleted();
    }

    function runAccept()
    {
        $Tracking = new TrackingModel();
        $Tracking->TrackID = $_POST['TrackID'];
        $Tracking->RunStatus = $_POST['RunStatus'];
        $Tracking->R_ID = $_SESSION['Runner_ID'];

        if ($Tracking->runAccept()) {
            $message = "Success Update!";
            echo "<script type='text/javascript'>alert('$message');
        window.location = '../trackingView/RunJobList.php?TrackID=" . $_POST['TrackID'] . "';</script>";
        }
    }

    function viewStatus($TrackID)
    {
        $Tracking = new TrackingModel();
        $Tracking->TrackID = $TrackID;
        return $Tracking->viewStatus();
    }

    function updateProgress($TrackID)
    {
        $Status = new TrackingModel();
        $Status->TrackID = $_POST['TrackID'];
        $Status->StatID = $_POST['StatID'];
        $Status->TrackDate = $_POST['TrackDate'];
        $Status->TrackProcess = $_POST['TrackProcess'];
        $Status->TrackTime = $_POST['TrackTime'];
        if ($Status->updateProgress()) {
            $message = "Success Update!";
            echo "<script type='text/javascript'>alert('$message');
        window.location = '../trackingView/RunUpdate.php?TrackID=" . $_POST['TrackID'] . "';</script>";
        }
    }

    function updateDeliveryStatus()
    {
        $Status = new TrackingModel();
        $Status->TrackID = $_POST['received'];
        $Status->updateDeliveryStatus();
        echo "<script type='text/javascript'>alert('Thanks for using SMS Sdn Bhd');
        window.location = '../trackingView/CusTrackList.php';</script>";
    }

    function viewRunner($TrackID)
    {
        $Status = new TrackingModel();
        $Status->TrackID = $TrackID;
        return $Status->viewRunner();
    }
}