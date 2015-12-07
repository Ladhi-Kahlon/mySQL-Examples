<?php

    //make database connection
    $con = mysqli_connect("localhost", "cl56-sampled-qio","rUT^ty^h9","cl56-sampled-qio");
    //check db connection, if failed, kill processes
    if (mysqli_connect_error()) {
        die ("Connection error");
    }


?>