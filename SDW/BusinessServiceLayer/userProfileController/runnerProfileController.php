<?php require_once __DIR__ . '/../userProfileModel/RunnerModel.php';
class runnerProfileController
{
    public function loginRun()
    {
        $run = new RunnerModel();
        $run->R_Username = $_POST['rusername'];
        $run->R_Password = $_POST['rpassword'];
        $record = $run->loginRunner();
        if ($record->rowCount() == 1) {
            session_start();
            foreach ($record as $selected) {
                $_SESSION['Runner_ID'] = $selected['R_ID'];
            }
            header("location: ../userProfileView/RunnerHomePage.php");
        } else {
            echo "<script>alert('Wrong username or password');window.location.replace('../userProfileView/RunnerLogin.php');</script>";
        }
    }

    public function registerRun()
    {
        $run = new RunnerModel();
        $run->R_Name = $_POST['rname'];
        $run->R_DLNo = $_POST['rdriveno'];
        $run->R_ContactNo = $_POST['rtelno'];
        $run->R_Username = $_POST['rusername'];
        $run->R_Password = $_POST['rpassword'];

        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["rfiles"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "pdf");

        if (in_array($imageFileType, $extensions_arr)) {
            $image_base64 = base64_encode(file_get_contents($_FILES['rfiles']['tmp_name']));
            $files = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
            $run->R_DRPhoto = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        }

        $record = $run->checkUName();
        if ($record == 0) {
            $run->registerRunner();
        } else {
            echo "<script>alert('Username is taken. Please try another username')</script>";
        }
    }

    public function editRunner()
    {
        $run = new RunnerModel();
        $run->R_Name = $_POST['rname'];
        $run->R_ContactNo = $_POST['rtelno'];
        $run->R_Password = $_POST['rpassword'];
        $run->R_ID = $_SESSION['Runner_ID'];
        $run->editRunner();
        echo "<script>alert('Updated Successfully')</script>";
        header("location: ../../ApplicationLayer/userProfileView/RunnerEditDelete.php");
    }

    public function viewRunner()
    {
        session_start();
        $run = new RunnerModel();
        $run->R_ID = $_SESSION['Runner_ID'];
        return $run->viewRunner();
    }
}