<?php

    #session varaibles exprise once user closes the webpage (can be used across diff pages)

    //session_start();

    //print_r($_SESSION);

    #cookies, used for users to stay logged in for long period of time.
    #cookies must be set before any html code(
    #example

    setcookie("id","LKahlo",time()+60*60*24);

    echo $_COOKIE['id'];
    
?>