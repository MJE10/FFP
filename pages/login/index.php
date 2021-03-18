<?php
    include_once("../../php/global.php");

    include_once("../../php/dbc.php");
    session_start();
    
    $msg = "";
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE (email = ?) OR (username = ?);");
        $stmt->bind_param("ss", $email, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) == 0) {
            $msg = "Email/username not recognized!";
        } else {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $row['email'];
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
        <div id="formDiv">
            <h1>FFP Log In</h1>
            <?php
                if ($msg !== "") {
                    echo "<h2>".$msg."</h2>";
                }
            ?>
            <div id="allRowDivs">
                <form method="post" action="index.php">
                    <div class="rowDiv"><h2>Username/Email:</h2><input type="text" name="email"></div>
                    <div class="rowDiv"><h2>Password:</h2><input type="password" name="password"></div>
                    <button class="submitButton" type="submit" name="submit"><h2>Log In</h2></button>
                </form>
            </div>
        </div>
    </body>
    
    <?php include_once("../../php/basicFormStyles.php"); ?>
</html>