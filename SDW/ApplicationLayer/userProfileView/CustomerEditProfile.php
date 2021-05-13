<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/userProfileController/cusProfileController.php';

$cus = new cusProfileController();
$data = $cus->viewCusProfile();

if (isset($_POST['update'])) {
    $cus->editCusProfile();
}
?>

<html>

<head>
    <title></title>
</head>

<body>
    <div class="mx-auto" style="width: 90%;">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
        <h5>Customer Homepage > Profile</h5>
        <a href="../viewServiceView/CusHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <br />
        <?php
        foreach ($data as $row) {
        ?>
        <form method="POST">
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend ">
                    <span class="input-group-text">Name</span>
                </div>
                <input type="text" name="name" class="form-control" value="<?= $row['Cus_Name'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Age</span>
                </div>
                <input type="text" name="age" class="form-control" value="<?= $row['Cus_Age'] ?>">
            </div>
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Gender</span>
                </div>
                <div class="form-control">
                    <label class="radio-inline"><input type="radio" name="gender" value="Male" <?php if ($row['Cus_Gender'] == 'Male') {
                                                                                                        echo "checked";
                                                                                                    } ?>> Male</label>
                    <label class="radio-inline pl-2"><input type="radio" name="gender" value="Female" <?php if ($row['Cus_Gender'] == 'Female') {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                        Female</label>
                </div>
            </div>

            <div class="input-group mb-3  col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contact No</span>
                </div>
                <input type="text" name="telno" class="form-control" value="<?= $row['Cus_Telno'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address Line 1</span>
                </div>
                <input type="text" name="address_line_1" class="form-control " placeholder="Address Line 1"
                    value="<?= $row['Cus_Addr1'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address Line 2</span>
                </div>
                <input type="text" name="address_line_2" class="form-control col-6" placeholder="Address Line 2"
                    value="<?= $row['Cus_Addr2'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Postal Code</span>
                </div>
                <input type="text" name="address_p_code" class="form-control" value="<?= $row['Cus_PCode'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">City</span>
                </div>
                <input type="text" name="address_city" class="form-control" value="<?= $row['Cus_City'] ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">State</span>
                </div>
                <input type="text" name="address_state" class="form-control" value="<?= $row['Cus_State'] ?>">
            </div>
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Password</span>
                </div>
                <input type="password" name="password" class="form-control" value="<?= $row['Cus_Password'] ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-warning"
                onclick="return confirm('Are you sure you want to update?');" name="update">Update</button>

        </form>
        <?php } ?>
    </div>
</body>

</html>