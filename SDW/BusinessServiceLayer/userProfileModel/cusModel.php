<?php
require_once '../../libs/database.php';

class cusModel
{
    public $Cus_Name, $Cus_Age, $Cus_Gender, $Cus_Telno, $Cus_Addr1, $Cus_Addr2, $Cus_PCode, $Cus_City, $Cus_State, $Cus_ID, $password;

    function loginCust()
    {
        $sql = "select * from customer where Cus_Username=:Cus_ID and Cus_Password=:password";
        $args = [':Cus_ID' => $this->username, ':password' => $this->password];
        $result = DB::run($sql, $args);
        return $result;
    }


    function registerCust()
    {
        $sql = "insert into customer (Cus_Name, Cus_Age, Cus_Gender, Cus_Telno, Cus_Addr1, Cus_Addr2, Cus_PCode, Cus_City, Cus_State, Cus_Username, Cus_Password) values (:Cus_Name, :Cus_Age, :Cus_Gender, :Cus_Telno, :Cus_Addr1, :Cus_Addr2, :Cus_PCode, :Cus_City, :Cus_State, :Cus_ID, :password)";
        $args = [':Cus_Name' => $this->Cus_Name, ':Cus_Age' => $this->Cus_Age, ':Cus_Gender' => $this->Cus_Gender, ':Cus_Telno' => $this->Cus_Telno, ':Cus_Addr1' => $this->Cus_Addr1, ':Cus_Addr2' => $this->Cus_Addr2, ':Cus_PCode' => $this->Cus_PCode, ':Cus_City' => $this->Cus_City, ':Cus_State' => $this->Cus_State, ':Cus_ID' => $this->Cus_ID, ':password' => $this->password];
        return DB::run($sql, $args);
    }

    public function checkUName()
    {
        $sql = "select * from customer where Cus_Username=:username";
        $args = [':username' => $this->Cus_ID];
        $result = DB::run($sql, $args);
        $record = $result->rowCount();
        return $record;
    }

    public function editCusProfile()
    {
        $sql = "update customer set Cus_Name=:Cus_Name, Cus_Age=:Cus_Age, Cus_Telno=:Cus_Telno, Cus_Gender=:Cus_Gender, Cus_Addr1=:Cus_Addr1, Cus_Addr2=:Cus_Addr2, Cus_PCode=:Cus_PCode, Cus_City=:Cus_City, Cus_State=:Cus_State, Cus_Password=:password where Cus_ID=:Cus_ID";
        $args = [':Cus_Name' => $this->Cus_Name, ':Cus_Age' => $this->Cus_Age, ':Cus_Telno' => $this->Cus_Telno, ':Cus_Gender' => $this->Cus_Gender,  ':Cus_Addr1' => $this->Cus_Addr1, ':Cus_Addr2' => $this->Cus_Addr2, ':Cus_PCode' => $this->Cus_PCode, ':Cus_City' => $this->Cus_City, ':Cus_State' => $this->Cus_State, ':password' => $this->password, ':Cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }

    public function viewCusProfile()
    {
        $sql = "select * from customer where Cus_ID =:Cus_ID";
        $args = [':Cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }
}