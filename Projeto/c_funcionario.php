<?php
	ob_start();
	session_start();
	require_once 'conect/dbconnect.php';
	// Verificar se existe alguma sessão ativa, se não tiver vai redirecionar para a página de login
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}
	// Fazer LogOut do sistema / Destruir sessão
     if (isset($_GET['logout'])) {
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		header("Location: login.php");
		exit;
	}
	date_default_timezone_set('America/Sao_Paulo');
	$res=mysql_query("SELECT * FROM ous_funcionarios WHERE cod=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	$KEY = true;
	require_once('conect/setting.php');
    // Obter dados funcionario da tabela SQL
    $user_id= $userRow['id_funcionario'];
    $user_n= $userRow['nome'];
    $user_sb= $userRow['sobrenome'];
    $user_dt= date('d/m/y').' as '. date('H:i');
    $user_c= $userRow['cargo'];
    // Verifica se o funcionário tem permissão para acessar a página
	if ($user_c =='Administrador'){}
	else{
	     MessageRedir('<center> Você não tem permissão para acessar essa página! <br> Redirecionando para a página inicial...', 5, 'index.php');    
    }
	// Faz o include do arquivo de conexão com o banco de dados SQL
	include_once 'conect/dbconnect.php';
    // Define a variável $error como falsa
	$error = false;
    // Recebendo dados via POST (Nome, Sobrenome, Contato, Email e Senha)
	if ( isset($_POST['btn-cadastrar']) ) {
	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);
	
	$sobrenome = trim($_POST['sobrenome']);
	$sobrenome = strip_tags($sobrenome);
	$sobrenome = htmlspecialchars($sobrenome);
	
	$contato = trim($_POST['contato']);
	$contato = strip_tags($contato);
	$contato = htmlspecialchars($contato);
	
	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
	
	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);
	
	$cargo = trim($_POST['cargo']);
	$cargo = strip_tags($cargo);
	$cargo = htmlspecialchars($cargo);
	
    // Validar telefone/contato
    if (empty($contato)) {
    $error = true;
    $contatoError = "* Campo obrigatório.";
    } else if (!preg_match("/^[Z0-9]+$/",$contato)) {
    $error = true;
    $contatoError = "* Deve conter apenas números.";
    }else if(strlen($contato) < 11) { 
    $error = true;
    $contatoError = "* Informe o DDD o 9 e o Numero de telefone.";
    }else if(strlen($contato) > 12) { 
    $error = true;
    $contatoError = "* Informe o DDD o 9 e o Numero de telefone.";
    }
    // Validar Nome
    if (empty($name)) {
    $error = true;
    $nameError = "* Campo obrigatório.";
    } else if (strlen($name) < 4) {
    $error = true;
    $nameError = "Deve ter pelo menos 4 caracteres.";
    } else if (!preg_match("/^[a-zA-Z0-9_.]+$/",$name)) {
    $error = true;
    $nameError = "* O nome deve conter apenas letras.";
    } 
    // Validar sobrenome
    if (empty($sobrenome)) {
    $error = true;
    $sobrenomeError = "* Campo obrigatório.";
    }
    //validar email
    
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $emailError = "* Email inválido."; 
    } else {    
    $query = "SELECT email FROM ous_funcionarios WHERE email='$email'";
    $result = mysql_query($query);
    $count = mysql_num_rows($result);
    if($count!=0){
    $error = true;
    $emailError = "Esse email já esta em uso.";
    }
    }
    
    // Validar senha
    if (empty($pass)){
    $error = true;
    $passError = "* É obrigatório definir uma senha.";
    } else if(strlen($pass) < 6) {
    $error = true;
    $passError = "* A senha deve ter pelo menos 6 caracteres.";
    } 
    else if (!preg_match("/^[a-zA-Z0-9.]+$/",$name)) { 
    $error = true;
    $passError = "* A senha deve conter apenas números e letras.";
    }
    // Validar cargo
    if (empty($cargo)) {
    $error = true;
    $sobrenomeError = "* Campo obrigatório.";
    }
    // Gerar ID/COD do usuário
    function id($qtd){
       $Caracteres = '0123456789';
       $QuantidadeCaracteres = strlen($Caracteres);
       $QuantidadeCaracteres--;

       $Hash=NULL;
       for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
       }
       return $Hash;
       }
       $Gerar_id ='ous_'.id(4);
       $id_funcionario = $Gerar_id;
    // Criptografar senha
    $password = hash('sha256', $pass);
    
    // Inserir dados na tabela SQL
    if( !$error ) {
    $query = "INSERT INTO ous_funcionarios(nome,sobrenome,password,contato,email,cargo,id_funcionario) VALUES('$name','$sobrenome','$password','$contato','$email','$cargo','$id_funcionario')";
    $res = mysql_query($query);
    // Mensagens de erro e sucesso
    if ($res) {
    $errTyp = "alert-success";
    $errMSG = "<b>$name $sobrenome</b> foi cadastrado com sucesso! <br>Os dados abaixo são necessários para acessar o sistema, forneça-os ao seu funcionário.<br><br><b> Login: </b> $id_funcionario <br> <b> Senha: </b>: $pass ";
    unset($name);
    unset($sobrenome);
    unset($contato);
    unset($pass);
    unset($cargo);
    } else {
    $errTyp = "alert-danger";
    $errMSG = "Ocorreu um erro, tente novamente mais tarde.";	
    }	
    }
    }

 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
             
    <title>OuS System</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />        
    
    <script type='text/javascript' src='js/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery/jquery-ui-1.10.3.custom.min.js'></script>
    <script type='text/javascript' src='js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/jquery/globalize.js'></script>
    
    <script type='text/javascript' src='js/bootstrap/bootstrap.min.js'></script>
    <script type='text/javascript' src='js/cookies/jquery.cookies.2.2.0.min.js'></script>
    
    <script type='text/javascript' src='js/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js'></script>
    <script type='text/javascript' src='js/charts/excanvas.min.js'></script>    
    <script type='text/javascript' src='js/charts/jquery.flot.js'></script>    
    <script type='text/javascript' src='js/charts/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='js/charts/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='js/charts/jquery.flot.resize.js'></script>    
    
    <script type='text/javascript' src='js/morris/raphael-min.js'></script>
    <script type='text/javascript' src='js/morris/morris.min.js'></script>    
    
    <script type='text/javascript' src='js/sparklines/jquery.sparkline.min.js'></script>    

    <script type='text/javascript' src='js/scrollup/jquery.scrollUp.min.js'></script>
    
    <script type='text/javascript' src='js/plugins.js'></script>    
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>    
</head>
<body>    
    
    <div id="wrapper">
        
        <div id="header">
            
        <div class="wrap">
			    <span class="logo"></span>
                <div class="buttons">
                    <div class="item">
                        <a href="index.php" class="btn btn-primary btn-xs">
                            <span class="i-forward"></span>SAIR DO PAINEL
                        </a>                
                    </div>                
                </div>
                
            </div>
            
        </div>
        
        <div id="layout">
        
            <div id="sidebar">

              

                <ul class="navigation">
                    <li class="openable open">
                        <a href="#">PAINEL DE CONTROLE</a>
                        <ul>
                            <li class="">
                                <a href="admin.php">Página Inicial</a>
                            </li>
                            <li class="active">
                                <a href="c_funcionario.php">Cadastrar Funcionário</a>
                            </li>
                      
                        </ul>
                    </li>
                                                       
                                     
                                            
                </ul>

            </div>

            <div id="content">                        
                <div class="wrap">
                    
                                                                                      
                    
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-10">
                            
                                 
                                 
                                    <form method="post" class="login__form"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">  
                                    <?php if ( isset($errMSG) ) {  ?>
                                    <div class="alert <?php echo ($errTyp=="alert-success") ? "alert-success" : $errTyp; ?>">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?php echo $errMSG; ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                 
                            </div>
                            
                                    
                            <div class="col-md-10">
                               <div class="block">
                                    <div class="content np">
                                        
                                        <div class="controls-row">
                                            <div class="col-md-3">Nome:</div>
                                            <div class="col-md-5"><input type="text" name="name" value="<?php echo $name ?>" class="form-control"></div>
                                            <div class="col-md-4"><span class="help-inline"><font color="red"><?php echo $nameError; ?></font></span></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Sobrenome:</div>
                                            <div class="col-md-5"><input type="text" name="sobrenome" value="<?php echo $sobrenome ?>" class="form-control"></div>
                                            <div class="col-md-4"><span class="help-inline"><font color="red"><?php echo $sobrenomeError; ?></font></span></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Contato:</div>
                                            <div class="col-md-5"><input type="text" name="contato" value="<?php echo $contato ?>" class="form-control"></div>
                                            <div class="col-md-4"><span class="help-inline"><font color="red"><?php echo $contatoError; ?></font></span></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Email:</div>
                                            <div class="col-md-5"><input type="text" name="email" value="<?php echo $email ?>" class="form-control"></div>
                                            <div class="col-md-4"><span class="help-inline"><font color="red"><?php echo $emailError; ?></font></span></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Senha:</div>
                                            <div class="col-md-5"><input type="password" id="password" name="pass" class="form-control"></div>
                                            <div class="col-md-4"><span class="help-inline"><font color="red"><?php echo $passError; ?></font></span></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Cargo:</div>
                                            <div class="col-md-5">
                                               <select class="form-control" name="cargo">
                                               <option>Selecione</option>
                                               <option value="Administrador">Administrador ( Acesso total ao sistema )</option>
                                               <option value="Atendente">Atendente</option>
                                               <option value="Tecnico">Tecnico</option>
                                               </select>
                                            </div> 
                                            <div class="col-md-4"><span class="help-inline"><font color="red"><?php echo $cargoError; ?></font></span></div>
                                        </div>
                                      
                                        
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-2">
                                <br>
                              <button class="btn btn-primary" name="btn-cadastrar" type="submit" >FINALIZAR CADASTRO</button></form>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
            
        </div>

    </div>
    
</body>


</html>
<?php ob_end_flush(); ?>