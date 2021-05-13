<?php
require_once __DIR__ . '/../../libs/database.php';

class SPModel
{
    public $sp_id, $spname, $spregnum, $sptelno, $speadd, $spaddress, $spusername, $sppassword, $spfiles;

    function registerSP()
    {
        $sql = "insert into sp (`spname`, `spregnum`, `sptelno`, `speadd`, `spaddress`, `spusername`, `sppassword`, `spfiles`) values(:spname, :spregnum,:sptelno, :speadd, :spaddress, :spusername, :sppassword, :spfiles)";
        $args = [':spname' => $this->spname, ':spregnum' => $this->spregnum, ':sptelno' => $this->sptelno, ':speadd' => $this->speadd, ':spaddress' => $this->spaddress, ':spusername' => $this->spusername, ':sppassword' => $this->sppassword, ':spfiles' => $this->spfiles];
        DB::run($sql, $args);
    }

    function loginSP()
    {
        $sql = "select * from sp where spusername=:spusername and sppassword=:sppassword";
        $args = [':spusername' => $this->spusername, ':sppassword' => $this->sppassword];
        return DB::run($sql, $args);
    }

    function viewSP()
    {
        $sql = "select * from sp where sp_id=:sp_id";
        $args = [':sp_id' => $this->sp_id];
        return DB::run($sql, $args);
    }

    public function editSP()
    {
        $sql = "update sp set spname=:spname, sptelno=:sptelno, spaddress=:spaddress, speadd=:speadd, sppassword=:sppassword where sp_id=:sp_id";
        $args = [':spname' => $this->spname, ':sptelno' => $this->sptelno, ':spaddress' => $this->spaddress, ':speadd' => $this->speadd,  ':sppassword' => $this->sppassword, ':sp_id' => $this->sp_id];
        return DB::run($sql, $args);
    }


    function checkspreg()
    {
        $sql = "select * from sp where spusername=:spusername";
        $args = [':spusername' => $this->spusername];
        $result = DB::run($sql, $args);
        $record = $result->rowCount();
        return $record;
    }
}