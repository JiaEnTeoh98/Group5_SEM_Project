<?php
require __DIR__ . '/../../src/bootstrap.php';
session_start();
require_once '../../BusinessServiceLayer/orderController/orderController.php';

$ord = new orderController();
$data = $ord->viewCart();

if (isset($_POST['update'])) {
    $ord->updateOrder();
    $data = $ord->viewCart();
}

if (isset($_POST['delete'])) {
    $ord->deleteOrder();
}


if (isset($_POST['submit'])) {
    if (isset($_POST['check_list'])) {
        $_SESSION["order_ids"] = $_POST['check_list'];
        $_SESSION["quantity"] = $_POST['quantity'];
        $ord->updateOrder();
        $dir = __DIR__;
        echo '<script type="text/javascript">';
        echo 'window.location.href = `../paymentView/CusCheckout.php`;';
        echo '</script>';
        // header(`location: $dir/../../payment/paymentView/CusCheckout.php`);
    } else {
        echo "<script>alert('Please select at least an item to check out')</script>";
    }
}


?>
<html>

<head>
</head>

<body>
    <div class="mx-auto" style="width: 90%;">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
        <h5>Customer Homepage > Cart</h5>
        <a href="../viewServiceView/CusHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>

        <form action="" method="POST">
            <div style="background-color:white" class="mt-5 p-3">
                <table class="table">
                    <thead class="">
                        <tr class="h5">
                            <th></th>
                            <th>Photo</th>
                            <th>Service Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Item Subtotal</th>
                        </tr>
                    </thead>
                    <?php foreach ($data as $row) {
                        $a = uniqid();
                        $b = uniqid();
                        $c = uniqid();
                        $d = uniqid();
                        $e = uniqid();
                        if ($row['S_Stock'] <= 0) {
                            echo "<tr class='lead font-italic' style='background-color: lightgrey; text-decoration: line-through'>";
                        } else {
                            echo "<tr class='lead'>";
                        } ?>


                        <td><input checked id=<?= $e ?> type="checkbox" name="check_list[]" value=<?= $row['Ord_ID'] ?> onChange="check('<?= $b ?>','<?= $e ?>')" <?php if ($row['S_Stock'] <= 0) {
                                                                                                                                                                    } ?>>
                        </td>
                        <td><img src="<?= $row['S_Photo'] ?>" height="180" width="155" /><br />
                        </td>
                        <td><a href="./CusProductInfo.php?Service_ID=<?= $row['Service_ID'] ?>"><?= $row['S_Name'] ?></a><br />
                            <p class="small"> Stock left: <?= $row['S_Stock'] ?></p>
                        </td>
                        <td>

                            <p>RM <?= $row['Unit_Price'] ?></p>
                            <!-- use for calculation: price -->
                            <input type="hidden" id='<?= $a ?>' value="<?= $row['Unit_Price'] ?>" />
                        </td>

                        <td>
                            <!-- calculate latest price -->
                            <input type="number" name="quantity[]" id="<?= $b ?>" size="5" min="0" max="<?= $row['S_Stock'] ?>" <?php
                                                                                                                                if ($row['S_Stock'] <= 0) {
                                                                                                                                    echo "value=0 disabled ";
                                                                                                                                } else {
                                                                                                                                    echo "value= $row[quantity]";
                                                                                                                                } ?> onChange="calculateRow('<?= $a ?>','<?= $b ?>','<?= $c ?>')" />
                        </td>
                        <td>
                            <!-- use for calculation: display -->
                            <?php
                            if ($row['S_Stock'] == 0) {
                                $itemsubtotal = 0;
                            } else {
                                $itemsubtotal = $row['Unit_Price'] * $row['quantity'];
                            } ?>

                            <!-- use for calculation: item subtotal -->

                            <p id='<?= $c ?>'><?php echo "RM " . ($itemsubtotal) ?></p>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <script>
                        function calculateRow(unit_amount, quantity, subtotal) {
                            var unitv = document.getElementById(unit_amount).value;
                            var quantityv = document.getElementById(quantity).value;
                            var subtotalv = parseFloat(quantityv) * parseFloat(unitv);
                            document.getElementById(subtotal).innerHTML = "RM " + subtotalv;
                        };

                        function check(quantity, checkbox) {
                            var check = document.getElementById(checkbox);
                            if (check.checked) {
                                document.getElementById(quantity).disabled = false;
                            } else
                                document.getElementById(quantity).disabled = true;
                        }
                    </script>
                </table>


            </div>
            <button type="submit" name="delete" OnClick="return confirm('Are you sure you want to delete this');" class="my-3 btn btn-block btn-outline-danger">
                <h6 class="h4">Delete Selected</h6>
            </button>
            <button type="submit" name="update" class="my-3 btn btn-block btn-outline-warning">
                <h6 class="h4">Update Cart</h6>
            </button>
            <button type="submit" name="submit" class="my-3 btn btn-block btn-outline-success">
                <h6 class="h4">Check Out</h4>
            </button>

            <br />

    </div>
    </form>
    </div>
</body>