<?php
    include_once('./config/config.php');
    include_once($root.'config/dbConf.php');
    include "./resources/PHPMailer/src/Exception.php";
	include "./resources/PHPMailer/src/PHPMailer.php";
	include "./resources/PHPMailer/src/SMTP.php";
    include "./js/functions.php";

    $db=conexionPdo();
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $course = $_POST["course"];
    
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

    $recipients = array();   
    $recipients2 = array();  

    #------------------------ CORREO 1 - SE ENVIA INFORMACION AL INTERESADO ------------------
    $dataUserMail1 = array("email" => "{$email}", "name" => "{$name}");
    array_push($recipients, $dataUserMail1);

    $mailSubject = "Información de Cursos de Práctica Forense en Derecho";
    $mailPath = $root.'templates/email/mailUser.php';
    $mailData = array(
        array("var_name" => "name", "var_val" => "{$name}")
    );
   
    $routeCourse1=$root."resources/files/Curso en Práctica Forense para Aprender a Litigar.pdf";
    $routeCourse2=$root."resources/files/Diplomado en Práctica Forense en el Proceso Penal Acusatorio.pdf";
    $routeCourse3=$root."resources/files/Curso en Práctica Forense del Juicio de Amparo.pdf";
    
    $attachments=array($routeCourse1);
    array_push( $attachments, $routeCourse2);
    array_push( $attachments, $routeCourse3);

    sendEmail($recipients, $mailSender, $mailSubject, $mailPath, $mailData, $mailHost, $mailUser, $mailPass, $attachments); 
    #------------------------------------------------------------------------------------------------------

    #------------------------ CORREO 2 - SE ENVIA INFORMACION DEL INTERESADO A JUSTINO ------------------

    $nombre = "Justino Salcedo Sanabia";
    $email  = "corporativosalcedo@gmail.com";

    $dataUserMail2 = array("email" => "{$email}", "name" => "{$nombre}");
    array_push($recipients2, $dataUserMail2);

    $mailSubject2 = "Notificación: Nuevo Registro en Plataforma";
    $mailPath2 = $root.'templates/email/mailAdmin.php';
    $mailData2 = array(
        array("var_name" => "name", "var_val" => "{$name}"),
        array("var_name" => "phone", "var_val" => "{$phone}"),
        array("var_name" => "email", "var_val" => "{$email}")
    );

    sendEmail($recipients2, $mailSender, $mailSubject2, $mailPath2, $mailData2, $mailHost, $mailUser, $mailPass); 
    #------------------------------------------------------------------------------------------------------

?>

