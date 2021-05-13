<?php
require_once '../../libs/database.php';

class orderModel
{
    public $Ord_ID, $Service_ID, $Unit_Price, $quantity, $Cus_ID;

    public function displayCart()
    {
        $sql = "select * from (order1 inner join service on order1.Service_ID = service.Service_ID) where order1.Cus_ID=:Cus_ID AND order1.p_status=0 ORDER BY service.sp_id, service.Service_ID";
        $args = [':Cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }

    //  create order by adding to cart using given quantity
    function addOrd()
    {
        $sql = "insert into order1(Service_ID, Unit_Price, quantity, Cus_ID) values (:Service_ID, :Unit_Price, :quantity, :Cus_ID)";
        $args = [':Service_ID' => $this->Service_ID, ':Unit_Price' => $this->Unit_Price, ':quantity' => $this->quantity, ':Cus_ID' => $this->Cus_ID];
        DB::run($sql, $args);
    }

    // update existing order to prevent duplicate item
    function updateOrd()
    {
        $sql = "update order1 set quantity = quantity +:quantity where Service_ID=:Service_ID and Cus_ID=:Cus_ID";
        $args = [':Service_ID' => $this->Service_ID, ':quantity' => $this->quantity, ':Cus_ID' => $this->Cus_ID];
        DB::run($sql, $args);
    }

    // to check duplicate item in the cart
    function checkDuplicateItem()
    {
        $sql = "select * from order1 where p_status=0 and Service_ID=:Service_ID and Cus_ID=:Cus_ID";
        $args = [':Service_ID' => $this->Service_ID, ':Cus_ID' => $this->Cus_ID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    //update cart after user change quantity
    function updateOrder1()
    {
        $sql = "update order1 set quantity=:quantity where Ord_ID=:order_id";
        $args = [':quantity' => $this->quantity, ':order_id' => $this->Ord_ID];
        return DB::run($sql, $args);
    }

    //view product info after going into CusProductInfo.php
    function viewServiceDetails()
    {
        $sql = "select * from service inner join sp on service.sp_id=sp.sp_id where Service_ID =:Service_ID";
        $args = [':Service_ID' => $this->Service_ID];
        return DB::run($sql, $args);
    }

    function deleteOrder()
    {
        $sql = "delete from order1 where Ord_ID =:Ord_ID";
        $args = [':Ord_ID' => $this->Ord_ID];
        return DB::run($sql, $args);
    }

    function viewOrdertoPrepare()
    {
        $sql = "select * from order1 inner join service on order1.Service_ID=service.Service_ID inner join sp on service.sp_id=sp.sp_id where sp.sp_id=:sp_id and order1.doneStatus!=1";
        $args = [':sp_id' => $_SESSION['sp_id']];
        return DB::run($sql, $args);
    }

    function changeDoneStatus()
    {
        $sql = "update order1 set doneStatus=1 where Ord_ID=:ord_id";
        $args = [':ord_id' => $this->Ord_ID];
        return DB::run($sql, $args);
    }
}