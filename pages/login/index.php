<?php
    include_once("../../php/global.php");

    include_once("../../php/dbc.php");
    session_start();
    
    $msg = "";
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) == 0) {
            $msg = "Email not recognized!";
        } else {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $token = "";
                while (true) {
                    $token = md5(uniqid(rand(), true));

                    $stmt = $conn->prepare("SELECT * FROM users WHERE token = ?");
                    $stmt->bind_param("s", $token);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if (mysqli_num_rows($result) == 0) {
                        break;
                    }
                }

                $stmt = $conn->prepare("UPDATE users SET token = ? WHERE email = ?");
                $stmt->bind_param("ss", $token, $email);
                $status = $stmt->execute();
                // echo $status;
                // echo "<br>".$token;
                // echo 'oi';

                $_SESSION['token'] = $token;
                setcookie("loginToken", $token, time() + (86400 * 30), "/");
                header("Location: ../account");
            } else {
                $msg = "Wrong password!";
            }
        }
    }
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FFP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>

    </head>
    <body>
        <form method="post" action="index.php">
            <div class="shadowBoxClass">
                <h1>FFP Log In</h1>
                <?php
                    if ($msg !== "") {
                        echo "<h2>".$msg."</h2>";
                    }
                ?>
                <div class="rowDiv"><h2>Email:</h2><input type="text" name="email"></div>
                <div class="rowDiv"><h2>Password:</h2><input type="password" name="password"></div> 
                <button class="orangeButton" type="submit" name="submit"><h2>Log In</h2></button>
                <a href="../signup"><button class="orangeButton"><h2>Sign Up</h2></button></a>
            </div>
        </form>
    </body>
    
    <?php include_once("../../php/basicFormStyles.php"); ?>
</html>