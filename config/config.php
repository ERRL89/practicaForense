<?php
	$folderBase = 'practicaForense/';
    $theme = 'acil';
	$root = $_SERVER['DOCUMENT_ROOT'].'/'.$folderBase;
	
	// INFORMACIÓN PARA TEST //
    #BASE DE DATOS

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
    $mailUser = 'cotizaciones@despachocontablesalas.com';
    $mailPass = 'Erxl5063701489*';
    $mailSender = array('email' => 'cotizaciones@despachocontablesalas.com', 'name' => 'Despacho Contable Salas Salazar & Asociados');
    #
?>