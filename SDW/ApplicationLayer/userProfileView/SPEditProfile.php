<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/userProfileController/spProfileController.php';

$sp = new spProfileController();
$data = $sp->viewSP();

if (isset($_POST['update'])) {
    $sp->editSP();
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
        <h5>Service Provider Homepage > Profile</h5>
        <a href="./SPHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <br />
        <?php
        foreach ($data as $row) {
        ?>
        Company Registration Certificate<br />

        <img src="<?= $row['spfiles'] ?>" width="35%" height="30%" />
        <br />
        <br />
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend ">
                    <span class="input-group-text">Name</span>
                </div>
                <input type="text" name="spname" class="form-control" value="<?= $row['spname'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Age</span>
                </div>
                <input type="text" name="spregnum" class="form-control" value="<?= $row['spregnum'] ?>">
            </div>


            <div class="input-group mb-3  col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contact No</span>
                </div>
                <input type="text" name="sptelno" class="form-control" value="<?= $row['sptelno'] ?>">
            </div>

            <div class="input-group mb-3  col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">SSM Registration Number</span>
                </div>
                <input type="text" disabled class="form-control" value="<?= $row['spregnum'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address</span>
                </div>
                <input type="text" name="spaddress" class="form-control" value="<?= $row['spaddress'] ?>">
            </div>
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email Address</span>
                </div>
                <input type="text" name="speadd" class="form-control" value="<?= $row['speadd'] ?>">
            </div>
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Password</span>
                </div>
                <input type="password" name="sppassword" class="form-control" value="<?= $row['sppassword'] ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-warning"
                onclick="return confirm('Are you sure you want to update?');" name="update">Update</button>

        </form>
        <?php } ?>
    </div>
</body>

</html>