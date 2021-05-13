<?php
require __DIR__ . '/../../src/bootstrap.php';
session_start();
?>
<html>

<head>

</head>

<body>
    <div class="mx-auto" style="width: 90%;">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
        <script>
            var query;

            function updateSearch(search) {
                query = document.getElementById(search).value;
            };

            function redirectPage() {
                window.location.href = "./CusSearchProductList.php?query=" + query;
            }
        </script>
        <div class="input-group">
            <input type="text" onInput="updateSearch('search')" id="search" name="search" class="form-control" />
            <div class="input-group-append">
                <button onclick="redirectPage()"> Search</button>
            </div>
        </div>
        <form method="POST">
            <div class="container">
                <div class="justify-content-center row" style="margin-top: 3%">

                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="../../src/img/fd.jpg" class="card-img-top" alt="Food Delivery" />
                            <div class="card-body p-3">
                                <a href="./CusProductList.php?list=1" class="btn btn-outline-primary">Food Delivery</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="../../src/img/gd.jpg" class="card-img-top" alt="Goods Delivery" />
                            <div class="card-body p-3">
                                <a href="./CusProductList.php?list=2" class="btn btn-outline-primary">Good
                                    Delivery</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="justify-content-center row mt-2">

                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="../../src/img/pa.jpg" class="card-img-top" alt="Pet Assist" />
                            <div class="card-body p-3">
                                <a href="./CusProductList.php?list=3" class="btn btn-outline-primary">Pet Assist</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="../../src/img/md.jpg" class="card-img-top" alt="Medical Delivery" />
                            <div class="card-body p-3">
                                <a href="./CusProductList.php?list=4" class="btn btn-outline-primary">Medical
                                    Delivery</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</body>

</html>