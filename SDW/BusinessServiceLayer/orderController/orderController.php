<?php
require_once __DIR__ . '/../orderModel/orderModel.php';

class orderController
{

    public function viewCart()
    {
        $ord = new orderModel();
        $ord->Cus_ID = $_SESSION['Cus_ID'];
        return $ord->displayCart();
    }

    function addOrder()
    {
        $ord = new orderModel();
        $ord->Service_ID = $_POST['Service_ID'];
        $ord->Unit_Price = $_POST['Unit_Price'];
        $ord->quantity = $_POST['quantity'];
        $ord->Cus_ID = $_SESSION['Cus_ID'];

        $duplicate = $ord->checkDuplicateItem();
        if ($duplicate == 0) {
            $ord->addOrd();
        } else $ord->updateOrd();
        $message = "Success Added into Cart";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    function updateOrder()
    {
        if (isset($_POST['check_list'])) {
            $ord = new orderModel();
            $a = $_POST['check_list'];
            $b = $_POST['quantity'];

            foreach ($a as $key => $selected) {
                $ord->Ord_ID = $selected;
                $ord->quantity = $b[$key];
                $ord->updateOrder1();
            }
            echo "<script type='text/javascript'>alert('Updated Successfully');</script>";
        } else {
            echo "<script>alert('Please select at least an item to update')</script>";
        }
    }

    //used to display data when going to Cus ProductInfo.php
    function viewDetails($Service_ID)
    {
        $ord = new orderModel();
        $ord->Service_ID = $Service_ID;
        return $ord->viewServiceDetails();
    }

    function deleteOrder()
    {
        if (isset($_POST['check_list'])) {
            $ord = new orderModel();
            $a = $_POST['check_list'];

            foreach ($a as $selected) {
                $ord->Ord_ID = $selected;
                $ord->deleteOrder();
            }
            echo "<script type='text/javascript'>alert('Deleted Successfully');</script>";
        } else {
            echo "<script>alert('Please select at least an item to delete')</script>";
        }
        header("location: ../../ApplicationLayer/orderView/CusCart.php");
    }

    function viewOrdertoPrepare()
    {
        $ord = new orderModel();
        return $ord->viewOrdertoPrepare();
    }

    function changeDoneStatus()
    {
        $ord = new orderModel();
        $ord->Ord_ID = $_POST['done'];
        $ord->changeDoneStatus();
        header("location: ../../ApplicationLayer/orderView/SPViewOrder.php");
    }
}
