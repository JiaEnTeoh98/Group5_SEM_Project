<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/userProfileController/cusProfileController.php';


$cus = new cusProfileController();

if (isset($_POST['login'])) {
    $cus->loginCus();
}
if (isset($_POST['register'])) {
    $cus->registerCus();
}
?>


<html>

<head>
</head>

<body>
    <div class="mx-auto" style="width: 90%">
        <nav class="navbar navbar-expand-sm bg-light rounded-pill mt-3" style="height: 10%">
            <ul class="navbar-nav navbar-left mr-auto">
                <li class="nav-brand">
                    <a style="font-family: 'Pacifico', cursive; font-size: 30px" class="nav-link" href="#">SMS</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-2">
                <li class="nav-item justify-content-center align-self-center pl-md-5">
                    <a style="font-size: 20px;" data-toggle="modal" data-target="#registerModal" class="nav-link">SIGN
                        UP</a>
                </li>
                <li class="nav-item justify-content-center align-self-center mr-5">
                    <a style="font-size: 20px;" data-toggle="modal" data-target="#loginModal" class="nav-link">LOGIN</a>
                </li>
            </ul>
        </nav>

        <div id="carouselss" class="carousel slide w-100 mt-3" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselss" data-slide-to="0" class="active"></li>
                <li data-target="#carouselss" data-slide-to="1"></li>
                <li data-target="#carouselss" data-slide-to="2"></li>
                <li data-target="#carouselss" data-slide-to="3"></li>
                <li data-target="#carouselss" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <img class="d-block w-100 h-75" src="../../src/img/111.jpg" alt="First slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Food Delivery</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 h-75" src="../../src/img/222.jpg" alt="Second slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Goods Delivery</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 h-75" src="../../src/img/333.jpg" alt="Third slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Medical Delivery</h2>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100 h-75" src="../../src/img/444.jpg" alt="Fourth slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Pet Assist</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 h-75" src="../../src/img/555.jpg" alt="Fifth slide" />
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Manage Tracking</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselss" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselss" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <!-- Modal for Log In-->
    <form action="" method="POST">
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign In as Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons md-48">
                                    account_circle
                                </span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    lock
                                </span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="d-flex flex-column col-8">
                                <a href="./RunnerLogin.php"><small>Click here if you are runner</small></a>
                                <a href="./SPLogin.php"><small>Click here if you are service provider</small></a>
                            </div>
                            <div class="col-4 d-flex flex-row-reverse mr-0">
                                <button type="submit" name="login" class="btn btn-lg btn-primary mr-2">Login</button>
                                <button type="button" class="btn btn-lg btn-secondary mr-2"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal for Sign Up-->
    <form method="POST">
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Name
                                </span>
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Age
                                </span>
                            </div>
                            <input type="number" class="form-control" name="age" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <img class="input-group-text" src="../../src/img/gender.png" />
                            </div>
                            <div class="form-control">
                                <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
                                <label class="radio-inline pl-2"><input type="radio" name="gender"
                                        value="Female">Female</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    add_ic_call
                                </span>
                            </div>
                            <input type="text" class="form-control" name="telno" placeholder="Contact Number" required>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    home
                                </span>
                            </div>
                            <input type="text" class="form-control" name="address_line_1"
                                placeholder="Address Line 1 (House No and Street)" required>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="address_line_2"
                                placeholder="Address Line 2(Apartment, suite , unit, building, floor)" required>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <input type="text" class="form-control" name="address_p_code" placeholder="Postal Code"
                                    required>
                            </div>
                            <div class="col mb-2">
                                <input type="text" class="form-control" name="address_city" placeholder="City" required>
                            </div>

                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="address_state" placeholder="State" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    account_circle
                                </span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    lock
                                </span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="register" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>