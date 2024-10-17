<?php

    include_once('./config/config.php');
    include_once($root.'config/dbConf.php');
    $db=conexionPdo();
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $course = $_POST["curso"];
    
    if($course=="boton1"){
        $course=1;
    }
    else if($course=="boton2"){
        $course=2;
    }
    else if($course=="boton3"){
        $course=3;
    }

    $consultaStr="INSERT INTO registros (nombre, telefono, email, curso) VALUES (?,?,?,?)";
    $consulta=$db->prepare($consultaStr);
    $consulta->execute([$name, $phone, $email, $course]);

?>

