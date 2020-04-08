<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="shortcut icon" href="https://www.intecbrasil.com.br/favicon/favicon.png" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css?<?php echo rand(1, 1000);?>" rel="stylesheet" type="text/css"/>
        <link href="css/admin.css?<?php echo rand(1, 1000);?>" rel="stylesheet"/>
        <title>Cadastro utilizando PHPMailler</title>  
        <!--[if lt IE 9]>
            <script src="../_cdn/html5.js"></script> 
         <![endif]-->
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,800' rel='stylesheet' type='text/css'>-->
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <div class="col-md-12 col-sm-12">
                    <h1>Cadastro usando phpMailler</h1>
                </div>
            </div>
        </div>
        
        <!--RETORNO:: get-->
        <div class="container">
            <?php
                $get = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);
                if (!empty($get)){
                    if ($get == 'empty'){
                        echo "<div class='alert alert-danger' role='alert'>
                                <p class='text-center'><i class='glyphicon glyphicon-alert'></i> Por favor preencha todos os campos (:</p>
                            </div>";
                    }elseif($get == "sent"){
                        echo "<div class='alert alert-success' role='alert'>
                                <p class='text-center'><i class='glyphicon glyphicon-envelope'></i> E-mail enviado com sucesso, logo entraremos em contato :)</p>
                            </div>";
                    }
                }
            ?>
        </div>
        
        <div class="container-fluid">
            <div class="container top20 bottom20">
                <div class="col-md-6 col-sm-6 text-white">
                    <p class="text-primary"><i class="glyphicon glyphicon-ok"></i> <b>PREENCHA O FORMULÁRIO</b></p>
                    <form action="sendEmail.php" method="post" autocomplete="off" role="presentation">
                         
                        <div class="form-group">
                            <label class="control-label text-primary"><i class='glyphicon glyphicon-user'></i> Contato</label>
                            <input type="text" name="contato" class="form-control" placeholder="Informe seu Nome" autocomplete="none" required="">
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label text-primary"><i class='glyphicon glyphicon-phone-alt'></i> Telefone</label>
                            <input type="text" name="telefone" class="form-control telefone" value="" placeholder="Informe seu Telefone" required="">
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label text-primary"><i class='glyphicon glyphicon-envelope'></i> E-mail</label>
                            <input type="email" name="email" class="form-control" value="" placeholder="Informe seu melhor email, para que possamos entrar em contato" required="">
                            <small id="emailHelp" class="form-text text-primary">Não compartilharemos seu seu email...</small>
                        </div>
 
                        <div class="form-group">
                            <input type="submit" name="SendPost" class="btn btn-primary" value="Enviar :)">
                        </div>
                    </form>  
                </div>
            </div>
        </div>
        
        <div class="container-fluid footer">
            <div class="col-md-12 col-sm-12 top20">
                <p class="text-center text-white">© Todos os direitos reservados</p>    
            </div>
        </div>
        
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui-1.10.1.custom.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script> 
        <script>
            $(function(){
                $("input.telefone")
                    .mask("(99) 9999-9999?9")
                    .focusout(function (event) {  
                    var target, phone, element;  
                    target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
                    phone = target.value.replace(/\D/g, '');
                    element = $(target);  
                    element.unmask();  
                    if(phone.length > 10) {  
                        element.mask("(99) 99999-999?9");  
                    } else {  
                        element.mask("(99) 9999-9999?9");  
                    }  
                });
            });
        </script>
    </body>
</html>