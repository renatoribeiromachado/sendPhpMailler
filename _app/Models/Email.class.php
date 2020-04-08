<?php
    require('_app/Library/PHPMailer/class.phpmailer.php');
    class Email {
        public function Send($contato, $telefone, $email) {
            // Inicia a classe PHPMailer 
            $mail = new PHPMailer(); 
            $mail->IsSMTP(); 
            $mail->Host = "";// Coloque seu mail exe: mail:seudominio.com.br 
            $mail->Port = 587; 
            $mail->SMTPAuth = true; 
            $mail->Username = ''; // Coloque seu username
            $mail->Password = ''; // Coloque sua senha
  
            // Configurações de compatibilidade para autenticação em TLS 
            $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 
            // Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
            // $mail->SMTPDebug = 2; 

            // Define o remetente que inseriu os dados na formulario: contato e email
            $mail->From = $email; 
            $mail->FromName = $contato; 

            // Define o(s) destinatário(s) quem vai receber o email com os dados informados
            $mail->AddAddress("renato@acessohost.com.br"); 
            // Opcional: mais de um destinatário
            // $mail->AddAddress('fernando@email.com'); 
            // Opcionais: CC e BCC
            // $mail->AddCC('x@provedor.com', 'X'); 
            // $mail->AddBCC('X@gmail.com', 'X'); 

            // Definir se o e-mail é em formato HTML ou texto plano 
            // Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
            $mail->IsHTML(true); 

            // Charset (opcional) 
            $mail->CharSet = 'UTF-8'; 
            // Assunto da mensagem 
            $mail->Subject = "Dados enviado do Formulário Teste GitHub"; 
            // Corpo do email 
            $mail->Body = "<p><b>CONTATO</b>: {$contato}</p>"; 
            $mail->Body .= "<p><b>TELEFONE</b>: {$telefone}</p>";
            $mail->Body .= "<p><b>EMAIL</b>: {$email}</p>";
        
            // Opcional: Anexos 
            // $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 
            // Envia o e-mail 
            $send = $mail->Send(); 
            if($send){
                header("Location: index.php?exe=sent");
            }
        }
    }