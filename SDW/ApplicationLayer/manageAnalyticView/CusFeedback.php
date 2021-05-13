<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/analyticController/analyticController.php';

session_start();
$Feedback = new analyticController();
if (isset($_POST['TrackID'])) {
    $_SESSION['track_id'] = $_POST['TrackID'];
}
$data = $Feedback->getOrder_sp_id();

if (isset($_POST['submit'])) {
    $Feedback->addFeedback();
}
?>
<html>

<body>
    <div class="mx-auto" style="width: 90%">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
    </div>

    <div class="mx-auto" style="width: 90%">
        <h5>Customer Homepage > TrackingList > Feedback</h5>
        <hr>
        <h1 align="center">Rate Our Services</h1>
        <table border="2" align="center" width="50%" height="20%">
            <tr>
                <th style="font-family: 'Rockwell', cursive;font-size: 20px" bgcolor="red" width="20%">Poor</th>
                <th style="font-family: 'Rockwell', cursive;font-size: 20px" bgcolor="orange" width="20%">Fair</th>
                <th style="font-family: 'Rockwell', cursive;font-size: 20px" bgcolor="yellow" width="20%">Average</th>
                <th style="font-family: 'Rockwell', cursive;font-size: 20px" bgcolor="lightgreen" width="20%">Good</th>
                <th style="font-family: 'Rockwell', cursive;font-size: 20px" bgcolor="cyan" width="20%">Excellent</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
        </table>
        <hr>
        <table align="center">
            <tr>
                <td>Delivery Services</td>
                <td><input type="number" id="1" onchange="calc()" min="1" max=5></td>
            </tr>
            <tr>
                <td>Pickup Services</td>
                <td><input type="number" id="2" onchange="calc()" min=1 max=5></td>
            </tr>
            <tr>
                <td>Customer Services</td>
                <td><input type="number" id="3" onchange="calc()" min=1 max=5></td>
            </tr>
            <tr>
                <td>Runner Attitude</td>
                <td><input type="number" id="4" onchange="calc()" min=1 max=5></td>
            </tr>
            <form action="" method="POST">
                <?php foreach ($data as $row) { ?>
                    <input type="hidden" name="sp_id" value="<?= $row['sp_id'] ?>">
                    <input type="hidden" name="Ord_ID" value="<?= $row['Ord_ID'] ?>">

                <?php } ?>

                <tr>
                    <td></td>
                    <input type="hidden" name="trackid" value="<?= $_SESSION['track_id'] ?>">
                    <td><input type="hidden" name="FeedbackRate" id="FeedbackRate"></td>
                </tr>
                <tr>
                    <td>Comments</td>
                    <td><textarea name="FeedbackMessage" id="FeedbackMessage" cols="40" rows="4" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" id="submit" name="submit" value="Submit Feedback"></td>
                </tr>

            </form>

        </table>
    </div>

</body>
<script type="text/javascript">
    function calc() {
        var a = document.getElementById("1").value;
        var b = document.getElementById("2").value;
        var c = document.getElementById("3").value;
        var d = document.getElementById("4").value;
        var e = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d);
        var f = parseInt(e / 4);
        document.getElementById("FeedbackRate").value = f;
    }
</script>

</html>