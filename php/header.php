<?php
    include_once("global.php");

    include_once("checkLoggedIn.php");
    if (!$logged_in) header("Location: ../../");
?>

<div id="header">
    <h1 id="logoText">FFP</h1>
    <div id="pageLinks">
        <a href="/ffp/pages/home"><h2>Home</h2></a>
        <a href="/ffp/pages/tasks"><h2>Tasks</h2></a>
        <a href="/ffp/pages/friends"><h2>Friends</h2></a>
        <a href="/ffp/pages/account"><h2>Profile</h2></a>
    </div>
</div>

<style>

    #header {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        box-shadow: 0 3px 10px rgba(0,0,0,.18);
        background-color: white;
        margin-bottom: 10px;
    }

    #logoText {
        margin: 10px 10px 5px 10px;
    }

    #pageLinks {
        margin-right: 10px;
    }

    #pageLinks h2 {
        display: inline-block;
        margin: 13px 10px 5px 10px;
        color: rgb(20, 20, 20);
    }

</style>