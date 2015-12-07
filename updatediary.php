<?php

    session_start();

    include("connection.php");

    $qry = "UPDATE `Users` SET `Diary`='".mysqli_real_escape_string($con, $_POST['diary'])."'WHERE ID='".$_SESSION['id']."' LIMIT 1";

    //execute qry
    mysqli_query($con, $qry);

    //print_r($_SESSION);

?>