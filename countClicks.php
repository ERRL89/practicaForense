<?php

    include_once('./config/config.php');
    include_once('./config/dbConf.php');
    $db=conexionPdo();
   
    $course = $_POST["course"];
    
    if($course=="boton1"){
        $course=1;
        echo $course;
    }
    else if($course=="boton2"){
        $course=2;
        echo $course;
    }
    else if($course=="boton3"){
        $course=3;
        echo $course;
    }

    #EXTRAE VALOR ACTUAL DEL CONTEO DE CLICKS DEL CURSO SELECCIONADO
    $consultaStr = $db->prepare("SELECT * FROM cursos WHERE ID=?");
    $consultaStr->execute([$course]);
    $consulta = $consultaStr->fetch(PDO::FETCH_ASSOC);
    $click = $consulta["clicks"];
    
    #REALIZA INCREMENTO DE 1 CLICK A CURSO SELECCIONADO
    $consultaStr="UPDATE cursos SET clicks=? WHERE ID=?";
    $consulta=$db->prepare($consultaStr);
    $consulta->execute([($click+1), $course]);

?>

