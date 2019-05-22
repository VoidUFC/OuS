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
    
    <div id="wrapper" class="sidebar_off">
        
        <div id="header">
            
            <div class="wrap">
			    <span class="logo"></span>
                <div class="buttons">
                    <div class="item">
                        <a href="?logout" class="btn btn-primary btn-xs">
                            <span class="i-togle"> SAIR </span>
                        </a>
                                               
                    </div>                
                </div>
                
            </div>
            
        </div>
        
        <div id="layout">
        
            <div id="content">                        
                <div class="wrap">
                    
                    <div class="head">
                        <div class="info">
                          <div class="side fl">
                            <table>
                               <tr>
                                   <td>
                                       <div class="img">
                                       <img src="img/default-user.png"  class="img-thumbnail" height="40px" width="40px">
                                       </div> 
                                   </td>
                                   <td><font color="#e9edf1">.</font></td>
                                   <td>
                                       <font color="#607387"><b> <?php echo $user_n.' '.$user_sb ?></b><br>
                                       <small><?php echo $user_c ?></small></font>
                                   </td>
                               </tr>
                            </table>
                        </div>
                            </div>
                        
                        <div class="side fr">
                            
                           
                            <a href="buscar_os.php" class="btn btn-default btn-sm"><font color="#607387"><span class="i-magnifier"></span> BUSCAR O.S</font></a>
                                                   
							<a href="#AbrirOS" role="button" data-toggle="modal" class="btn btn-default btn-sm"><font color="#607387"><span class="i-plus-4"></span> ABRIR O.S</font></a>
				            
                            <a href="clientes.php" class="btn btn-default btn-sm"><font color="#607387"><span class="i-user"></span> CLIENTES</font></a>    
                            |
                            <a href="admin.php" class="btn btn-default btn-sm"><font color="#607387"><span class="i-cog"></span> PAINEL DE CONTROLE</font></a>     
                                        </div>                        
                    </div>                                                                    
                    
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="block">
                                    <div class="content np">
                                        <div class="pricing_heading">
                                            <div class="price">
                                                <?php  
                                $os_concluida = mysql_query("SELECT * FROM ous_os  WHERE os_status = 'Concluida'");
                                echo $total_os_concluida = (mysql_num_rows($os_concluida));
                                                ?>
                                                <br><span>Ordem de serviço(s)</span></div>
                                            <div class="title_2"><center>Concluida (s)</center></div>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block">
                                    <div class="content np">
                                        <div class="pricing_heading">
                                            <div class="price">
                                                <?php  
                                $os_aberta = mysql_query("SELECT * FROM ous_os  WHERE os_status = 'Aberta'");
                                echo $total_os_aberta = (mysql_num_rows($os_aberta));
                                                ?>
                                                <br><span>Ordem de serviço(s)</span></div>
                                            <div class="title_3"><center>Aberta (s)</center></div>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block">
                                    <div class="content np">
                                        <div class="pricing_heading">
                                            <div class="price">
                                                <?php  
                                $os_aguardando = mysql_query("SELECT * FROM ous_os  WHERE os_status = 'Aguardando'");
                                echo $total_os_aguardando = (mysql_num_rows($os_aguardando));
                                                ?>
                                                <br><span>Ordem de serviço(s)</span></div>
                                            <div class="title_5"><center>Aguardando(s)</center></div>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="block">
                                    <div class="content np">
                                        <div class="pricing_heading">
                                            <div class="price">
                                                <?php  
                                $os_fechada = mysql_query("SELECT * FROM ous_os  WHERE os_status = 'Fechada'");
                                echo $total_os_fechada = (mysql_num_rows($os_fechada));
                                                ?>
                                                <br><span>Ordem de serviço(s)</span></div>
                                            <div class="title_4"><center>Fechada(s)</center></div>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
							<div class="col-md-12">
                                
                                <div class="block">
                                    <div class="head">
                                        <h2>Acessos recentes</h2>
                                    </div>
                                    <div class="content list_custom npb npt"> 
                                          <?php
	                                         $result = $conn->prepare("SELECT * FROM ous_recent_acess ORDER BY cod DESC LIMIT 3 ");
	                                         $result->execute();
	                                         for($i=0; $row_list = $result->fetch(); $i++){
	                                         $id=$row_list['cod'];
	                                         ?>
									     <div class="item">
                                            <div class="info">
                                                <span class="name"><?php echo $row_list['nome'].' '.$row_list['sobrenome'];?></span>
												<div class="side fr"><font color="#777" ><?php echo $row_list['data_hora'];?></font></div>
                                                <p class="muted"><font color="#777" ><?php echo $row_list['cargo'];?></font></p>
                                            </div>
                                        </div>
                                        
                                        <?php } ?>
                                        
									</div>
                                </div> 
                            </div>
						 
                            
                        </div>      
                    </div>
                </div>
            </div>
        </div>
        
    <!-- MODAL BUSCAR O.S -->   
    <div class="modal fade" id="BuscaOS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-md-11">
            <div class="modal-content">
                
                <div class="modal-body">
                    <div class="col-md-10">
                    <font color="#777">Por favor, informe o N° da Ordem de serviço:</font><br>
                    </div>
                        <div class="col-md-9">
                             <input type="text" class="form-control" value="">
                            <br>
                            </div>
                            <a href="busca.php"  class="btn btn-success" type="button"><i class="i-magnifier"></i> BUSCAR O.S</a>
                        </div>
               </div>
            </div>
        </div>
    </div>
    <!-- MODAL ABRIR O.S -->
    <div class="modal fade" id="AbrirOS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-md-11">
            <div class="modal-content">
                <div class="modal-body">
				         <a href="clientes.php?abrir_os" class="btn btn-lg btn-block btn-success" type="button"><b>ABRIR ORDEM DE SERVIÇO</b> <br>( O cliente já possui cadastro no sistema )</a>
				         <a href="os.php?novo" class="btn btn-lg btn-block btn-danger" type="button">ABRIR ORDEM DE SERVIÇO E CADASTRAR CLIENTE<br>( O cliente ainda não possui cadastro no sistema )</a>
                </div>
               </div>
            </div>
        </div>
    </div>
    
      

        
    </div>
</body>
</html>
