<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop | SignUp OR SignIn</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="resources/logo.png">
</head>

<body class="main-body">
    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">
            <!-- Header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <h1 class="text-center">E-Shop</h1>
                        <p class="title01">Hi, Welcome to E-Shop</p>
                    </div>
                </div>
            </div>
            <!-- End Header -->
            <!-- Content -->
            <div class="col-12 p-3">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background"></div>
                    <!-- Signup Box -->
                    <div class="col-12 col-lg-6 d-none" id="signUpBox">
                        <div class="row g-2">
                            <div class="cil-12">
                                <p class="title02">Create New Account</p>
                            </div>
                            <!-- Error Msg -->
                            <div class="col-12 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="msg">

                                </div>
                            </div>
                            <!-- End Error Msg -->
                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter Password">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select" id="gender">
                                    <?php
                                    $resultset = Database::search("SELECT * FROM `gender`");
                                    $num = $resultset->num_rows;
                                    for ($i = 0; $i < $num; $i++) {
                                        $data = $resultset->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $data["id_gender"]; ?>">
                                            <?php echo $data["name"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-success" onclick="signUp();">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="changeView();">Already Have An Account? Sign In</button>
                            </div>
                        </div>
                    </div>
                    <!-- EnD Signup Box -->
                    <!-- Signin Box -->
                    <div class="col-12 col-lg-6" id="signInBox">
                        <div class="row g2">
                            <div class="col-12">
                                <p class="title02">Sign In</p>
                            </div>
                            <!-- Error Msg -->
                            <div class="col-12 d-none" id="msgdiv1">
                                <div class="alert alert-danger" role="alert" id="msg1"></div>
                            </div>
                            <!-- End Error Msg -->
                            <?php
                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }
                            ?>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" value="<?php echo $email; ?>" class="form-control" id="email1" placeholder="Enter Email">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" value="<?php echo $password; ?>" class="form-control" id="password1" placeholder="Enter Password">
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label fw-bold">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-primary fw-bold" onclick="forgotPassword();">Forgot Password?</a>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-success" onclick="signIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger" onclick="changeView();">New To E-Shop? Sign Up</button>
                            </div>
                            <div class="col-12 mt-3 d-grid">
                                <button class="btn btn-primary" id="">Go To E-Shop Admins</button>
                            </div>
                        </div>
                    </div>
                    <!-- End Signin Box -->
                </div>
            </div>
            <!-- End Content -->
            <!-- Model -->
            <div class="modal" tabindex="-1" id="fogotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Forot Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="newPassword" placeholder="Enter New Password">
                                        <button class="btn btn-outline-danger" type="button" id="showNewPassword" onclick="showPassword1();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Re-Enter Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rePassword" placeholder="Re-Enter Password">
                                        <button class="btn btn-outline-danger" type="button" id="showRePassword" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="verification_code" placeholder="Enter Verification Code">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Model -->
            <!-- Footer -->
            <div class="col-12 fixed-b">
                <p class="text-center">&copy; 2024 eshop.lk || All Rights Reserved.</p>
                <p class="text-center fw-bold">Design By Cypherlix</p>
            </div>
            <!-- End Footer -->
        </div>
        <script src="js/script.js"></script>
        <script src="js/bootstrap.js"></script>
</body>

</html>