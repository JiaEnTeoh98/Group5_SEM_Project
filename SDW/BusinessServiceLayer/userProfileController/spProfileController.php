<?php require_once __DIR__ . '/../userProfileModel/SPModel.php';
class spProfileController
{
    public function loginSP()
    {
        session_start();
        $sp = new SPModel();
        $sp->spusername = $_POST['spusername'];
        $sp->sppassword = $_POST['sppassword'];
        $record = $sp->loginSP();
        if ($record->rowCount() == 1) {
            session_start();
            foreach ($record as $selected) {
                $_SESSION['sp_id'] = $selected['sp_id'];
            }
            header("location: ../../ApplicationLayer/userProfileView/SPHomePage.php");
        } else {
            header("location: ../../ApplicationLayer/userProfileView/SPLogin.php");
            echo "<script>alert('Wrong username or password')</script>";
        }
    }

    public function registerSP()
    {
        $sp = new SPModel();
        $sp->spname = $_POST['spname'];
        $sp->spregnum = $_POST['spregnum'];
        $sp->sptelno = $_POST['sptelno'];
        $sp->speadd = $_POST['speadd'];
        $sp->spaddress = $_POST['spaddress'];
        $sp->spusername = $_POST['spusername'];
        $sp->sppassword = $_POST['sppassword'];

        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["spfiles"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "pdf");

        if (in_array($imageFileType, $extensions_arr)) {
            $image_base64 = base64_encode(file_get_contents($_FILES['spfiles']['tmp_name']));
            $files = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
            $sp->spfiles = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        }

        $record = $sp->checkspreg();
        if ($record == 0) {
            $sp->registerSP();
            echo "<script>alert('Uploaded Successfully. Please wait for reply from administrator')</script>";
        } else {
            echo "<script>alert('Username is taken. Please try another username')</script>";
        }
    }

    public function editSP()
    {
        $sp = new SPModel();
        $sp->spname = $_POST['spname'];
        $sp->spregnum = $_POST['spregnum'];
        $sp->sptelno = $_POST['sptelno'];
        $sp->speadd = $_POST['speadd'];
        $sp->spaddress = $_POST['spaddress'];
        $sp->sppassword = $_POST['sppassword'];
        $sp->sp_id = $_SESSION['sp_id'];
        $sp->editSP();
        echo "<script>alert('Updated Successfully')</script>";
        header("location: ../userProfileView/SPEditProfile.php");
    }

    public function viewSP()
    {
        session_start();
        $sp = new SPModel();
        $sp->sp_id = $_SESSION['sp_id'];
        return $sp->viewSP();
    }
}
