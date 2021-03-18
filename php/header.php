<?php
    include_once("global.php");
?>

<div id="header">
    <h1 id="logoText">FFP</h1>
    <div id="pageLinks">
        <a href="/ffp/pages/home"><h2>Home</h2></a>
        <a href="/ffp/pages/tasks"><h2>Tasks</h2></a>
        <a href="/ffp/pages/friends"><h2>Friends</h2></a>
        <a href="/ffp/pages/account"><h2>Account</h2></a>
    </div>
</div>

<style>

    #header {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        border-bottom: 1px solid black;
        background-color: white;
    }

    #logoText {
        margin: 10px 10px 5px 10px;
    }

    #pageLinks h2 {
        display: inline-block;
        margin: 13px 10px 5px 10px;
        color: grey;
        text-decoration-line: underline;
    }

</style>