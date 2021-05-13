<?php
require_once '../../libs/database.php';

class ServiceModel
{
    public $list, $Service_ID, $sp_id, $S_Name, $S_Photo, $S_Desc, $S_Stock, $Unit_Price, $minusS;

    function viewProductList()
    {
        $sql = "select * from service where Category=:list";
        $args = [':list' => $this->list];
        return DB::run($sql, $args);
    }

    function viewSearchList()
    {
        $sql = "select * from service where `S_Name` like :search";
        $args = [':search' => "%" . $this->S_Name . "%"];
        return DB::run($sql, $args);
    }

    function viewSortedFromLow()
    {
        $sql = "select * from service where Category=:list ORDER BY Unit_Price";
        $args = [':list' => $this->list];
        return DB::run($sql, $args);
    }

    function viewSortedByRating()
    {
        $sql = "select *, AVG(FeedbackRate) AS ave from service inner join order1 on service.Service_ID=order1.Service_ID inner join feedback on order1.Ord_ID=feedback.Ord_ID where Category=:list GROUP BY Service.Service_ID ORDER BY ave desc";
        $args = [':list' => $this->list];
        return DB::run($sql, $args);
    }
    function viewServicewithoutRating()
    {

        $sql = "select * FROM Service AS S1 WHERE Category=:list and not exists (select S2.Service_ID from Feedback inner join order1 on Feedback.Ord_ID=order1.Ord_ID inner join Service AS S2 on order1.Service_ID=S2.Service_ID where S1.Service_ID=S2.Service_ID)";
        $args = [':list' => $this->list];
        return DB::run($sql, $args);
    }
}
