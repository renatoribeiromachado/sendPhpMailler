<?php
    //VALIDAÇÃO
    if(isset($_POST)){
        unset($_POST['SendPost']);
        $allEmpty = true;
        foreach ($_POST as $field) {
            if(!empty($field)){
                $allEmpty = false; 
                break;   
            }
            if($allEmpty){
                header("Location:index.php?exe=empty");
                exit;
           } 
        }
    }

    $contato  = filter_input(INPUT_POST, "contato", FILTER_DEFAULT);
    $telefone = filter_input(INPUT_POST, "telefone", FILTER_DEFAULT);
    $email    = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
    $data     = date("Y-m-d H:i:s");
    
    //Enviar Email
    require_once("_app/Models/Email.class.php");
    $sendMail = new Email;
    $sendMail->Send($contato, $telefone, $email);