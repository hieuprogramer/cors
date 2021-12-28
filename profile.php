<?php
    session_start();

    include("connection.php");

    if(!isset($_SESSION["username"])) {
        header("location:login.php");
    }

    // if($_SESSION['userid']!=$_GET['user']) {
    //     header("location:login.php");
    // }

    $sql = "select * from users where id='{$_GET["userid"]}'";
    $result = mysqli_query($data, $sql);
    $user = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #f5f5f5;">
    <?php include("header.php"); ?>
    <div class="container">
        <div class="col-md-8 brand mt-5 bg-light">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link border active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</button>
                    <button class="nav-link border" id="nav-edit-tab" data-bs-toggle="tab" data-bs-target="#nav-edit" type="button" role="tab" aria-controls="nav-edit" aria-selected="false">Edit Profile</button>
                    <button class="nav-link border" id="nav-changepwd-tab" data-bs-toggle="tab" data-bs-target="#nav-changepwd" type="button" role="tab" aria-controls="nav-changepwd" aria-selected="false">Change Password</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane border  fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"> <strong> Full name : </strong> </div>
                                <div class="col-md-10"><?php echo $user["fullname"]; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <strong> Username : </strong> </div>
                                <div class="col-md-10"><?php echo $user["username"]; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <strong> E-mail : </strong> </div>
                                <div class="col-md-10"><?php echo $user["email"]; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <strong> Gender : </strong> </div>
                                <div class="col-md-10"><?php echo $user["gender"]; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane border  fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
                <div class="card">
                    <div class="card-body">    
                        <div class="col-md-6">
                            <br>
                            <form id="user_form">
                                <div id="alert_error_message" class="alert alert-danger collapse" role="alert">
                                    Please check in on some of the fields below.
                                </div>
                                <div id="alert_sucess_message" class="alert alert-success collapse" role="alert">
                                    Your profile has been updated successfully.
                                </div>
                                <div class="d-none">
                                    <input type="hidden" class="form-control" id="userid" name="userid"
                                        value="<?php echo $_GET['user'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="fullname">Full Name *</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" maxlength="50"
                                        value="<?php echo $user['fullname'] ?>">
                                    <div id="fullname_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="username">Username *</label>
                                    <input type="text" class="form-control" id="username" name="username" maxlength="50"
                                        placeholder="<?php echo $user['username'] ?>" readonly>
                                    <div id="username_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" maxlength="100"
                                        value="<?php echo $user['email'] ?>">
                                    <div id="email_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label>Gender *</label>
                                    <select class="form-select" name="gender" id="gender" aria-label="Default select example" value="<?php echo $user['gender'] ?>">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                    <div id="gender_error_message" class="text-danger"></div>
                                </div>
                                <hr class="mb-4">
                                <input type="hidden" name="action" id="action" value="update_user">
                                <button class="btn btn-primary btn-block" type="submit">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <div class="tab-pane border  fade" id="nav-changepwd" role="tabpanel" aria-labelledby="nav-changepwd-tab">
                <div class="card">
                    <div class="card-body">    
                        <div class="col-md-6">
                            <br>
                            <form id="update_password_form">
                                <div id="update_password_alert_error_message" class="alert alert-danger collapse" role="alert">
                                    Please check in on some of the fields below.
                                </div>
                                <div id="update_password_alert_sucess_message" class="alert alert-success collapse" role="alert">
                                    Password updated successfully!
                                </div>
                                <div class="mb-3">
                                    <label for="password">Current Password *</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current Password">
                                    <div id="current_password_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="password">New password *</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" maxlength="50"
                                        placeholder="Enter password">
                                    <div id="new_password_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password">Confirm Password *</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                        maxlength="50" placeholder="Enter confirm password">
                                    <div id="confirm_password_error_message" class="text-danger"></div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-block" type="submit">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
    <script>
        $(document).ready(function(){
            $("#nav-profile-tab").click(function(){
                location.reload();
            });

            $("#fullname").focusout(function () {
                check_fullname();
            });

            $("#email").focusout(function () {
                check_email();
            });

            $("#gender").focusout(function () {
                check_gender();
            });

            function check_fullname() {
                if ($.trim($('#fullname').val()) == '') {
                    $("#fullname_error_message").html("Fullname is a required field.");
                    $("#fullname_error_message").show();
                    $("#fullname").addClass("is-invalid");
                } else {
                    $("#fullname_error_message").hide();
                    $("#fullname").removeClass("is-invalid");
                }
            }

            function check_email() {
                var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
                var email_length = $("#email").val().length;

                if ($.trim($('#email').val()) == '') {
                    $("#email_error_message").html("Email is a required field.");
                    $("#email_error_message").show();
                    $("#email").addClass("is-invalid");
                } else if (!(pattern.test($("#email").val()))) {
                    $("#email_error_message").html("Invalid email address");
                    $("#email_error_message").show();
                    $("#email").addClass("is-invalid");
                } else {
                    $("#email_error_message").hide();
                    $("#email").removeClass("is-invalid");
                }
            }

            function check_gender() {
                if ($.trim($('#gender').val()) == '') {
                    $("#gender_error_message").html("Gender is a required field.");
                    $("#gender_error_message").show();
                    $("#gender").addClass("is-invalid");
                } else {
                    $("#gender_error_message").hide();
                    $("#gender").removeClass("is-invalid");
                }
            }

            $('#user_form').on('submit', function (event) {
                event.preventDefault();
                data = $('#user_form').serialize();
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "action_profile.php",
                    dataType: "json",
                    success: function (data) {
                        console.log("ok");
                        if (data.status == 'success') {
                            $("#alert_sucess_message").show();
                            $("#alert_error_message").hide();
                        } else if (data.status=='error') {
                            alert("Chưa chọn giới tính");
                        }
                    },
                    error: function () {
                        alert("Lỗi");
                    }
                });
            });
        });

    </script>
</body>
</html>