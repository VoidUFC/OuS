<?php
	ob_start();
	session_start();
	require_once 'conect/dbconnect.php';
	require_once 'conect/db.php';
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
		header("Location: index.php");
		exit;
	}
	date_default_timezone_set('America/Sao_Paulo');
	$res=mysql_query("SELECT * FROM ous_funcionarios WHERE cod=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	$KEY = true;
	require_once('conect/setting.php');
    // Obter dados funcionario da tabela SQL

    
    $user_id = $userRow['id_funcionario'];
    $user_n  = $userRow['nome'];
    $user_sb = $userRow['sobrenome'];
    $user_dt = date('d/m/y').' as '. date('H:i');
    $user_c  = $userRow['cargo'];
    
    	if ($user_c =='Administrador'){}
	else{
	     MessageRedir('<center> Você não tem permissão para acessar essa página! <br> Redirecionando para a página inicial...', 5, 'index.php');    
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
                            <span class="i-forward"> PÁGINA INICIAL </span>
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
                            <li class="active">
                                <a href="admin.php">Página Inicial</a>
                            </li>
                            <li>
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
                            <div class="col-md-12">
                                
                               <div class="alert alert-info">            
                                    Olá <b>Wesley silva</b>, abaixo você tem algumas informações do sistema.
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                </div> 
                                
                            </div>
                            <div class="col-md-6">
                                <div class="block">
                                    <div class="head">
                                                                                
                                    </div>
                                    <div class="content np">
                                        
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>                                    
                                                    <th width="25%"><center>ORDEM DE SERVIÇO</center></th>                                 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Abertas <div class="side fr">4</div></td>
                                                </tr>
                                                <tr>
                                                    <td>Fechadas <div class="side fr">65</div></td>         
                                                </tr>
                                                <tr>
                                                    <td>Total <div class="side fr">745</div></td>                               
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>    
                                </div>
                            <div class="col-md-6">
                             <div class="block">
                                    <div class="head">
                                                                                
                                    </div>
                                    <div class="content np">
                                        
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>                                    
                                                    <td>Clientes registrados:</td>
                                                    <td>10</td>                                    
                                                </tr>
                                                <tr>
                                                    <td>Funcionários registrados:</td>
                                                    <td>4</td>                                   
                                                </tr>                               
                                            </tbody>
                                        </table>
                                        
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>

    </div>
    
</body>


</html>
