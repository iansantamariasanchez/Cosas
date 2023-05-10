<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css.css" rel="stylesheet" type="text/css" />
    <title>Login</title>
</head>
<body>
    
    <div class="login-box">
        <h2>Login</h2>
        <form method="post" action="login2.php">

            <div class="user-box">
                <input type="text" name="usuario">
                <label>Usuario</label>
            </div>
            
            <div class="user-box">
                <input type="password" name="password">
                <label>Password</label>
            </div>

            <a><input type="submit" name="enviar" value="Enviar" class="bo" />
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            </a>

        </form>
    </div>

    <?php

        print "<br><br>";

        if(isset($_SESSION["ERROR"])) {

            print $_SESSION["ERROR"];

        }

    ?>

</body>
</html>