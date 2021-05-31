<?php
require_once __DIR__ . '/../manageServiceModel/manageServiceModel.php';

class manageServiceController
{
    function viewSPService()
    {
        session_start();
        $ser = new ServiceManagementModel();
        $ser->sp_id = $_SESSION['sp_id'];
        return $ser->viewSPService();
    }


    function viewSpecificService($ser_id)
    {
        $ser = new ServiceManagementModel();
        $ser->Service_ID = $ser_id;
        return $ser->viewSpecificService();
    }

    //edit the exsting service
    function editService()
    {
        session_start();

        $ser = new ServiceManagementModel();
        $ser->S_Name = $_POST['sname'];
        $ser->Unit_Price = $_POST['sprice'];
        $ser->S_Desc = $_POST['sdes'];
        $ser->S_Stock = $_POST['sstock'];
        $ser->Service_ID = $_SESSION['EditID'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["sphoto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "pdf");

        if (in_array($imageFileType, $extensions_arr)) {
            $image_base64 = base64_encode(file_get_contents($_FILES['sphoto']['tmp_name']));
            $files = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
            $ser->S_Photo = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        }
        $ser->editService();
        $message = "Update Successfully!";
        echo "<script type = 'text/javascript'> alert('$message');
        window.location = ' ../../ApplicationLayer/manageServiceView/SPEditService.php?id=" . $_SESSION['EditID']."';</script>";

        
        exit;
    }

    function addService()
    {
        session_start();
        $ser = new ServiceManagementModel();
        $ser->S_Name = $_POST['sname'];
        $ser->Unit_Price = $_POST['sprice'];
        $ser->S_Desc = $_POST['sdes'];
        $ser->S_Stock = $_POST['sstock'];
        $ser->sp_id = $_SESSION['sp_id'];
        $ser->category = $_POST['scat'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["sphoto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "pdf");

        if (in_array($imageFileType, $extensions_arr)) {
            $image_base64 = base64_encode(file_get_contents($_FILES['sphoto']['tmp_name']));
            $files = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
            $ser->S_Photo = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        }
        $ser->addService();
        echo "<script>alert('Added Successfully')</script>";
    }

    function deleteService()
    {
        $ser = new ServiceManagementModel();
        $ser->Service_ID = $_POST['delete'];
        $ser->deleteService();
        header("Location: ../../ApplicationLayer/manageServiceView/SPUpdateService.php");
    }
}
