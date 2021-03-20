<?php
    include_once("dbc.php");
    session_start();
    
    // echo $_SESSION['token'];
    if (!isset($_SESSION['token']) and isset($_COOKIE['loginToken'])) $_SESSION['token'] = $_COOKIE['loginToken'];

    $logged_in = false;
    if (isset($_SESSION['token'])) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE token = ?;");
        $stmt->bind_param("s", $_SESSION['token']);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            $logged_in = true;
        } else {
            setcookie("loginToken", "", time() - 3600);
            unset($_SESSION['token']);
        }
    }