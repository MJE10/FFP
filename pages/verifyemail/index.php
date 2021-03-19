<?php
    include_once("../../php/global.php");

    include_once('../../php/checkLoggedIn.php');
    if (!$logged_in) {
        header("Location: ../../");
    }

    include_once("../../php/dbc.php");
    
    $msg = "Check your email for a code!";

    if (isset($_GET['msg'])) {
        if ($_GET['msg'] === 'ok') $msg = "New code sent! Please check your email, and if you cannot find it, your spam folder.";
    }
    
    if (isset($_POST['submit'])) {
        $token = $_SESSION['token'];
        $code = $_POST['code'];
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE token = ?;");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) == 0) {
            header("Location: ../../");
        } else {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($code, $row['verification'])) {
                $stmt = $conn->prepare("UPDATE users SET verification = 'verified' WHERE token = ?");
                $stmt->bind_param("s", $token);
                $stmt->execute();

                mail($row['email'], "FPP Email Verification", "This email has been successfully verified with username ".$row['username']."! If you did not request this, please contact us at voitheiamath@gmail.com");

                header("Location: ../account");
            } else {
                $msg = "Incorrect code!";
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
                <h1>FFP Verify Email</h1>
                <?php
                    if ($msg !== "") {
                        echo "<h2>".$msg."</h2>";
                    }
                ?>
                    
                <div class="rowDiv"><h2>Verification code:</h2><input type="text" name="code"></div>
                <button class="orangeButton" type="submit" name="submit"><h2>Submit Code</h2></button>
                    
                <a href="../../php/sendNewVerificationCode.php"><button class="orangeButton"><h2>Send New Code</h2></button></a>
            </div>
        </form>
    </body>
    
    <?php include_once("../../php/basicFormStyles.php"); ?>

    <style>
        .rowDiv {
            align-self: center;
        }
    </style>
</html>