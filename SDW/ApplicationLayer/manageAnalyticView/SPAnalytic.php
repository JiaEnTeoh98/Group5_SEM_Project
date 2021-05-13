<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/analyticController/analyticController.php';



$Feedback = new analyticController();
$data1 = $Feedback->viewFeedback();
?>
<html>

<body>
    <div class="mx-auto" style="width: 90%">
        <nav class="navbar navbar-expand-sm bg-light rounded my-3" style="height: 10%;">
            <ul class="navbar-nav navbar-left mr-auto">
                <li class="nav-brand"><a style="font-family: 'Pacifico', cursive; font-size: 30px;" class="nav-link"
                        href="/sdw/ApplicationLayer/userProfileView/SPHomePage.php">SMS</a></li>
            </ul>
            <ul class="navbar-nav mr-2">
                <li class="nav-item justify-content-center align-self-center px-4">
                    <a href="/sdw/ApplicationLayer/userProfileView/SPEditProfile.php">
                        <span style="color:grey; font-size: 36px" class="material-icons md-48">account_circle </span>
                    </a>
                </li>
                <li class="nav-item justify-content-center align-self-center px-5">
                    <a href='/sdw/ApplicationLayer/userProfileView/SPLogin.php'
                        style="font-size: 20px; color: lightgreen;" class="nav-link">
                        <img src="/sdw/src/img/signout.png" /></a></li>

            </ul>
        </nav>
        <a href="../userProfileView/SPHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
    </div>

    <div class="mx-auto" style="width: 90%">
        <h5>ServiceProviderHomepage > AnalyticReport</h5>
        <hr>
        <?php
        $j = 0;
        ?>
        <h4>Number of customers = <?php echo $data1->rowCount() ?></h4>
        <br>
        <h4>Rating and Reviews</h4><br>
        <table width="40%">
            <?php
            $i = 1;
            foreach ($data1 as $row1) {
                echo "<tr>"
                    . "<td><b>" . $row1['Cus_Username'] . "</b> rates " . $row1['S_Name'] . "<br/><i>" . $row1['FeedbackMessage'] . "</i>" . "</td>"
                    . "<td>Rate : " . $row1['FeedbackRate'] . " Star</td>";
            ?>
            <?php
                $i++;
                echo "</tr><tr><td><hr></td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>