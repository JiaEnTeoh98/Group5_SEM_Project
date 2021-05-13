<?php
require_once  __DIR__ . '/../userProfileModel/cusModel.php';

class cusProfileController
{
    public function loginCus()
    {
        $cus = new cusModel();
        $cus->username = $_POST['username'];
        $cus->password = $_POST['password'];
        $record = $cus->loginCust();
        if ($record->rowCount() == 1) {
            session_start();
            foreach ($record as $selected) {
                $_SESSION['Cus_ID'] = $selected['Cus_ID'];
            }
            $_SESSION["username"] = $_POST['username'];
            header("location: ../../ApplicationLayer/viewServiceView/CusHomePage.php");
        } else {
            echo "<script>alert('Wrong username or password');window.location.replace('../../ApplicationLayer/userProfileView/CusLogin.php');</script>";
        }
    }

    public function registerCus()
    {
        $customer = new cusModel();
        $customer->Cus_Name = $_POST['name'];
        $customer->Cus_Age = $_POST['age'];
        $customer->Cus_Gender = $_POST['gender'];
        $customer->Cus_Telno = $_POST['telno'];
        $customer->Cus_Addr1 = $_POST['address_line_1'];
        $customer->Cus_Addr2 = $_POST['address_line_2'];
        $customer->Cus_PCode = $_POST['address_p_code'];
        $customer->Cus_City = $_POST['address_city'];
        $customer->Cus_State = $_POST['address_state'];
        $customer->Cus_ID = $_POST['username'];
        $customer->password = $_POST['password'];

        $record = $customer->checkUName();
        if ($record == 0) {
            $customer->registerCust();
            echo "<script>alert('Register Successfully')</script>";
        } else {
            echo "<script>alert('Username is taken. Please try another username')</script>";
        }
    }

    public function editCusProfile()
    {
        $customer = new cusModel();
        $customer->Cus_Name = $_POST['name'];
        $customer->Cus_Age = $_POST['age'];
        $customer->Cus_Gender = $_POST['gender'];
        $customer->Cus_Telno = $_POST['telno'];
        $customer->Cus_Addr1 = $_POST['address_line_1'];
        $customer->Cus_Addr2 = $_POST['address_line_2'];
        $customer->Cus_PCode = $_POST['address_p_code'];
        $customer->Cus_City = $_POST['address_city'];
        $customer->Cus_State = $_POST['address_state'];
        $customer->password = $_POST['password'];
        $customer->Cus_ID = $_SESSION['Cus_ID'];

        $customer->editCusProfile();
        echo "<script>alert('Updated Successfully')</script>";

        header("location: ../../ApplicationLayer/userProfileView/CustomerEditProfile.php");
    }

    public function viewCusProfile()
    {
        session_start();
        $customer = new cusModel();
        $customer->Cus_ID = $_SESSION['Cus_ID'];
        return $customer->viewCusProfile();
    }
}