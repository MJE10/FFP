<?php

    include_once("getUserDetails.php");

    $code = rand(100000,999999);

    $stmt = $conn->prepare("UPDATE users SET verification = ? WHERE email = ?");
    $stmt->bind_param("ss", password_hash($code, PASSWORD_DEFAULT), $email);
    $status = $stmt->execute();

    mail($email, "FPP Email Verification Code", "Your email verification code is: ".$code."
If you did not request this code, please contact us at voitheiamath@gmail.com.");

    header("Location: ../pages/verifyemail?msg=ok");