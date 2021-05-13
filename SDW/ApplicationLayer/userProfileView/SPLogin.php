<?php
require_once __DIR__ . '/../../BusinessServiceLayer/userProfileController/spProfileController.php';
require __DIR__ . '/../../src/bootstrap.php';

$sp = new spProfileController();
if (isset($_POST['signin'])) {
    $sp->loginSP();
}

if (isset($_POST['register'])) {
    $sp->registerSP();
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
    </div>
    <div class="splogin">
        <form class="spform " method="POST">
            <h2 class="display-4">Service Provider Sign In</h2>
            <div class="form-group row">
                <label class="col-3 col-form-label">Username</label>
                <div class="col-8">
                    <input type="text" name="spusername" class="form-control" placeholder="Company username">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label">Password</label>
                <div class="col-8">
                    <input type="password" name="sppassword" class="form-control" id="inputPassword3"
                        placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8">
                    <a data-toggle="modal" data-target="#spregisterModal" class="spreg"><small>Click here if you don't
                            have an account</small></a>
                    <br />
                    <a style="color:black" href="./CusLogin.php"><small>Click here if you are customer</small></a><br />
                    <a style="color:black" href="./RunnerLogin.php"><small>Click here if you are
                            runner</small></a><br />
                </div>
                <div class="col-4">
                    <button type="submit" name="signin" class="btn btn-success">Sign In</button>
                </div>
            </div>
        </form>
    </div>



    <!-- Modal for Sign Up-->
    <form method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="spregisterModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <img class="input-group-text"
                                    src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iTGluZSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNjQgNjQiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDY0IDY0IiB3aWR0aD0iMTZweCI+PHBhdGggZD0ibTMxLjAwNiA0Mi4wMzUtNi4zLTIuNzYtMi4yMDktMi45NDVjMS40OTUtLjg2NSAyLjUwMy0yLjQ4MiAyLjUwMy00LjMzdi05YzAtMi43NTctMi4yNDMtNS01LTVoLTRjLTIuNzU3IDAtNSAyLjI0My01IDV2MmMwIC40MzEuMjc1LjgxMi42ODQuOTQ5bDYgMmMuMjk0LjA5OC42MTUuMDU1Ljg3MS0uMTE3bDMtMi0xLjEwOS0xLjY2NC0yLjU5MyAxLjcyOS00Ljg1My0xLjYxOHYtMS4yNzljMC0xLjY1NCAxLjM0Ni0zIDMtM2g0YzEuNjU0IDAgMyAxLjM0NiAzIDN2OWMwIDEuNjU0LTEuMzQ2IDMtMyAzaC00Yy0xLjY1NCAwLTMtMS4zNDYtMy0zdi00aC0ydjRjMCAxLjg0OCAxLjAwOCAzLjQ2NSAyLjUwMyA0LjMzbC0yLjE5NiAyLjkyOC02LjE2NyAyLjQ3MmMtMS45MDguNzY0LTMuMTQgMi41ODYtMy4xNCA0LjY0MXYxNi42MjljMCAuNTUyLjQ0NyAxIDEgMWgzdi0yaC0ydi0xNS42MjljMC0xLjIzMy43MzktMi4zMjYgMS44ODQtMi43ODVsNC44MjctMS45MzUtLjY5NyA0LjE4NGMtLjA1Ny4zMzguMDY0LjY4Mi4zMi45MTEuMTg2LjE2Ni40MjQuMjU0LjY2Ni4yNTQuMDkyIDAgLjE4NS0uMDEzLjI3NC0uMDM5bDQuNTA5LTEuMjg4LTEuNzc1IDE0LjIwM2MtLjAzOS4zMTEuMDcuNjIyLjI5NS44NDFsMy4wODMgM2MuMTg2LjE4MS40MzYuMjgzLjY5Ny4yODNoLjAxNGMuMjY2LS4wMDQuNTE5LS4xMTMuNzAzLS4zMDNsMi45MTctM2MuMjEyLS4yMTguMzEzLS41Mi4yNzUtLjgyMWwtMS43NzUtMTQuMjAzIDQuNTA5IDEuMjg4Yy4wODkuMDI2LjE4Mi4wMzkuMjc0LjAzOS4yNDIgMCAuNDgtLjA4OC42NjYtLjI1NC4yNTYtLjIyOS4zNzctLjU3Mi4zMi0uOTExbC0uNjg2LTQuMTE2IDQuOTAzIDIuMTQ4YzEuMDkyLjQ3OCAxLjc5NyAxLjU1NyAxLjc5NyAyLjc0OHY3LjM4NWgydi03LjM4NWMwLTEuOTg1LTEuMTc1LTMuNzgzLTIuOTk0LTQuNTh6bS0xNS41MDYtNS4wMzVoNWwyLjA2NSAyLjc1NC0yLjI4MyAxLjUyMi0yLjI4MiAxLjUyMi0yLjI4My0xLjUyMi0yLjI4My0xLjUyMnptLTIuNzc2IDQuNzQyIDIuODYyIDEuOTA4LTMuMzM5Ljk1NHptNy4yMjQgMTcuOTA1LTEuODg1IDEuOTM4LTIuMDEtMS45NTUgMS44Mi0xNC41NTQuMDcyLS4wMjFjLjAzNi4wMDIuMDczLjAwMi4xMDkgMGwuMDcyLjAyMXptLjQ2Ni0xNS45OTcgMi44NjItMS45MDguNDc4IDIuODYyeiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGQ9Im0zMiA2MmgtMnYyaDNjLjU1MyAwIDEtLjQ0OCAxLTF2LTdoLTJ6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTggNTBoMnYxNGgtMnoiIGZpbGw9IiMwMDAwMDAiLz48cGF0aCBkPSJtMjYgNTBoMnYxNGgtMnoiIGZpbGw9IiMwMDAwMDAiLz48cGF0aCBkPSJtMjggMTRoMnYxMmgtMnoiIGZpbGw9IiMwMDAwMDAiLz48cGF0aCBkPSJtMzQgMTRoMnYxMmgtMnoiIGZpbGw9IiMwMDAwMDAiLz48cGF0aCBkPSJtMjggMzBoMnY4aC0yeiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGQ9Im0zNCAzMGgydjEyaC0yeiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGQ9Im0yMiAxNGgydjJoLTJ6IiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTQ1IDM0aDEyYy41NTMgMCAxLS40NDggMS0xdi0xMmMwLS41NTItLjQ0Ny0xLTEtMWgtMTJjLS41NTMgMC0xIC40NDgtMSAxdjEyYzAgLjU1Mi40NDcgMSAxIDF6bTExLTJoLTR2LTEwaDR6bS0xMC0xMGg0djEwaC00eiIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGQ9Im02MiAxMnYtMmgtMjB2LTFjMC0uNTUyLS40NDctMS0xLTFoLTN2LTdjMC0uNTUyLS40NDctMS0xLTFoLTEzYy0uMjg4IDAtLjU2Mi4xMjUtLjc1My4zNDFsLTcgOGMtLjE1OS4xODMtLjI0Ny40MTctLjI0Ny42NTl2N2gydi02aDE1di0yaC0xMy43OTZsNS4yNS02aDExLjU0NnY3YzAgLjU1Mi40NDcgMSAxIDFoM3Y1MmgtNHYyaDI1Yy41NTMgMCAxLS40NDggMS0xdi00OGMwLS41NDktLjQ0Mi0uOTk2LS45OTEtMWwtMi4wMDktLjAxN3YtMS45ODN6bS0xMSAxLjkxNnYtMS45MTZoMnYxLjkzM3ptLTQtLjAzM3YtMS44ODNoMnYxLjg5OXptLTItMS44ODN2MS44NjZsLTMtLjAyNXYtMS44NDF6bTMgNTB2LTEyaDZ2MTJ6bTggMHYtMTNjMC0uNTUyLS40NDctMS0xLTFoLThjLS41NTMgMC0xIC40NDgtMSAxdjEzaC00di0xOGgxOHYxOHptNC0yNGgtNHYyaDR2MmgtMTh2LTJoMTJ2LTJoLTEydi0yMi4xNTlsMTggLjE1MXptLTMtMjQuMDM0LTItLjAxN3YtMS45NDloMnoiIGZpbGw9IiMwMDAwMDAiLz48L3N2Zz4K" />
                            </div>
                            <input type="text" class="form-control" name="spname"
                                placeholder="Service Provider or Enterprise Name">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <img class="input-group-text"
                                    src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNNDk4Ljc5MSwxNjEuMTI3Yy0xNy41NDUtMTcuNTQ2LTQ2LjA5NC0xNy41NDUtNjMuNjQ1LDAuMDA0Yy01LjM5OCw1LjQwMy0zOS44NjMsMzkuODk2LTQ1LjEyOCw0NS4xNjZWODcuNDI2ICAgIGMwLTEyLjAyLTQuNjgxLTIzLjMyLTEzLjE4MS0zMS44MTlMMzM0LjQxMiwxMy4xOEMzMjUuOTEzLDQuNjgsMzE0LjYxMiwwLDMwMi41OTIsMEg0NS4wMThjLTI0LjgxMywwLTQ1LDIwLjE4Ny00NSw0NXY0MjIgICAgYzAsMjQuODEzLDIwLjE4Nyw0NSw0NSw0NWgzMDBjMjQuODEzLDAsNDUtMjAuMTg3LDQ1LTQ1VjMzMy42MzFMNDk4Ljc5LDIyNC43NjdDNTE2LjM3NywyMDcuMTgxLDUxNi4zODEsMTc4LjcxNSw0OTguNzkxLDE2MS4xMjcgICAgeiBNMzAwLjAxOSwzMGMyLjgzNCwwLDguMjk1LTAuNDkxLDEzLjE4LDQuMzkzbDQyLjQyNiw0Mi40MjdjNC43Niw0Ljc2MSw0LjM5NCw5Ljk3OCw0LjM5NCwxMy4xOGgtNjBWMzB6IE0zNjAuMDE4LDQ2NyAgICBjMCw4LjI3MS02LjcyOCwxNS0xNSwxNWgtMzAwYy04LjI3MSwwLTE1LTYuNzI5LTE1LTE1VjQ1YzAtOC4yNzEsNi43MjktMTUsMTUtMTVoMjI1djc1YzAsOC4yODQsNi43MTYsMTUsMTUsMTVoNzV2MTE2LjMyMyAgICBjMCwwLTQ0LjI1NCw0NC4yOTItNDQuMjU2LDQ0LjI5M2wtMjEuMjAzLDIxLjIwNGMtMS42NDYsMS42NDYtMi44ODgsMy42NTQtMy42MjQsNS44NjNsLTIxLjIxNCw2My42NCAgICBjLTEuNzk3LDUuMzktMC4zOTQsMTEuMzMzLDMuNjI0LDE1LjM1YzQuMDIzLDQuMDIzLDkuOTY4LDUuNDE5LDE1LjM1LDMuNjI0bDYzLjY0LTIxLjIxM2MyLjIwOS0wLjczNiw0LjIxNy0xLjk3Nyw1Ljg2My0zLjYyNCAgICBsMS44Mi0xLjgyVjQ2N3ogTTMyNi4zNzgsMzEyLjQyN2wyMS4yMTMsMjEuMjEzbC04LjEwMyw4LjEwM2wtMzEuODE5LDEwLjYwNmwxMC42MDYtMzEuODJMMzI2LjM3OCwzMTIuNDI3eiBNMzY4LjgsMzEyLjQyMiAgICBsLTIxLjIxMy0yMS4yMTNjMTEuMjk2LTExLjMwNSw2MS40NjUtNjEuNTE3LDcyLjEwNS03Mi4xNjZsMjEuMjEzLDIxLjIxM0wzNjguOCwzMTIuNDIyeiBNNDc3LjU3MywyMDMuNTU4bC0xNS40NjMsMTUuNDc2ICAgIGwtMjEuMjEzLTIxLjIxM2wxNS40NjgtMTUuNDgxYzUuODUyLTUuODQ5LDE1LjM2Ni01Ljg0OCwyMS4yMTQsMEM0ODMuNDI2LDE4OC4xOSw0ODMuNDU3LDE5Ny42NzMsNDc3LjU3MywyMDMuNTU4eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTI4NS4wMTgsMTUwaC0yMTBjLTguMjg0LDAtMTUsNi43MTYtMTUsMTVzNi43MTYsMTUsMTUsMTVoMjEwYzguMjg0LDAsMTUtNi43MTYsMTUtMTVTMjkzLjMwMiwxNTAsMjg1LjAxOCwxNTB6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8L2c+CjwvZz4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMjI1LjAxOCwyMTBoLTE1MGMtOC4yODQsMC0xNSw2LjcxNi0xNSwxNXM2LjcxNiwxNSwxNSwxNWgxNTBjOC4yODQsMCwxNS02LjcxNiwxNS0xNVMyMzMuMzAyLDIxMCwyMjUuMDE4LDIxMHoiIGZpbGw9IiMwMDAwMDAiLz4KCTwvZz4KPC9nPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0yMjUuMDE4LDI3MGgtMTUwYy04LjI4NCwwLTE1LDYuNzE2LTE1LDE1czYuNzE2LDE1LDE1LDE1aDE1MGM4LjI4NCwwLDE1LTYuNzE2LDE1LTE1UzIzMy4zMDIsMjcwLDIyNS4wMTgsMjcweiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTIyNS4wMTgsMzMwaC0xNTBjLTguMjg0LDAtMTUsNi43MTYtMTUsMTVzNi43MTYsMTUsMTUsMTVoMTUwYzguMjg0LDAsMTUtNi43MTYsMTUtMTVTMjMzLjMwMiwzMzAsMjI1LjAxOCwzMzB6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8L2c+CjwvZz4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMjg1LjAxOCw0MjJoLTkwYy04LjI4NCwwLTE1LDYuNzE2LTE1LDE1czYuNzE2LDE1LDE1LDE1aDkwYzguMjg0LDAsMTUtNi43MTYsMTUtMTVTMjkzLjMwMiw0MjIsMjg1LjAxOCw0MjJ6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
                            </div>
                            <input type="text" class="form-control" name="spregnum"
                                placeholder="Company's Registration Number">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    add_ic_call
                                </span>
                            </div>
                            <input type="text" class="form-control" name="sptelno" placeholder="Contact Number">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    email
                                </span>
                            </div>
                            <input type="email" class="form-control" name="speadd" placeholder="Email Address">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    home
                                </span>
                            </div>
                            <input type="text" class="form-control" name="spaddress" placeholder="Address">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    account_circle
                                </span>
                            </div>
                            <input type="text" class="form-control" name="spusername" placeholder="Username">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    lock
                                </span>
                            </div>
                            <input type="password" class="form-control" name="sppassword" placeholder="Password" />
                        </div>

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text material-icons">
                                    description
                                </span>
                            </div>
                            <div class="custom-file form-control">
                                <input type="file" class="custom-file-input" name="spfiles" id="spfiles" required />
                                <label class="custom-file-label">SSM Certificate</label>
                            </div>
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