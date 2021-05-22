<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<html>

<head>
</head>

<body>
    <div class="mx-auto" style="width: 90%;">
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
                    <a href='/sdw/ApplicationLayer/userProfileView/SPLogout.php'
                        style="font-size: 20px; color: lightgreen;" class="nav-link">
                        <img src="/sdw/src/img/signout.png" /></a></li>

            </ul>
        </nav>
        <div class="container">
            <div class="justify-content-center row" style="margin-top: 3%">

                <div class="col-3 mx-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../../src/img/delivery.jpg" class="card-img-top" alt="Update ServiceP Provided"
                            height="180" />
                        <div class="card-body p-3">
                            <a href="../manageServiceView/SPUpdateService.php" class="btn btn-primary">Update Service
                                Provided</a>
                        </div>
                    </div>
                </div>
                <div class="col-3 mx-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../../src/img/order.jpg" class="card-img-top" alt="View Order" height="180" />
                        <div class="card-body p-3">
                            <a href="../orderView/SPViewOrder.php" class="btn btn-primary">View Order</a>
                        </div>
                    </div>
                </div>
                <div class="col-3 mx-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../../src/img/analytic.jpg" class="card-img-top" alt="Goods Delivery" height="180" />
                        <div class="card-body p-3">
                            <a href="../manageAnalyticView/SPAnalytic.php" class="btn btn-primary">View Analytic</a>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
</body>

</html>
