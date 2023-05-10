<?php

    session_start();

    include_once("db.php");

    $login = $_REQUEST["usuario"];
    $pwd = $_REQUEST["password"];

    conectadb();

    $result = mysqli_query($conn,"select * from usuarios where login='$login'") or die 
    ("error en el select");

    if ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

        $pass_hash_bbdd = $row['password'];
        $tipo_bbdd = $row['tipo'];

        if (password_verify($pwd,$pass_hash_bbdd)) {

            $_SESSION['login'] = $login;
            $_SESSION['tipo'] = $tipo_bbdd;

            header('location:index.php');

        } else {

            header('location:login.php?error=NOPASAS');

        }
        closedb();
    } else {

        header('location:login.php?error=NOUSER');
    }



?>