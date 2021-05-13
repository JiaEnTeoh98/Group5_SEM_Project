<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/manageServiceController/manageServiceController.php';

$manService = new manageServiceController();
$data = $manService->viewSPService();

if (isset($_POST['delete'])) {
    $manService->deleteService();
}
?>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Update Service</title>
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
        <h5>Service Provider Homepage > Update Service</h5>
        <a href="../userProfileView/SPHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <br />
        <button type="button" class="mt-3 btn btn-primary"><a href="SPAdd.php" style="color:white">+ Add a
                Service</a></button>

        <table class="table table-light mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <?php $i = 1 ?>
            <tbody>
                <?php foreach ($data as $row) { ?> <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $row['S_Name'] ?></td>
                    <td><?= $row['Unit_Price'] ?></td>
                    <td><?= $row['S_Stock'] ?></td>
                    <form method="POST">
                        <td>
                            <a class="material-icons" href='./SPEditService.php?id=<?= $row['Service_ID'] ?>'
                                style="background-color:yellow; color:lightgrey">edit</a>
                            <button type="submit" name="delete"
                                OnClick="return confirm('Are you sure you want to delete this');"
                                style="background-color: #f44336;color:lightgrey;" value="<?= $row['Service_ID'] ?>"
                                class="material-icons">
                                delete_outline
                            </button>
                        </td>
                    </form>
                </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>



</body>

</html>