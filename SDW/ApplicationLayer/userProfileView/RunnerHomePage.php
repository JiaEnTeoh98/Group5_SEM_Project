<?php require __DIR__ . '/../../src/bootstrap.php'; ?>
<html>

<div class="mx-auto" style="width: 90%;">
    <nav class="navbar navbar-expand-sm bg-light rounded my-3" style="height: 10%;">
        <ul class="navbar-nav navbar-left mr-auto">
            <li class="nav-brand"><a style="font-family: 'Pacifico', cursive; font-size: 30px;" class="nav-link"
                    href="/sdw/ApplicationLayer/userProfileView/RunnerHomePage.php">SMS</a></li>
        </ul>
        <ul class="navbar-nav mr-2">
            <li class="nav-item justify-content-center align-self-center px-4">
                <a href="/sdw/ApplicationLayer/userProfileView/RunnerEditProfile.php">
                    <span style="color:grey; font-size: 36px" class="material-icons">account_circle </span>
                </a>
            </li>
            <li class="nav-item justify-content-center align-self-center px-5">
                <a href='/sdw/ApplicationLayer/userProfileView/RunnerLogout.php'
                    style="font-size: 20px; color: lightgreen;" class="nav-link">
                    <img src="/sdw/src/img/signout.png" /></a></li>
        </ul>
    </nav>

    <div class="justify-content-center row" style="margin-top: 3%">

        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="../../src/img/fd.jpg" class="card-img-top" alt="Food Delivery" />
                <div class="card-body p-3">
                    <a href="../trackingView/RunJobList.php" class="btn btn-outline-primary">Job
                        List</a>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
