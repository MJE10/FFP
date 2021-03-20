<?php

include_once("dbc.php");
include_once("checkLoggedIn.php");
include_once("getUserDetails.php");

$token = "";
while (true) {
    $token = md5(uniqid(rand(), true));

    $stmt = $conn->prepare("SELECT * FROM tasks WHERE identifier = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) == 0) {
        break;
    }
}

$stmt = $conn->prepare("INSERT INTO tasks (email, identifier) VALUES (?, ?);");
$stmt->bind_param("ss", $email, $token);
$stmt->execute();

header("Location: ../pages/tasks?edit=".$token);