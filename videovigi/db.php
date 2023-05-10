<?php
    // an example of db.php

    include_once 'config.php';

    function conectadb(){

    global $dbhost, $dbuser, $dbpass, $database, $conn;

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$database) or die ('Error 
    connecting to mysql');
    }
    
    function closedb(){

        global $conn;

        mysqli_close($conn);
    }
?>