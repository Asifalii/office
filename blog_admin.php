<?php
if (isset($_GET['signOut'])) {
    session_start();
    session_destroy();
    ?>

    <script>
        location.href = "blog_admin.php";
    </script>
    <?php
}

if (!empty($_POST['username']) && !empty($_POST['pass'])) {
    include("./v5/local_db.php");

    $sql = "select * from user where user_email='" . $_POST['username']
        . "' AND user_password='" . md5($_POST['pass']) . "'";

    $query = mysqli_query($conn, $sql);

    $result = mysqli_num_rows($query);

    if ($result == 1) {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['pass'];
        ?>
        <script>
            location.href = "blog/blog_list.php";
        </script>
    <?php } else {
        session_start();
        session_destroy();
        ?>
        <script>
            alert("Wrong Information");
            location.href = "blog_admin.php";
        </script>
    <?php }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="util.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="blog_admin.php" method="post">
					<span class="login100-form-title" style="background-color: #043A54;">
						Bdword Blog Panel
					</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                    <input class="input100" type="text" name="username" placeholder="Username" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Please enter password">
                    <input class="input100" type="password" name="pass" placeholder="Password" required>
                    <span class="focus-input100"></span>
                </div>

                <br>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" style="background-color: #043A54;">
                        Log in
                    </button>
                </div>

                <br>
                <br>
                <br>
            </form>
        </div>
    </div>
</div>


</body>
</html>

