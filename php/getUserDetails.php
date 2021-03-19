<?php

    include_once("dbc.php");
    include_once("checkLoggedIn.php");
    if (!$logged_in) header("Location: ../../");

    $email = "";
    $username = "";
    $permissions = "";

    $token = $_SESSION['token'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE token = ?;");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) == 0) {
        $_SESSION['email'] = "";
        header("Location: ../");
    } else {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $username = $row['username'];
        $permissions = $row['permissions'];
    }