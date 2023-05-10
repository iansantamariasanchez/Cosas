<?php

    session_start();

    if( ! isset($_SESSION['login']) ){
        header('location: login.php');
        exit();
    }

    if($_SESSION['tipo']=='admin'){
        // El que ha entrado es administrador y puede añadir productos, por ejemplo
        // (Muestro el form de añadir producto)

        }


?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Fotos</title>
        <link href="index.css" rel="stylesheet" type="text/css" />

    </head>
    <body>

        <div class="lo">
            <img class="logo" src="logo.png" alt="logo empresa" >
        </div>

        <br>

        <div class="titu">
            <h1>Fotos</h1>
        </div>

        <hr>

        <br>

        <div class="clear"></div>

        <div class="wrapper">

            <br>

            <div>

                <?php

                    include_once 'db.php';

                    conectadb();
                    $query = "SELECT * FROM imagenes order by codigo desc";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {

                        echo '<a download="'.$row['ruta'].'" href="./script/fotos/'.$row['ruta'].'">'.
                        '<img class="cap" src="./script/fotos/'.$row['ruta'].'" width="200px" height="200px" >'. 
                        '</a>';

                    };  

                    closedb();
                ?>

            </div>

            <div class="clear"></div>

            <br>

        </div>
        
    
    </body>
</html>
