<?php include 'header.php' ?>
<?php include 'db.php' ?>
<?php session_start() ?>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <?php

        if (isset($_POST['login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $obj = new database();
            $obj->userLogin('donor', $email);
            $rows = $obj->getResult();
            if (!empty($rows) && count($rows) > 0) {
                foreach ($rows as $row) {
                    if ($email == $row['email'] && $password == $row['password']) {
                        $_SESSION['donorid'] = $row['donor_id'];
                        $_SESSION['dname'] = $row['donor_name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['pw'] = $row['password'];
                        header("refresh:1;url=index.php");
                    } else {
                        header("url=index.php");
                        echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Please type valid password');
                    window.location.href='login.php';
                    </script>");
                    }
                }
            } else {
                header("url=index.php");
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Invalid Email or Password');
                    window.location.href='login.php';
                    </script>");
            }
        }

        ?>

        <form action="login.php" method="post">
            <h1 class="reg-form">Sign in</h1>

            <input type="email" placeholder="email" name="email" require />
            <input type="password" placeholder="Password" name="password" require />
            <span style="margin: 5px; padding-bottom: 5px"> Are you an organization? <a href="org/login.php"> login here </a> </span>

            <button type="submit" name="login" value="login">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlayy">
            <div class="overlay-panel overlay-right">
                <h1>Not register yet?</h1>
                <p>Enter your personal details to register</p>

                <a href="signup.php"><button class="ghost">Sign Up</button></a>
            </div>
        </div>
    </div>
</div>

</body>

</html>