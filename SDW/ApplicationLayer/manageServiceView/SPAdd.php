<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/manageServiceController/manageServiceController.php';

$ser = new manageServiceController();
if (isset($_POST['submit'])) {
    $ser->addService();
}
?>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <h5>Service Provider Homepage > Update Service > Edit Service</h5>
        <a href="./SPUpdateService.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <br />
        <form class="mt-5" method="POST" enctype="multipart/form-data">
            <div class=" p-4 rounded" style="background-color:#eeeef4">
                <div class="form-group">
                    <label>Product or service name</label>
                    <input type="text" name="sname" class="form-control col-3">
                </div>
                <div class="form-group">
                    <label>Unit Price</label>
                    <input type="text" name="sprice" class="form-control col-3">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="sdes" class="form-control col-6" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>Stocks available</label>
                    <input type="number" name="sstock" class="form-control col-3">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="scat" class="form-control col-3" required>
                        <option value="1">Food</option>
                        <option value="2">Goods</option>
                        <option value="3">Pets Assist</option>
                        <option value="4">Medical</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="sphoto" class="form-control-file" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-lg">
                    <span class="material-icons">check</span>
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>

</html>
