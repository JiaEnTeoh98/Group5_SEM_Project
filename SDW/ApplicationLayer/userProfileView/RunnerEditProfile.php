<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/userProfileController/runnerProfileController.php';

$run = new runnerProfileController();
$data = $run->viewRunner();
if (isset($_POST['update'])) {
    $run->editRunner();
}
?>

<html>

<head>
    <title></title>
</head>

<body>
    <div class="mx-auto" style="width: 90%;">
        <nav class="navbar navbar-expand-sm bg-light rounded my-3" style="height: 10%;">
            <ul class="navbar-nav navbar-left mr-auto">
                <li class="nav-brand">
                    <a style="font-family: 'Pacifico', cursive; font-size: 30px;" class="nav-link"
                        href="/sdw/ApplicationLayer/userProfileView/RunnerHomePage.php">SMS</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-2">
                <li class="nav-item justify-content-center align-self-center px-4">
                    <a href="">
                        <span style="color:grey; font-size: 36px" class="material-icons">account_circle </span>
                    </a>
                </li>
                <li class="nav-item justify-content-center align-self-center px-5">
                    <a href='/sdw/ApplicationLayer/userProfileView/RunnerLogin.php'
                        style="font-size: 20px; color: lightgreen;" class="nav-link">
                        <img src="/sdw/src/img/signout.png" /></a>
                </li>
            </ul>
        </nav>
        <h5>Runner Homepage > Profile</h5>
        <a href="./RunnerHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <br />
        <form method="POST">
            <?php
            foreach ($data as $row) {
            ?>
            Driving License Photo<br />
            <img src="<?= $row['R_Photo'] ?>" width="35%" height="30%" />
            <br />
            <br />


            <div class=" input-group mb-3 col-6">
                <div class="input-group-prepend ">
                    <span class="input-group-text">Name</span>
                </div>
                <input type="text" name="rname" class="form-control" value="<?= $row['R_Name'] ?>">
            </div>

            <div class="input-group mb-3  col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contact No</span>
                </div>
                <input type="text" name="rtelno" class="form-control" value="<?= $row['R_ContactNo'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Driving License Number</span>
                </div>
                <input type="text" name="rdriveno" disabled class="form-control" value="<?= $row['R_DLNo'] ?>">
            </div>
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Password</span>
                </div>
                <input type="password" name="rpassword" class="form-control" value="<?= $row['R_Password'] ?>">
            </div>

            <button class="btn btn-primary btn-lg btn-warning"
                onclick="return confirm('Are you sure you want to update?');" type="submit"
                name="update">Update</button>

        </form>

        <?php } ?>
    </div>
</body>

</html>