<?php
    $produccion="no";

    if($produccion=="si"){
        $host = 'localhost';
        $dbname = 'u274019495_contador_salas';
        $userDB = 'u274019495_contador_salas';
        $passDB = 'Erxl5063701489*';
    }else{
        $host = 'localhost';
        $dbname = 'practicaForense';
        $userDB = 'root';
        $passDB = '';
    }

    #DATOS PARA PHPMAIL
    $mailHost = 'smtp.hostinger.com';
    $mailUser = 'info@practicaforenseenderecho.com';
    $mailPass = 'Erxl5063701489*';
    $mailSender = array('email' => 'info@practicaforenseenderecho.com', 'name' => 'Información de Cursos - Practica Forense en Derecho');
    #
?>