<?php
require_once '../../libs/database.php';

class paymentData
{
    public $P_ID;
    public $Cus_ID;
    public $Ord_Array;
    public $Ord_IDs;
    public $T_Payment;
    public $subtotal;
    public $delivery_fee;

    //ok
    //display address in CusCheckout.php ok
    public function loadAddress()
    {
        $sql = "select * from Customer WHERE Cus_ID=:Cus_ID";
        $args = [':Cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }

    public function loadShippingAddress()
    {
        //$in  = str_repeat('?,', count($this->Ord_Array) - 1) . '?';
        $sql = "select ship_add from tracking inner join order1 on tracking.Ord_ID=order1.Ord_ID WHERE tracking.Ord_ID=:Ord_ID";
        $args = [':Ord_ID' => $this->Ord_Array[0]];
        return DB::run($sql, $args);
    }


    //ok
    //check distinct sp to calculate delivery fee. Different sp from 1 sp is counted as one delivery
    public function checkDistinctSP()
    {
        $in  = str_repeat('?,', count($this->Ord_Array) - 1) . '?';
        $sql = "select distinct sp.sp_id, sp.spname from ((service inner join order1 on order1.Service_ID = service.Service_ID) inner join sp on sp.sp_id = service.sp_id) where order1.Ord_ID in ($in)";
        $stmt = DB::run($sql, $this->Ord_Array);
        return $stmt;
    }

    //ok
    //when click check out at CusCart.php
    // public function preparePayment()
    // {
    //     $in  = str_repeat('?,', count($this->Ord_Array) - 1) . '?';
    //     $sql = "select * from Order1 inner join service on Order1.Service_ID = service.Service_ID where Ord_ID in ($in)";
    //     return DB::run($sql, $this->Ord_Array);
    // }


    //ok
    //when click a specific orders
    public function viewOrderArray()
    {
        $in  = str_repeat('?,', count($this->Ord_Array) - 1) . '?';
        $sql = "select * from Order1 inner join service on Order1.Service_ID = service.Service_ID where Ord_ID in ($in)";
        return DB::run($sql, $this->Ord_Array);
    }

    //ok
    //update payment status after successful payment
    public function updateOrderP()
    {
        $sql = "update order1 set p_status=1 where Ord_ID=:Ord_ID";
        $args = [':Ord_ID' => $this->Ord_ID];
        return DB::run($sql, $args);
    }


    function insertTracking($a, $address)
    {
        $sql = "insert into Tracking (Cus_ID, Ord_ID, CusStatus, RunStatus,Ship_Add) values (:Cus_ID,:Ord_ID,:CusStatus,:RunStatus, :Ship_Add)";
        $args = [':Cus_ID' => $this->Cus_ID, ':Ord_ID' => $a, ':CusStatus' => 'On Delivery', 'RunStatus' => 'unaccepted', 'Ship_Add' => $address];
        return DB::run($sql, $args);
    }

    //ok
    //insert into payment after payment is complete
    public function insertPayment()
    {
        $sql = "insert into payment (Ord_IDs, subtotal, delivery_fee, T_Payment, Cus_ID) values (:Ord_IDs, :subtotal, :delivery_fee, :T_Payment, :Cus_ID)";
        $args = [':Ord_IDs' => $this->Ord_IDs, ':subtotal' => $this->subtotal, ':delivery_fee' => $this->delivery_fee, ':T_Payment' => $this->T_Payment, ':Cus_ID' => $this->Cus_ID];
        DB::run($sql, $args);
    }


    //ok
    //view Receipt list made by specific customer
    public function viewReceiptList()
    {
        $sql = "select * from payment where Cus_ID=:Cus_ID order by P_date DESC";
        $args = [':Cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }

    //ok
    public function loadReceipt()
    {
        $sql = "select payment.*, Customer.Cus_Name from (payment inner join customer on payment.Cus_ID = Customer.Cus_ID) where payment.P_ID=:P_ID";
        $args = [':P_ID' => $this->P_ID];
        return DB::run($sql, $args);
    }

    //ok
    // find respective Service_ID  related to order ID
    function OrderwithStock($array)
    {
        $in  = str_repeat('?,', count($array) - 1) . '?';
        $sql = "select service.Service_ID from order1 inner join service on order1.Service_ID = service.Service_ID where order1.Ord_ID in ($in)";
        $stmt = DB::run($sql, $array);
        $result = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        return $result;
    }

    //ok
    //reduce stock after completing the payment
    function updateStock($buy, $ser_id)
    {
        $sql = "update service set S_Stock=S_Stock-:buy where Service_ID=:Service_ID";
        $args = [':buy' => $buy, ':Service_ID' => $ser_id];
        DB::run($sql, $args);
    }
}
