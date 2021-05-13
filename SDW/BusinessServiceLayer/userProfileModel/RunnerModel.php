<?php
require_once '../../libs/database.php';

class RunnerModel
{

    public $R_ID, $R_Name, $R_ContactNo, $R_DLNo, $R_Username, $R_Password, $R_DRPhoto;

    function loginRunner()
    {
        $sql = "select * from runner where R_Username=:username and R_Password=:Rpassword";
        $args = [':username' => $this->R_Username, ':Rpassword' => $this->R_Password];
        return DB::run($sql, $args);;
    }

    function registerRunner()
    {
        $sql = "insert into runner (`R_Name`, `R_ContactNo`, `R_DLNo`, `R_Username`, `R_Password`, `R_Photo`) values(:R_Name, :R_TelNo, :RDLNo, :Rusername, :Rpassword, :runnerfiles)";
        $args = [':R_Name' => $this->R_Name,  ':R_TelNo' => $this->R_ContactNo, 'RDLNo' => $this->R_DLNo, ':Rusername' => $this->R_Username, ':Rpassword' => $this->R_Password, ':runnerfiles' => $this->R_DRPhoto];
        return DB::run($sql, $args);
    }

    function viewRunner()
    {
        $sql = "select * from runner where R_ID=:R_ID";
        $args = [':R_ID' => $this->R_ID];
        return DB::run($sql, $args);
    }

    public function editRunner()
    {
        $sql = "update runner set R_Name=:R_Names, R_ContactNo=:R_TelNos, R_Password=:R_Passwords where R_ID=:R_IDs";
        $args = [':R_Names' => $this->R_Name, ':R_TelNos' => $this->R_ContactNo, ':R_Passwords' => $this->R_Password, ':R_IDs' => $this->R_ID];
        return DB::run($sql, $args);
    }

    function deleteRunner()
    {
        $sql = "delete from runner where R_ID=:R_ID";
        $args = [':R_ID' => $this->R_ID];
        return DB::run($sql, $args);
    }

    public function checkUName()
    {
        $sql = "select * from runner where R_Username=:username";
        $args = [':username' => $this->R_Name];
        $result = DB::run($sql, $args);
        $record = $result->rowCount();
        return $record;
    }
}