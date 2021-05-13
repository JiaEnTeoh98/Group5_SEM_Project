<?php
require_once __DIR__ . '/../paymentData/paymentData.php';

class paymentController
{


    //load address at checkout page
    public function loadAddress()
    {
        $pay = new paymentData();
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        return $pay->loadAddress();
    }

    //load address when check receipt
    public function loadShippingAddress($Ord_IDs)
    {
        $pay =  new paymentData();
        $pay->Ord_Array = explode(",", $Ord_IDs);
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        return $pay->loadShippingAddress();
    }


    //load Receipt details
    public function loadReceipt()
    {
        $pay = new paymentData();
        $pay->P_ID = $_POST['P_ID'];
        return $pay->loadReceipt();
    }

    //string to array of order ids when viewing order details from Receipt
    public function viewOrderArray($string)
    {
        $pay = new paymentData();
        $pay->Ord_Array = explode(",", $string);
        return $pay->viewOrderArray();
    }

    //insert into tracking table
    function insertTracking()
    {
        $pay = new paymentData();
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        $address = $_SESSION['shipping_address'];
        foreach ($_SESSION['order_ids'] as $a) {
            $pay->insertTracking($a, $address);
        }
    }

    //view checkout summary
    public function preparePayment()
    {
        $pay = new paymentData();
        $pay->Ord_IDs = implode(",", $_SESSION["order_ids"]);
        $pay->Ord_Array = $_SESSION['order_ids'];
        return $pay->viewOrderArray();
    }

    //check duplicate service provider to ensure only one delivery fee is charged for one service provider
    //done by Ong Chin Ei
    public function checkDistinctSP()
    {
        $pay = new paymentData();
        $pay->Ord_Array =  $_SESSION['order_ids'];
        return $pay->checkDistinctSP();
    }

    //update payment status after payment is made
    public function updateOrderStatus()
    {
        $pay = new paymentData();
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        $pay->Ord_IDs = implode(",",  $_SESSION['order_ids']);
        foreach ($_SESSION['order_ids'] as $selected) {
            $pay->Ord_ID = $selected;
            $pay->updateOrderP();
        }
        $pay->T_Payment = $_SESSION['total'];
        $pay->subtotal = $_SESSION['subtotal'];
        $pay->delivery_fee = $_SESSION['delivery_fee'];
        $pay->insertPayment();
    }

    //view list of Receipt based on the customer id
    public function viewReceiptList()
    {
        $pay = new paymentData();
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        return $pay->viewReceiptList();
    }



    //validate transcation id
    function validatePayment($a)
    {
        $now = time();
        if ($a < $now + 5 && $a > $now - 5)
            return 1;
        else return 0;
    }

    //update Stock quantity when customer has completed the payment
    function updateStock()
    {
        $pay = new paymentData();
        $ids = $pay->OrderwithStock($_SESSION['order_ids']);
        $quantity =  $_SESSION['quantity'];
        foreach ($ids as $key => $selected) {
            $pay->updateStock($quantity[$key], $selected);
        }
    }
}