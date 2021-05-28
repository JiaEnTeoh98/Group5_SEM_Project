<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/paymentController/paymentController.php';
session_start();

$payment = new paymentController();

$i = 0;
$data = $payment->preparePayment();
$data1 = $payment->checkDistinctSP();
$dataAddress = $payment->loadAddress();
$subtotal = 0;
?>
<html>

<head>
<script src="https://www.paypal.com/sdk/js?client-id=AS2yPDgeIthzwW_hXhYjaTTLLBI6o1f8vjV2H8KcgaPt_S8EP-xc59heqBhazRhqMvdWlYkg17-tYbq8&currency=MYR">
        // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>
<link href="../../src/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="mx-auto" style="width: 90%;">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
        <h5>Customer Homepage > Cart > Checkout</h5>

        <a href="../orderView/CusCart.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>

        <form method="POST">
            <div style="background-color:white" class="mt-5 p-3">
                <p class="h4"><strong>Summary</strong></p><br />
                <div class="px-3">
                  <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Service Name</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                                <th>Item Subtotal</th>
                            </tr>
                        </thead>

                        <?php foreach ($data as $row) {
                            $sub = $row['Unit_Price'] * $row['quantity']; ?>

                            <tr>
                                <td><?= $row['S_Name'] ?></td>
                                <td>RM <?= $row['Unit_Price'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td>RM <?= $sub ?><br />

                                </td>
                            </tr>
                        <?php
                            $subtotal = $subtotal + $sub;
                        }
                        ?>
                  </table>
							
                            <table width="100%" style="border:1px solid black:">
                            <tr>
                            <th><p class="h4"><strong>Delivery Address</strong></p><br /></th>
                            <th><p class="h4"><strong>Delivery fee for service provider(s)：</strong></p><br /></th>
                            </tr>
                            <tr>
                            <td>
                             <?php foreach ($dataAddress as $address) { ?>
                    
                    <div class="pl-4">
                        <p><?= $address['Cus_Addr1'] . ', ' . $address['Cus_Addr2'] . ',<br/>' . $address['Cus_PCode'] . ', ' . $address['Cus_City'] . ',<br/>' . $address['Cus_State'] ?>
                            <?php $_SESSION['shipping_address'] = $address['Cus_Addr1'] . ', ' . $address['Cus_Addr2'] . ', ' . $address['Cus_PCode'] . ', ' . $address['Cus_City'] . ', ' . $address['Cus_State'] ?>
                        </p>
                      <a class="mt-3 btn btn-outline-primary" href="../userProfileView/CustomerEditProfile.php">Change
                            Address</a>
                    </div>
                    
                <?php } ?>
                </div>
                </div>
                <br />
            </div>
            </td>
            <td>
            
                  
                  <div class="pr-5">
                      <?php foreach ($data1 as $delivery) { ?>
                          <em><?= $delivery['spname'] ?><br /></em>
                      <?php $i++;
                      } ?><br />
                      <p class="lead">Delivery fee per Service Provider: RM 6.00</p>
                      <p class="h5 text-dark">Total Delivery Fee = RM <?= $i * 6.00 ?></p>
                  </div>
                  <?php $total = $subtotal + $i * 6.00;
                  $_SEESION['subtotal'] = $subtotal;
                  $_SESSION['delivery_fee'] = $i * 6 ?>
             
  
              </td>
            </tr>
                            </table>
             

            <table width="100%">
            <tr>
            <td>
            
            <div style="background-color:white" class="my-5 p-3 clearfix">

             <p class="display-4">Pay By: </p>
        <div id="paypal-button-container" class="col-3"></div>


        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: 'MYR',
                                value: '<?= $total ?>',
                            },
                            shipping: {
                                name: {
                                    full_name: 'GGWP'
                                },
                                address: {
                                    address_line_1: '<?= $address["Cus_Addr1"]; ?>',
                                    address_line_2: '<?= $address["Cus_Addr2"]; ?>',
                                    admin_area_2: '<?= $address["Cus_City"]; ?>',
                                    admin_area_1: '<?= $address["Cus_State"]; ?>',
                                    postal_code: '<?= $address["Cus_PCode"]; ?>',
                                    country_code: 'MY'
                                }
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        alert('Transaction completed by ' +
                            '<?= $address["Cus_Name"]; ?>. Please click OK dont close the browser until you are redirected to Homepage'
                        );
                        var uniq = Math.round(new Date().getTime() / 1000);
                        window.location.href = "./paymentSuccessful.php?value=" + uniq;


                    });
                }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
            
        </script>
            </td>
            <td style="margin: left 50%;">
            <div class="float-right pr-5">
                    <table class="text-right">
                        <tr>
                            <th class="px-3 h4">Service(s) Subtotal</th>
                            <td class="h2">RM <?= $subtotal ?></td>
                        </tr>

                        <tr>
                            <th class="px-3 h4">Delivery Total</th>
                            <td class="h2">RM <?= $i * 6.00 ?></td>
                        </tr>
                        <tr>
                            <th class="px-3 h3">Total Payment</th>
                            <td class="display-4">RM <?= $subtotal + $i * 6.00 ?></td>

                            <?php
                            $_SESSION['subtotal'] = $subtotal;
                            $_SESSION['total'] = $total ?>
                        </tr>
                    </table>
                </div>


            </td>
            </tr>
            </table>


 
    </div>
               
            </div>
        </form>
       
</body>

</html>