<?php
require_once '../../libs/database.php';

class ServiceManagementModel
{
    public $list, $Service_ID, $category, $sp_id, $S_Name, $S_Photo, $S_Desc, $S_Stock, $Unit_Price, $minus;

    //view list of services prepared by a specific service provider
    function viewSPService()
    {
        $sql = "select * from service where sp_id =:sp_id";
        $args = [':sp_id' => $this->sp_id];
        return DB::run($sql, $args);
    }

    //view service details before editing the details in SPEditService.php
    function viewSpecificService()
    {
        $sql = "select * from service where Service_ID=:ser_id";
        $args = [':ser_id' => $this->Service_ID];
        return DB::run($sql, $args);
    }

    //add new service in SPAdd.php
    function addService()
    {
        $sql = "insert into service (S_Name, Unit_Price, S_Desc, S_Stock, sp_id, S_Photo, Category) values (:sname, :unitprice, :sdesc, :sstock, :spid, :sphoto, :category)";
        $args = [':sname' => $this->S_Name, ':unitprice' => $this->Unit_Price, ':sdesc' => $this->S_Desc, ':sstock' => $this->S_Stock, ':spid' => $this->sp_id, ':sphoto' => $this->S_Photo, ':category' => $this->category];
        return DB::run($sql, $args);
    }

    //edit service in SPEditService.php
    function editService()
    {
        $sql = "update service set S_Name=:sname, S_Stock=:sstock, Unit_Price=:unitprice, S_Desc=:sdesc, S_Photo=:sphoto where Service_ID=:ser_id";
        $args = [':sname' => $this->S_Name, ':sstock' => $this->S_Stock, ':unitprice' => $this->Unit_Price, ':sdesc' => $this->S_Desc, ':sphoto' => $this->S_Photo, ':ser_id' => $this->Service_ID];
        DB::run($sql, $args);
        $sql1 = "update order1 set Unit_Price=:unitprice where Service_ID=:ser_id and p_status=0";
        $args1 = [':unitprice' => $this->Unit_Price, ':ser_id' => $this->Service_ID];
        DB::run($sql1, $args1);
    }


    //delete service in SPUpdateService.php
    function deleteService()
    {
        $sql = "delete from service where Service_ID=:ser_id";
        $args = ['ser_id' => $this->Service_ID];
        return DB::run($sql, $args);
    }
}
